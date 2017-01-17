<?php
include_once ('response.php');

class Album
{
    public $id;
    public $name_album;
    public $year_published;
    public $id_band;
    public $id_genre;

    public function __construct($name_album, $year_published, $id_band, $id_genre)
    {
        $this->name_album = $name_album;
        $this->year_published = $year_published;
        $this->id_band = $id_band;
        $this->id_genre = $id_genre;
    }

    public static function getAllAlbums(){
        include_once ('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM album";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $album = new Album($row->name_album,$row->year_published,$row->id_band, $row->id_genre);
            $album->id = $row->id_album;
            array_push($arrayResult, $album);
        }
        return $arrayResult;
    }

    public function addNewAlbum(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "INSERT INTO album(name_album, year_published, id_band, id_genre) VALUES ('"
            . $mysqli->real_escape_string($this->name_album) . "','"
            . $mysqli->real_escape_string($this->year_published) . "','"
            . $mysqli->real_escape_string($this->id_band) . "','"
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

        $sql = "select * from album where id_album=".$id;

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $album = null;
        while($row = $result->fetch_object()){
            $album = new Album($row->name_album, $row->year_published, $row->id_band, $row->id_genre);
            $album->id = $row->id_album;
        }

        return $album;
    }

    public function deleteById(){
        include_once ('mysql_connection.php');
        global $mysqli;

        $sql = "DELETE FROM album WHERE id_album=".$this->id;

        if ($mysqli->query($sql)) {
            echo json_encode(new Response(1, "Album deleted."));
            return true;
        } else {
            echo json_encode(new Response(0, "Album is currently being used."));
            return false;
        }
    }

    public function editAlbum(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "UPDATE album SET name_album = '" . $this->name_album . "', year_published = '" . $this->year_published . "', id_band = '" . $this->id_band . "', id_genre = '" . $this->id_genre . "' WHERE id_album = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

}