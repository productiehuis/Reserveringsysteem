<?php
require_once "control/class/performanceDL.php";

$performanceDL = new performanceDL();

$allperformances = $performanceDL->readAllPerformance();

$count = 1;

echo "<div class='row'>";
foreach ($allperformances as $row)
{
    $currentDate = new DateTimeImmutable();
    $date = $row->date->format('d-m-Y');

    if ($row->date > $currentDate)
    {
        echo "
            <div class='col-sm-3 mt-3'>
                <div class='card'>
                    <img src='/img/placeholder.png' class='rounded card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>$row->name</h5>
                        <p class='card-text'>
                            $row->description
                        </p>
                        <a id='$row->showID' class='reservation btn btn-primary mb-2'>Reserveren</a>
                        <p class='card-text'><small class='text-muted'>Datum: $date $row->starttime</small></p>
                        <p class='card-text'><small class='text-muted'>Locatie: $row->location</small></p>
                    </div>
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
//href='/pages/reserveren.php?v=$row->showID'
