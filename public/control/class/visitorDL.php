<?php
require_once "models/connection.php";
include "models/visitor.php";
class visitorDL extends connection
{
    protected $con;

    public function __construct()
    {
        parent::__construct();
        $this->con = parent::conn();
    }

    public function createVisitor(visitor $data)
    {
        $cleanVisitorName = $this->sanitize($data->visitorName);
        $cleanVisitorEmail = $this->sanitize($data->visitorEmail);

        if (empty($this->readVisitor($cleanVisitorEmail)))
        {
            $stmt = $this->con->prepare("INSERT INTO visitor(visitorName, visitorEmail) VALUES(?, ?)");
            $stmt->bind_param("ss", $cleanVisitorName, $cleanVisitorEmail);
            $stmt->execute();
            return $stmt->error;
        }
        else
        {
            return "Exists";
        }
    }

    public function readVisitor(string $email)
    {
        require_once "models/visitor.php";

        $visitor = new visitor();
        $cleanEmail = $this->sanitize($email);

        $stmt = $this->con->prepare("SELECT * FROM visitor WHERE visitorEmail = ?");
        $stmt->bind_param("s", $cleanEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        $stmt->close();

        if (!empty($item))
        {
            $visitor->visitorID = $item["visitorID"];
            $visitor->visitorName = $item["visitorName"];
            $visitor->visitorEmail = $item["visitorEmail"];

            return $visitor;
        }
        else
        {
            return "Doesnt exist";
        }
    }
}
