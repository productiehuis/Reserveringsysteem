<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "class/performanceDL.php";
    $performanceDL = new performanceDL();

    $performanceobj = new performance();
    $performanceobj->showID = $_POST["id"];
    $performanceobj->name = $_POST["title"];
    $performanceobj->description = $_POST["description"];
    $performanceobj->location = $_POST["location"];
    $performanceobj->starttime = $_POST["time"];
    $performanceobj->date = new DateTimeImmutable($_POST["date"]);
    $performanceobj->max = $_POST["max"];

    if ($performanceDL->updatePerformance($performanceobj) == "")
        return true;
    else
        return false;
}
