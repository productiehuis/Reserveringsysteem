<?php
require_once "models/connection.php";
include "models/performance.php";
class performanceDL extends connection
{
    protected $con;

    public function __construct()
    {
        parent::__construct();
        $this->con = parent::conn();
    }

    public function createPerformance(performance $data)
    {
        $cleanVoorstellingNaam = $this->sanitize($data->name);
        $cleanDescription = $this->sanitize($data->description);
        $cleanBegintijd = $this->sanitize($data->starttime);
        $cleanDatum = date_format($data->date, "Y-m-d");
        $cleanLocatie = $this->sanitize($data->location);
        $cleanMax = $this->sanitize($data->max);

        $stmt = $this->con->prepare("INSERT INTO performance(showName, description, startTime, date, location, Max_seats, past) VALUES(?, ?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("sssssi", $cleanVoorstellingNaam, $cleanDescription, $cleanBegintijd, $cleanDatum, $cleanLocatie, $cleanMax);
        $stmt->execute();
        return $stmt->error;
    }

    public function readPerformance(int $showId)
    {
        $performance = new performance();
        $cleanId = intval($this->sanitize($showId));

        $stmt = $this->con->prepare("SELECT * FROM performance WHERE showID = ?");
        $stmt->bind_param("i", $cleanId);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        $stmt->close();

        if (!empty($item))
        {
            $performance->showID = $item["showID"];
            $performance->name = $item["showName"];
            $performance->description = $item["description"];
            $performance->starttime = $item["startTime"];
            $performance->date = $item["date"];
            $performance->location = $item["location"];
            $performance->max = $item["Max_seats"];
            $performance->past = $item["Past"];
            return $performance;
        }
        else
        {
            return "Doesnt exist";
        }
    }

    public function readAllPerformance()
    {
        $stmt = $this->con->prepare("SELECT * FROM performance");
        $stmt->execute();
        $result = $stmt->get_result();

        $return = [];

        while ($row = $result->fetch_object())
        {
            $performanceobj = new performance();

            $performanceobj->showID = $row->showID;
            $performanceobj->name = $row->showName;
            $performanceobj->description = $row->description;
            $performanceobj->starttime = $row->startTime;
            $performanceobj->date =  new DateTimeImmutable($row->date);
            $performanceobj->location = $row->location;
            $performanceobj->max = $row->Max_seats;
            $performanceobj->past = $row->Past;

            $return[] = $performanceobj;
        }

        return $return;
    }

    public function deletePerformance(int $showId)
    {
        $cleanId = intval($this->sanitize($showId));

        $stmt = $this->con->prepare("DELETE FROM performance WHERE showID = ?");
        $stmt->bind_param("i", $cleanId);
        $stmt->execute();

        return $stmt->error;
    }
}
