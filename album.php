<?php
include ('layout.php');
include ('GenreClass.php');
include ('BandClass.php');
include ('AlbumClass.php');

?>
<script type="text/javascript" src="album.js"></script>

<div class="container">
    <table id="album-table" class="table table-hover">
        <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Name of Album
            </th>
            <th>
                Year Published
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
        $albums = Album::getAllAlbums();
        if(count($albums) == 0){
            echo "<h3>Sorry, there are not any album at this moment.</h3>";
        }
        else{
            foreach ($albums as $album){
                echo "<tr>
        <td>".$album->id."</td>
        <td>".$album->name_album."</td>
        <td>".$album->year_published."</td>
        <td>".Band::getById($album->id_band)->name_band."</td>
        <td>".Genre::getById($album->id_genre)->name_genre."</td>
        <td><button id='edit_album' name='edit_album' onclick='editAlbum($album->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></button></td>
        <td><button id='delete_album' name='delete_album' onclick='deleteAlbum($album->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button></td>
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="edit-album">

</div>
