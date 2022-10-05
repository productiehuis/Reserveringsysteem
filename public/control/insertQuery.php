<?php
require_once "connection.php";
class insertQuery extends connection
{
    protected $con;

    public function __construct()
    {
        parent::__construct();
        $this->con = parent::conn();
    }

    public function insertAccount(array $data)
    {
        if (sizeof($data) == 3)
        {
            $cleanUsername = $this->sanatize($data[0]);
            $cleanHashedPassword = password_hash($data[1], PASSWORD_BCRYPT);
            $cleanUserLevel = $this->sanatize($data[2]);

            $stmt = $this->con->prepare("INSERT INTO account(userName, userHashedPassword, userLevel) VALUES(?, ?, ?)");
            $stmt->bind_param("ssi", $cleanUsername, $cleanHashedPassword, $cleanUserLevel);
            $stmt->execute();
            return $stmt->error;
        }
        else
        {
            return "Te weinig/veel parameters meegegeven.";
        }
    }

    public function insertVoorstelling(array $data)
    {
        if (sizeof($data) == 5)
        {
            $cleanVoorstellingNaam = $this->sanatize($data[0]);
            $cleanBegintijd = $this->sanatize($data[1]);
            $cleanDatum = $this->sanatize($data[2]);
            $cleanLocatie = $this->sanatize($data[3]);
            $cleanMax = $this->sanatize($data[4]);

            $stmt = $this->con->prepare("INSERT INTO voorstellingen(VoorstellingNaam, Begintijd, Datum, Locatie, Max_zitplaats, Voorbij) VALUES(?, ?, ?, ?, ?, 0)");
            $stmt->bind_param("ssssi", $cleanVoorstellingNaam, $cleanBegintijd, $cleanDatum, $cleanLocatie, $cleanMax);
            $stmt->execute();
            return $stmt->error;
        }
        else
        {
            return "Te weinig/veel parameters meegegeven.";
        }
    }

    public function insertBezoeker(array $data)
    {
        if (sizeof($data) == 2)
        {
            $cleanBezoekerNaam = $this->sanatize($data[0]);
            $cleanBezoekerEmail = $this->sanatize($data[1]);

            require_once "selectQuery.php";
            $select = new selectQuery;

            if (!empty($select->selectBezoeker($cleanBezoekerEmail)))
            {
                return "BESTAAT AL";
            }
            else
            {
                $stmt = $this->con->prepare("INSERT INTO bezoeker(BezoekerNaam, BezoekerEmail) VALUES(?, ?)");
                $stmt->bind_param("ss", $cleanBezoekerNaam, $cleanBezoekerEmail);
                $stmt->execute();
                return $stmt->error;
            }
        }
        else
        {
            return "Te weinig/veel parameters meegegeven.";
        }
    }

    public function insertReservering(array $data)
    {

    }
}
