<?php
if (array_key_exists('id', $_GET))
{
    require_once "class/reservationDL.php";
    $reservation = new reservationDL();

    $showid = $_GET['id'];

    $allReservations = $reservation->readReserved($showid);

    function filterCustomerData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    $fileName = 'Export ' . date('d') . "-" . date('m') . "-" . date('Y') . " " . date("H:i:s") . ".xls";

    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/vnd.ms-excel");

    $column_names = false;
    foreach ($allReservations as $row)
    {
        if (!$column_names)
        {
            echo implode("\t", array_keys($row)) . "\n";
            $column_names = true;
        }
        array_walk($row, 'filterCustomerData');
        echo implode("\t", array_values($row)) . "\n";
    }
    exit;
}
