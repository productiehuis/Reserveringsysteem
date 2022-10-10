<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "class/insertQuery.php";
    $insert = new insertQuery;

    $cleanTitle = $insert->sanatize($_POST["title"]);
    $cleanLocation = $insert->sanatize($_POST["location"]);
    $cleanTime = $insert->sanatize($_POST["time"]);
    $cleanDate = $insert->sanatize($_POST["date"]);
    $cleanMax = $insert->sanatize($_POST["max"]);

    $data = [$cleanTitle, $cleanTime, $cleanDate, $cleanLocation, $cleanMax];

    $result = $insert->insertVoorstelling($data);

    $insert = null;

    if ($result === "")
    {
        header("Location: ../pages/vertoning.php?s=1");
    }
    else
    {
        header("Location: ../pages/vertoning.php?s=0");
    }

}
