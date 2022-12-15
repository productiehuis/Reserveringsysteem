<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "class/performanceDL.php";
    $performanceDL = new performanceDL();

    $showID = $_POST["id"];

    if ($performanceDL->deletePerformance($showID) == "")
        return true;
    else
        return false;
}
