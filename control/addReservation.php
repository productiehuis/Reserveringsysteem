<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $visitorEmail = $_POST["email"];
    $showID = $_POST["showID"];

    //CHECK IF EMAILADDRESS IS VALID.
    if (!filter_var($visitorEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../pages/reserveren.php?v=$showID&s=3");
        return false;
    }

    $visitorName = $_POST["name"];
    $countPeople = $_POST["amount"];

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
        header("Location: ../pages/reserveren.php?v=$showID&s=2");
        return false;
    }

    //ADD VISITOR TO DATABASE.
    $visitorobj = new visitor();
    $visitorobj->visitorID = $visitorDL->createVisitor($visitorobj);
    $visitorobj->visitorName = $visitorName;
    $visitorobj->visitorEmail = $visitorEmail;

    //ADD RESERVATION TO DATABASE.
    $reservationobj = new reservation();
    $reservationobj->visitorID = $visitorobj->visitorID;
    $reservationobj->showID = $showID;
    $reservationobj->countPeople = $countPeople;

    if ($reservationDL->createReservation($reservationobj) === "")
    {
        header("Location: ../pages/reserveren.php?v=$showID&s=1");
        return false;
    }

    //SEND CONFIRMATION EMAIL.
    include "mailing/confirmation.php";
    $mail = makeConfirmation($reservationobj, $showID, $visitorName, $visitorEmail);
    $subject = 'Betreft: reserveringsbevestiging';
    sendMail($visitorEmail, $mail, $subject);

    //EVERYTHING CHECKED AND CORRECT.
    header("Location: ../pages/reserveren.php?v=$showID&s=0");
    return true;
}
else
{
    header("Location: ../index.php");
}
