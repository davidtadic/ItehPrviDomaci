<?php
include ('layout.php');
include ('GenreClass.php');
include ('BandClass.php');
if(isset($_POST['save'])){
    $band = new Band($_POST['name_band'], ($_POST['year_from']." - ".$_POST['year_now']), $_POST['country'], $_POST['id_genre']);
    $band->addNewBand();
    header('Location: band.php');
}



?>
<div class="container">
    <form class="well form-horizontal" action=" " method="post" id="band_form">
        <fieldset>

            <legend>Add New Band</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4">
                    <input name="name_band" placeholder="Band" class="form-control" type="text" required minlength="2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Years Active</label>
                <div class="col-md-4 form-inline" style="width: 100px; margin-right: 25px">
                    <input name="year_from" placeholder="From" class="form-control" type="text" required minlength="4" maxlength="4" style="width: 100px">
                </div>
                <div class="col-md-4 form-inline" style="width: 100px">
                    <input name="year_now" placeholder="Till" class="form-control" type="text" required minlength="3" maxlength="4" style="width: 100px">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-4">
                    <input name="country" placeholder="Country" class="form-control" type="text" required minlength="3">
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
