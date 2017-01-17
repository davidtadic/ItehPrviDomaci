$(document).ready(function () {

    $("#genre-table").tablesorter();

});

function deleteGenre(id) {
    $.ajax({
        type: 'GET',
        url: 'deleteGenre.php',
        data: 'id=' + id,
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response.status == 1) {
                alert(response.message);
                location.reload();
            }
            else {
                console.log(response.message);
                alert(response.message);
            }
        },
        error: function (error) {
            alert("Error deleting genres: " + error.message);
        }
    });
}
