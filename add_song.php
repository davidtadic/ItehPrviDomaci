<?php
include ('layout.php');
include ('GenreClass.php');
include ('BandClass.php');
include ('AlbumClass.php');
include ('SongClass.php');


if(isset($_GET['save'])){
    $song = new Song($_GET['name_song'], $_GET['id_album'], $_GET['id_band'], $_GET['id_genre']);
    $song->addNewSong();
    header('Location: song.php');
}
?>


<div class="container">
    <form class="well form-horizontal" action=" " method="get" id="album_form">
        <fieldset>

            <legend>Add New Song</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4">
                    <input name="name_song" placeholder="Song" class="form-control" type="text" required minlength="2">
                </div>
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Album</label>
                <div class="col-md-4 form-inline">
                    <select name="id_album" class="form-control right" required onchange="handleSelectAlbum(this)">
                        <option value="">Name</option>

                        <?php
                        $albums = Album::getAllAlbums();
                        if(count($albums) > 0){
                            foreach ($albums as $album) {
                                echo "<option value=".$album->id.">".$album->name_album."</option>";
                            }
                        }
                        else {
                            echo "<option value". " " ."> There are no albums available.</option>";
                        }
                        ?>
                        <option value="add_album.php">Add another</option>
                    </select>
                    <script type="text/javascript">
                        function handleSelectAlbum(elm) {
                            if(elm.value == "add_album.php"){
                                window.location = elm.value;
                            }
                        }
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Band/Artist</label>
                <div class="col-md-4 form-inline">
                    <select name="id_band" class="form-control right" required onchange="handleSelectBand(this)">
                        <option value="">Name</option>
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
                <div class="col-md-4 form-inline">
                    <button type="submit" name="save" class="btn btn-primary">Enter</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
