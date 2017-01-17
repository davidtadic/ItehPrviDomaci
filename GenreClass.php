<?php
include_once ('response.php');
class Genre
{
    public $id;
    public $name_genre;

    public function __construct($name_genre)
    {
        $this->name_genre = $name_genre;
    }

    public function addNewGenre()
    {
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "INSERT INTO genre(name_genre) VALUES ('"
        . $mysqli->real_escape_string($this->name_genre) . "')";

        if ($mysqli->query($query)) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function getAllGenres(){
        include_once('mysql_connection.php');
        global $mysqli;
        $sql = "SELECT * FROM genre";

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $genre = new Genre($row->name_genre);
            $genre->id = $row->id_genre;
            array_push($arrayResult, $genre);
        }
        return $arrayResult;
    }

    public static function getById($id){
        include_once ('mysql_connection.php');
        global $mysqli;

        $sql = "select * from genre where id_genre=" . $id;

        if(!($result = $mysqli->query($sql))) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }
        $genre = null;
        while($row = $result->fetch_object()){
            $genre = new Genre($row->name_genre);
            $genre->id = $row->id_genre;
        }

        return $genre;
    }

    public function deleteById(){
        include_once('mysql_connection.php');
        global $mysqli;
        $query = "DELETE FROM genre WHERE id_genre = $this->id";
        if ($mysqli->query($query)) {
            echo json_encode(new Response(1, "Genre deleted."));
            return true;
        } else {
            echo json_encode(new Response(0, "Genre is currently being used."));
            return false;
        }
    }

}