<?php
include ('GenreClass.php');
include ('BandClass.php');
include ('AlbumClass.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $album = Album::getById($id);
    //echo '<script>console.log('.$band->id.')</script>';
}

if(isset($_GET['update'])){
    $album = Album::getById($_GET['id']);
    $album->name_album = $_GET['name_album'];
    $album->year_published = $_GET['year_published'];
    $album->id_band = $_GET['band'];
    $album->id_genre = $_GET['genre'];
    $album->editAlbum();
    header('Location: album.php');
}

?>


<div class="container">
    <form class="well form-horizontal" action="editAlbum.php" method="get" id="album_form1">
        <fieldset>

            <legend>Edit Album</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4">
                    <input name="name_album" value="<?php echo $album->name_album; ?>" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Year Published</label>
                <div class="col-md-4">
                    <input name="year_published" value="<?php echo $album->year_published; ?>" class="form-control" type="text" required minlength="4" maxlength="4">
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Choose Band</label>
                <div class="col-md-4 form-inline">
                    <select name="band" class="form-control right" required onchange="handleSelectBand(this)">
                        <option value="">Band</option>
                        <?php
                        $bands = Band::getAllBands();
                        if(count($bands) > 0){
                            foreach ($bands as $band) {
                                echo "<option value=".$band->id.">".$band->name_band."</option>";
                            }
                        }
                        else {
                            echo "<option value". " " ."> There are no bands available.</option>";
                        }
                        ?>
                        <option value="add_band.php">Add another</option>
                    </select>
                    <script type="text/javascript">
                        function handleSelectBand(elm) {
                            if(elm.value == "add_band.php"){
                                window.location = elm.value;
                            }
                        }
                    </script>
                </div>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Choose Genre</label>
                <div class="col-md-4 form-inline">
                    <select name="genre" class="form-control right" required onchange="handleSelect(this)">
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
                <div class="col-md-4 form-inline">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
