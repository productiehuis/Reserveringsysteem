<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "class/visitorDL.php";
    $visitorDL = new visitorDL();
    require_once "class/reservationDL.php";
    $reservationDL = new reservationDL();
    require_once "class/performanceDL.php";
    $performanceDL = new performanceDL();

    $showID = $_POST["showID"];
    $visitorName = $_POST["name"];
    $visitorEmail = $_POST["email"];
    $countPeople = $_POST["amount"];

    $maxSeats = $performanceDL->readPerformance($showID)->max;

    $reservedSeats = $reservationDL->checkReserved($showID);

    if (($countPeople + $reservedSeats) <= $maxSeats)
    {
        $visitorobj = new visitor();
        $visitorobj->visitorName = $visitorName;
        $visitorobj->visitorEmail = $visitorEmail;

        $visitorID = $visitorDL->createVisitor($visitorobj);

        $reservationobj = new reservation();

        $reservationobj->visitorID = $visitorID;
        $reservationobj->showID = $showID;
        $reservationobj->countPeople = $countPeople;

        $result = $reservationDL->createReservation($reservationobj);

        if ($result === "")
        {
            header("Location: ../pages/reserveren.php?v=$showID&s=1");
        }
        else
        {
            header("Location: ../pages/reserveren.php?v=$showID&s=0");
        }
    }
    else
    {
        header("Location: ../pages/reserveren.php?v=$showID&s=2");
    }
}