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
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function selectAccount(string $username)
    {
        $cleanUsername = $this->sanatize($username);

        $stmt = $this->con->prepare("SELECT * FROM Account WHERE userName = ?");
        $stmt->bind_param("s", $cleanUsername);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
