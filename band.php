<?php
include ('layout.php');
include ('GenreClass.php');
include ('BandClass.php');

?>
<script type="text/javascript" src="band.js"></script>
<div class="container">
    <table id="band-table" class="table table-hover">
        <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Name of Band/Artist
            </th>
            <th>
                Years Active
            </th>
            <th>
                Country
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
        $bands = Band::getAllBands();
        if(count($bands) == 0){
            echo "<h3>Sorry, there are not any band at this moment.</h3>";
        }
        else{
            foreach ($bands as $band){
                echo "<tr>
        <td>".$band->id."</td>
        <td>".$band->name_band."</td>
        <td>".$band->years_active."</td>
        <td>".$band->country."</td>
        <td>".Genre::getById($band->id_genre)->name_genre."</td>
        <td><button id='edit_band' name='edit_band' onclick='editBand($band->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></button></td>
        <td><button id='delete_band' name='delete_band' onclick='deleteBand($band->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button></td>
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
<div id="edit-band">

</div>
