<?php
include ('BandClass.php');
include ('GenreClass.php');

if(isset($_GET['id'])){
    $idBand = $_GET['id'];
    $band = Band::getById($idBand);
    //echo '<script>console.log('.$band->id.')</script>';

}

if(isset($_GET['update'])){
    $band = Band::getById($_GET['id']);
    $band->name_band = $_GET['name_band'];
    $band->years_active = $_GET['year_from']." - ".$_GET['year_now'];
    $band->country = $_GET['country'];
    $band->id_genre = $_GET['id_genre'];
    $band->editBand();
    header('Location: band.php');

}


?>
<div class="container">
    <form class="well form-horizontal" action="editBand.php" method="get" id="band_form1">
        <fieldset>

            <legend>Edit Band</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4">
                    <input name="name_band" value="<?php echo $band->name_band; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Years Active</label>
                <div class="col-md-4 form-inline" style="width: 100px; margin-right: 25px">
                    <input name="year_from" value="<?php echo substr($band->years_active,0,4); ?>" class="form-control" type="text" required minlength="4" maxlength="4" style="width: 100px">
                </div>
                <div class="col-md-4 form-inline" style="width: 100px">
                    <input name="year_now" value="<?php echo substr($band->years_active, strlen($band->years_active)-4,4); ?>" class="form-control" type="text" required minlength="3" maxlength="4" style="width: 100px">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-4">
                    <input name="country" value="<?php echo $band->country; ?>" class="form-control" type="text" required minlength="3">
                </div>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Choose Genre</label>
                <div class="col-md-4 form-inline">
                    <select name="id_genre" class="form-control right" required onchange="handleSelect(this)">
                        <option value="">Genre</option>
                        <?php
                            $genres = Genre::getAllGenres();
                        if(count($genres) > 0){
                            foreach ($genres as $genre) {
                                echo "<option value=".$genre->id.">".$genre->name_genre."</option>";
                            }
                        }
                        else {
                            echo "<option value". " " ."> There are no genres available.</option>";
                        }
                        ?>
                        <option value="add_genre.php">Add another</option>
                    </select>
                        <script type="text/javascript">
                            function handleSelect(elm) {
                                if(elm.value == "add_genre.php"){
                                window.location = elm.value;
                                }
                            }
                        </script>
                </div>
            </div>
            <div class="col-md-4 form-inline">
                <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
            </div>
        </fieldset>
    </form>
</div>