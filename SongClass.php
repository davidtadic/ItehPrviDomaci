<?php

include_once ('response.php');

class Song
{
    public $id;
    public $name_song;
    public $id_album;
    public $id_band;
    public $id_genre;

    public function __construct($name_song, $id_album, $id_band, $id_genre)
    {
        $this->name_song = $name_song;
        $this->id_album = $id_album;
        $this->id_band = $id_band;
        $this->id_genre = $id_genre;
    }

    public static function getAllSongs(){
        include_once('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM song";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $song = new Song($row->name_song,$row->id_album,$row->id_band, $row->id_genre);
            $song->id = $row->id_song;
            array_push($arrayResult, $song);
        }
        return $arrayResult;
    }

    public function addNewSong(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "INSERT INTO song(name_song, id_album, id_band, id_genre) VALUES ('"
            . $mysqli->real_escape_string($this->name_song) . "','"
            . $mysqli->real_escape_string($this->id_album) . "','"
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

        $sql = "select * from song where id_song=".$id;

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $song = null;
        while($row = $result->fetch_object()){
            $song = new Song($row->name_song, $row->id_album, $row->id_band, $row->id_genre);
            $song->id = $row->id_song;
        }

        return $song;
    }

    public function deleteById(){
        include_once ('mysql_connection.php');
        global $mysqli;

        $sql = "DELETE FROM song WHERE id_song=".$this->id;

        if ($mysqli->query($sql)) {
            echo json_encode(new Response(1, "Song deleted."));
            return true;
        } else {
            echo json_encode(new Response(0, "Song is currently being used."));
            return false;
        }
    }

    public function editSong(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "UPDATE song SET name_song = '" . $this->name_song . "', id_album = '" . $this->id_album . "', id_band = '" . $this->id_band . "', id_genre = '" . $this->id_genre . "' WHERE id_song = $this->id";
        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }


}