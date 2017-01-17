 <?php
    include ('layout.php');
    include ('GenreClass.php');
    include ('BandClass.php');
    include ('AlbumClass.php');
    include ('SongClass.php');
 ?>
 <div class="index-wrapper btn-group-vertical">
     <div class="panel panel-default col-md-6">
         <div class="panel-heading left">
            <h4><strong>Last 3 Songs</strong></h4>
             <button class="btn-info btn-sm" id="view-all" onclick="location.href= 'song.php'">View All</button>
         </div>
         <table class="table">
             <thead>
             <tr>
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
             </tr>
             </thead>
             <tbody><?php
             $songsAll = Song::getAllSongs();
             $songs = array_slice($songsAll,-3);
             if(count($songs) == 0){
                 echo "<h3>Sorry, there are not any song at this moment.</h3>";
             }
             else{
                 foreach ($songs as $song){
                     echo "<tr>
        <td>".$song->name_song."</td>
        <td>".Album::getById($song->id_album)->name_album."</td>
        <td>".Band::getById($song->id_band)->name_band."</td>
        <td>".Genre::getById($song->id_genre)->name_genre."</td>
        </tr>";
                 }
             }
             ?>
             </tbody>
         </table>

     </div>



     <div class="panel panel-default col-md-6">
         <div class="panel-heading ">
             <h4><strong>Last 3 Artist</strong></h4>
             <button class="btn-info btn-sm" id="view-all" onclick="location.href= 'band.php'">View All</button>
         </div>
         <table class="table">
             <thead>
             <tr>
                 <th>
                     Band/Artist
                 </th>
                 <th>
                     Year Active
                 </th>
                 <th>
                     Country
                 </th>
                 <th>
                     Genre
                 </th>
             </tr>
             </thead>
             <tbody><?php
             $bandsAll = Band::getAllBands();
             $bands = array_slice($bandsAll,-3);
             if(count($bands) == 0){
                 echo "<h3>Sorry, there are not any band at this moment.</h3>";
             }
             else{
                 foreach ($bands as $band){
                     echo "<tr>
        <td>".$band->name_band."</td>
        <td>".$band->years_active."</td>
        <td>".$band->country."</td>
        <td>".Genre::getById($band->id_genre)->name_genre."</td>
        </tr>";
                 }
             }
             ?>
             </tbody>
         </table>
     </div>

     <div class="panel panel-default col-md-6">
         <div class="panel-heading ">
             <h4><strong>Last 3 Albums</strong></h4>
             <button class="btn-info btn-sm" id="view-all" onclick="location.href= 'album.php'">View All</button>
         </div>
         <table class="table">
             <thead>
             <tr>
                 <th>
                     Album
                 </th>
                 <th>
                     Year Published
                 </th>
                 <th>
                     Artist
                 </th>
                 <th>
                     Genre
                 </th>
             </tr>
             </thead>
             <tbody><?php
             $albumsAll = Album::getAllAlbums();
             $albums = array_slice($albumsAll,-3);
             if(count($albums) == 0){
                 echo "<h3>Sorry, there are not any album at this moment.</h3>";
             }
             else{
                 foreach ($albums as $album){
                     echo "<tr>
        <td>".$album->name_album."</td>
        <td>".$album->year_published."</td>
        <td>".Band::getById($album->id_band)->name_band."</td>
        <td>".Genre::getById($album->id_genre)->name_genre."</td>
        </tr>";
                 }
             }
             ?>
             </tbody>
         </table>
     </div>

     <div class="panel panel-default col-md-3">
         <h4 class="panel-heading"><strong>Genres</strong></h4>
         <p class="panel-body">
             <?php
             $genres = Genre::getAllGenres();
             if($genres == null) {
                 echo "Currently, there are no genres.";
             }
             else {
                 $counter = 1;
                 foreach ($genres as $genre) {
                     echo "<strong>".$counter.".  ".$genre->name_genre . "</strong><br/>";
                     $counter++;
                 }
             }
             ?>
             <br/>
         </p>
     </div>



 </div>
