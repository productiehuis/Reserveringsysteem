<?php
require_once "./control/class/performanceDL.php";

$performanceDL = new performanceDL();

$allperformances = $performanceDL->readAllPerformance();

$count = 1;

echo "<div class='row'>";
foreach ($allperformances as $row)
{
    $currentDate = new DateTimeImmutable();
    $convertDate = date_format($row->date, "d-m-Y");

    if ($row->date > $currentDate)
    {
        echo "
            <div class='card col-3'>
                <img src='/img/placeholder.png' class='rounded mt-2 card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>$row->name</h5>
                    <p class='card-text'>
                        $row->description
                    </p>
                    <a id='$row->showID' href='/pages/reserveren.php?v=$row->showID' class='reservation btn btn-primary mb-2'>Reserveren</a>
                    <p class='card-text'><small class='text-muted'>Datum: $row->date $row->starttime</small></p>
                    <p class='card-text'><small class='text-muted'>Locatie: $row->location</small></p>
                </div>
            </div>
            ";

        if ($count % 4 == 0 && $count < count($allperformances))
        {
            echo "</div><div class='row'>";
        }
        $count++;
    }
}
echo "</div>";
