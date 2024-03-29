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

    public function createReservation(reservation $data)
    {
        $cleanVisitorID = $this->sanitize($data->visitorID);
        $cleanShowID = $this->sanitize($data->showID);
        $cleanCountPeople = $this->sanitize($data->countPeople);
        $cleanSector = $this->sanitize($data->sector);
        $cleanReferral = $this->sanitize($data->referral);

        $stmt = $this->con->prepare("INSERT INTO reservation(visitorID, showID, countPeople, sector, referral) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $cleanVisitorID, $cleanShowID, $cleanCountPeople, $cleanSector, $cleanReferral);
        $stmt->execute();
        return $stmt->error;
    }

    public function checkReserved(int $showID)
    {
        $cleanShowID = $this->sanitize($showID);

        $stmt = $this->con->prepare("SELECT SUM(countPeople) as reserved FROM reservation WHERE showID = ?");
        $stmt->bind_param("i", $cleanShowID);
        $stmt->execute();
        $result = $stmt->get_result();
        $amount = intval($result->fetch_assoc()["reserved"]);
        if (empty($stmt->error))
        {
            return $amount;
        }
        else
        {
            return $stmt->error;
        }
    }

    public function readReserved(int $showID)
    {
        $cleanShowID = $this->sanitize($showID);

        $stmt = $this->con->prepare("SELECT * FROM reservation R JOIN visitor V ON R.visitorID = V.visitorID WHERE showID = ?");
        $stmt->bind_param("i", $cleanShowID);
        $stmt->execute();

        $result = $stmt->get_result();

        $return = [];

        while ($row = $result->fetch_object())
        {
            $reserved = array("Bezoekernaam" => $row->visitorName, "Bezoekeremail" => $row->visitorEmail, "Aantalmensen" => $row->countPeople, "Afdeling" => $row->sector, "Verwijzing" => $row->referral);

            array_push($return, $reserved);
        }

        return $return;
    }

    public function readReservedEmailReminder(int $showID)
    {
        $cleanShowID = $this->sanitize($showID);

        $stmt = $this->con->prepare("SELECT V.visitorEmail, V.visitorName FROM reservation R JOIN visitor V ON R.visitorID = V.visitorID WHERE showID = ?");
        $stmt->bind_param("i", $cleanShowID);
        $stmt->execute();
        $result = $stmt->get_result();

        $return = [];

        while ($row = $result->fetch_assoc())
        {
            $return[] = $row;
        }

        return $return;
    }
}
