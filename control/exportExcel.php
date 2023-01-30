<?php
if (array_key_exists('id', $_GET))
{
    $showid = $_GET['id'];
    require_once "class/reservationDL.php";
    $reservation = new reservationDL();

    $allReservations = $reservation->readReserved($showid);

    // Filter Customer Data
    function filterCustomerData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    $fileName = 'Export ' . date('d') . "-" . date('m') . "-" . date('Y') . " " . date("H:i:s") . ".xls";

    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/vnd.ms-excel");

    //To define column name in first row.
    $column_names = false;
    // run loop through each row in $customers_data
    foreach ($allReservations as $row) {
        if (!$column_names) {
            echo implode("\t", array_keys($row)) . "\n";
            $column_names = true;
        }
        // The array_walk() function runs each array element in a user-defined function.
        array_walk($row, 'filterCustomerData');
        echo implode("\t", array_values($row)) . "\n";
    }
    exit;
}