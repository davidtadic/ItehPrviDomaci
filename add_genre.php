<?php
    include ('layout.php');
    include ('GenreClass.php');

    if (isset($_POST["save"])) {
        $genre = new Genre($_POST['name_genre']);
        $genre->addNewGenre();
        header('Location: genre.php');
    }
?>

<div class="container">
    <form class="well form-inline" action=" " method="post" id="genre_form">
        <fieldset>

            <legend>Add New Genre</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">New Genre</label>
                <div class="col-md-4">
                    <input name="name_genre" placeholder="Genre" class="form-control" type="text" required minlength="3">
                </div>

            </div>

            <div class="form-group">
                <div class="col-md-4">
                    <button type="submit" name="save" class="btn btn-primary">Enter</button>
                </div>
            </div>

        </fieldset>
    </form>
    </div>