<?php
require_once "models/connection.php";
include "models/reservation.php";
class reservationDL extends connection
{
    protected $con;

    public function __construct()
    {
        parent::__construct();
        $this->con = parent::conn();
    }


}
