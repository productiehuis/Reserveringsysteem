<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "class/performanceDL.php";
    $performanceobj = new performance();
    $performanceobj->name = $_POST["title"];
    $performanceobj->description = $_POST["description"];
    $performanceobj->location = $_POST["location"];
    $performanceobj->starttime = $_POST["time"];
    $performanceobj->date = new DateTimeImmutable($_POST["date"]);
    $performanceobj->max = $_POST["max"];

    $performanceDL = new performanceDL();
    if ($performanceDL->createPerformance($performanceobj) === "")
        return true;
    else
        return false;
}


