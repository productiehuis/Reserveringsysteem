<?php
require_once '../class/performanceDL.php';
require_once "../class/reservationDL.php";

$performance = new performanceDL();
$performanceobj = new performance();
$reservation = new reservationDL();
ini_set( 'display_errors', 1);
ini_set('error_reporting', 1);
ini_set('log_errors', 1);

$date = new DateTimeImmutable();
$checkDate = $date->add(new DateInterval('P1D'));



foreach ($performance->readAllPerformanceOn($checkDate) as $item)
{
    $allReservations = $reservation->readReservedEmailReminder($item->showID);

    echo '<pre>';
    var_dump($allReservations);
    echo '</pre>';

    for ($i = 0; $i < count($allReservations); $i++)
    {

        echo $allReservations[$i]['visitorEmail'];
    }

    /*foreach ($allReservations as $reservation)
    {


        include 'reminder.php';
        $message = makeReminder($item, $reservation["visitorName"], $reservation["visitorEmail"]);
        if (sendMail($reservation["visitorEmail"], $message))
        {
            echo "SENT";
        }
        else
        {
            echo "NOT SENT";
        }
    }*/
}
