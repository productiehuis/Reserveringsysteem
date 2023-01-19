<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $visitorEmail = $_POST["email"];
    $showID = $_POST["showID"];

    //CHECK IF EMAILADDRESS IS VALID.
    if (!filter_var($visitorEmail, FILTER_VALIDATE_EMAIL)) {
        echo "IT DONT WORK";
    }

    $visitorName = $_POST["name"];
    $countPeople = $_POST["amount"];
    $sector = $_POST["sector"];
    $referral = $_POST["referral"];

    require_once "class/performanceDL.php";
    require_once "class/reservationDL.php";
    require_once "class/visitorDL.php";
    $visitorDL = new visitorDL();
    $reservationDL = new reservationDL();
    $performanceDL = new performanceDL();

    //CHECK IF MAX SEATS ISNT REACHED YET.
    $maxSeats = $performanceDL->readPerformance($showID)->max;
    $reservedSeats = $reservationDL->checkReserved($showID);
    if (($countPeople + $reservedSeats) > $maxSeats)
    {
        return false;
    }

    //ADD VISITOR TO DATABASE.
    $visitorobj = new visitor();
    $visitorobj->visitorName = $visitorName;
    $visitorobj->visitorEmail = $visitorEmail;

    $visitorobj->visitorID = $visitorDL->createVisitor($visitorobj);

    //ADD RESERVATION TO DATABASE.
    $reservationobj = new reservation();
    $reservationobj->showID = $showID;
    $reservationobj->visitorID = $visitorobj->visitorID;
    $reservationobj->countPeople = $countPeople;
    $reservationobj->sector = $sector;
    $reservationobj->referral = $referral;

    //SEND CONFIRMATION EMAIL.
    include "mailing/confirmation.php";
    $mail = makeConfirmation($reservationobj, $showID, $visitorName, $visitorEmail);
    $subject = 'Betreft: reserveringsbevestiging';
    sendMail($visitorEmail, $mail, $subject);

    //EVERYTHING CHECKED AND CORRECT.
    if ($reservationDL->createReservation($reservationobj) === "")
    {
        return true;
    }
}
