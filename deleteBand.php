<?php
include ('BandClass.php');
if (isset ($_GET['id'])){
    $id=$_GET['id'];
    $band = Band::getById($id);
    $band->deleteById();
}
