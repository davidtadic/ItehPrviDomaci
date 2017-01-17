<?php
include_once ('response.php');

class Band
{
    public $id;
    public $name_band;
    public $years_active;
    public $country;
    public $id_genre;

    public function __construct($name_band, $years_active, $country, $id_genre)
    {
        $this->name_band = $name_band;
        $this->years_active = $years_active;
        $this->country = $country;
        $this->id_genre = $id_genre;
    }

    public static function getAllBands(){
        include_once('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM band ORDER  BY name_band";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $band = new Band($row->name_band,$row->years_active,$row->country, $row->id_genre);
            $band->id = $row->id_band;
            array_push($arrayResult, $band);
        }
        return $arrayResult;
    }

    public function addNewBand(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "INSERT INTO band(name_band, years_active, country, id_genre) VALUES ('"
            . $mysqli->real_escape_string($this->name_band) . "','"
            . $mysqli->real_escape_string($this->years_active) . "','"
            . $mysqli->real_escape_string($this->country) . "','"
            . $mysqli->real_escape_string($this->id_genre) . "')";

        if ($mysqli->query($query)) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function getById($id){
        include_once ('mysql_connection.php');
        global $mysqli;

        $sql = "select * from band where id_band= $id";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $band = null;
        while($row = $result->fetch_object()){
            $band = new Band($row->name_band, $row->years_active, $row->country, $row->id_genre);
            $band->id = $row->id_band;
        }

        return $band;
    }

    public function deleteById(){
        include_once ('mysql_connection.php');
        global $mysqli;

        $sql = "DELETE FROM band WHERE id_band=".$this->id;

        if ($mysqli->query($sql)) {
            echo json_encode(new Response(1, "Band deleted."));
            return true;
        } else {
            echo json_encode(new Response(0, "Band is currently being used."));
            return false;
        }
    }

    public function editBand(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "UPDATE band SET name_band = '" . $this->name_band . "', years_active = '" . $this->years_active . "', country = '" . $this->country . "', id_genre = '" . $this->id_genre . "' WHERE id_band = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

}