<?php
include ('layout.php');
include ('GenreClass.php');
include ('BandClass.php');
include ('AlbumClass.php');
include ('SongClass.php');

?>
<script type="text/javascript" src="song.js"></script>

<div class="container">
    <table id="song-table" class="table table-hover">
        <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Song
            </th>
            <th>
                Album
            </th>
            <th>
                Band/Artist
            </th>
            <th>
                Genre
            </th>
            <th>
                Edit / Remove
            </th>
        </tr>
        </thead>
        <tbody><?php
        $songs = Song::getAllSongs();
        if(count($songs) == 0){
            echo "<h3>Sorry, there are not any song at this moment.</h3>";
        }
        else{
            foreach ($songs as $song){
                echo "<tr>
        <td>".$song->id."</td>
        <td>".$song->name_song."</td>
        <td>".Album::getById($song->id_album)->name_album."</td>
        <td>".Band::getById($song->id_band)->name_band."</td>
        <td>".Genre::getById($song->id_genre)->name_genre."</td>
        <td><button id='edit_song' name='edit_song' onclick='editSong($song->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></button></td>
        <td><button id='delete_song' name='delete_song' onclick='deleteSong($song->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button></td>
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="song-edit">

</div>
