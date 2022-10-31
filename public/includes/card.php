<?php
require_once "./control/class/performanceDL.php";

$performanceDL = new performanceDL();

$allperformances = $performanceDL->readAllPerformance();

foreach ($allperformances as $row)
{
    echo "
    <div class=\"card col-3\">
        <img src=\"/reserveringsysteem/public/img/placeholder.png\" class=\"rounded mt-2 card-img-top\" alt=\"...\">
        <div class=\"card-body\">
            <h5 class=\"card-title\">$row->name</h5>
            <p class=\"card-text\">
                $row->description
            </p>
            <a id='$row->showID' href=\"/reserveringsysteem/public/pages/reserveren.php?v=$row->showID\" class=\"reservation btn btn-primary mb-2\">Reserveren</a>
            <p class=\"card-text\"><small class=\"text-muted\">Datum: $row->date $row->starttime</small></p>
            <p class='card-text'><small class='text-muted'>Locatie: $row->location</small></p>
        </div>
    </div>
    ";
}
