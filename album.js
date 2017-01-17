$(document).ready(function () {

    $("#album-table").tablesorter();

});

function editAlbum(id) {
    $.ajax({
        type: 'GET',
        url: 'editAlbum.php',
        data: 'id=' + id,
        cache: false,
        success: function (response) {
            $('#container').hide();
            $('#edit-album').append(response);
        },
        error: function (error) {
            alert("Error editing album: " + error.status);
        }
    });
}

function deleteAlbum(id) {
    $.ajax({
        type: 'GET',
        url: 'deleteAlbum.php',
        data: 'id=' + id,
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response.status == 1) {
                location.reload();
            }
            else {
                alert(response.message);
            }
        },
        error: function (error) {
            alert("Error deleting album: " + error.status);
        }
    });
}