<?php
include ('AlbumClass.php');
if (isset ($_GET['id'])){
    $id=$_GET['id'];
    $album = Album::getById($id);
    $album->deleteById();
}
