<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "class/performanceDL.php";
    $performanceDL = new performanceDL();
    $performanceobj = new performance();

    $performanceobj->name = $_POST["title"];
    $performanceobj->description = $_POST["description"];
    $performanceobj->location = $_POST["location"];
    $performanceobj->starttime = $_POST["time"];
    $performanceobj->date = new DateTimeImmutable($_POST["date"]);
    $performanceobj->max = $_POST["max"];

    $result = $performanceDL->createPerformance($performanceobj);

    if ($result === "")
    {
        header("Location: ../pages/vertoning.php?s=1");
    }
    else
    {
        header("Location: ../pages/vertoning.php?s=0");
    }
}
