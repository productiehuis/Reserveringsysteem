<?php
require_once "../class/performanceDL.php";
require_once "../class/reservationDL.php";
require_once "../mailing/reminder.php";
$performance = new performanceDL();
$reservation = new reservationDL();

$date = new DateTimeImmutable();
$checkDate = $date->add(new DateInterval('P1D'));

foreach ($performance->readAllPerformanceOn($checkDate) as $item)
{
    $performanceobj = $performance->readPerformance($item->showID);
    $allReservations = $reservation->readReservedEmailReminder($item->showID);

    for ($i = 0; $i < count($allReservations); $i++)
    {
        $message = makeReminder($performanceobj, $allReservations[$i]['visitorName'], $allReservations[$i]['visitorEmail']);
        $subject = "Herinnering reservering";
        sendMail($allReservations[$i]['visitorEmail'], $message, $subject);
    }
}
