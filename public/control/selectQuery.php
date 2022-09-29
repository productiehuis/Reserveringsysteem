<?php
require_once "connection.php";
class selectQuery extends connection
{
    protected $con;

    public function __construct()
    {
        parent::__construct();
        $this->con = parent::conn();
    }

    public function selectBezoeker(string $email)
    {
        $cleanEmail = $this->sanatize($email);

        $stmt = $this->con->prepare("SELECT * FROM bezoeker WHERE BezoekerEmail = ?");
        $stmt->bind_param("s", $cleanEmail);
        $stmt->execute();

        return $stmt->fetch();
    }
}
