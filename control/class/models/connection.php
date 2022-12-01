<?php
class connection
{
    private string $host = "reserveringsysteem.mysql.database.azure.com";
    private string $username = "productiehuis";
    private string $password = "P@ssword1234";
    private string $dbname = "theaterreservering";

    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if (file_exists("connection_local.php"))
        {
            include "connection_local.php";
            return;
        }
    }

    protected function conn()
    {
        try
        {
            $con = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            return $con;
        }
        catch (mysqli_sql_exception $exception)
        {
            $con = "Database connection failed contact an administrator with the following error. " . $exception->getMessage();
            return $con;
        }
    }

    public function sanitize($input)
    {
        return mysqli_real_escape_string($this->conn(), strip_tags($input));
    }
}
