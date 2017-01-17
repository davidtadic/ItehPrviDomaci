 <?php
        include ('layout.php');
        include ('GenreClass.php');
        include ('mysql_connection.php');

    ?>
 <script type="text/javascript" src="genre.js"></script>

 <div class="container">
    <table id="genre-table" class="table table-hover">
        <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Name of Genres
            </th>
            <th>
                Delete
            </th>
        </tr>
        </thead>
        <tbody><?php
        $genres = Genre::getAllGenres();
        if(count($genres) == 0){
            echo "<h3>Sorry, there are not any genre at this moment.</h3>";
        }
        else{
            foreach ($genres as $genre){
                echo "<tr>
        <td>".$genre->id."</td>
        <td>".$genre->name_genre."</td>
        <td><button id='delete_genre' name='delete_genre' onclick='deleteGenre($genre->id)' class='btn btn-default btn-sm'>
        <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button></td>
        </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>



