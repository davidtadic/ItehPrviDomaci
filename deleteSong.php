<?php
include ('SongClass.php');
if (isset ($_GET['id'])){
    $id=$_GET['id'];
    $song = Song::getById($id);
    $song->deleteById();
}
