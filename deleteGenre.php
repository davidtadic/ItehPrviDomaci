<?php
include ('GenreClass.php');
if (isset ($_GET['id'])){
    $id=$_GET['id'];
    $genre = Genre::getById($id);
    $genre->deleteById();
}
