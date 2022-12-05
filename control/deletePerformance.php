<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "class/performanceDL.php";
    $performanceDL = new performanceDL();

    $showID = $_POST["id"];

    if ($performanceDL->deletePerformance($showID) == "")
    {
        echo 0;
    }
    else
    {
        echo 1;
    }
}
