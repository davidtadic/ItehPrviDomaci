$(document).ready(function () {

    $("#song-table").tablesorter();

});

function editSong(id) {
    $.ajax({
        type: 'GET',
        url: 'editSong.php',
        data: 'id=' + id,
        cache: false,
        success: function (response) {
            $('#container').hide();
            $('#song-edit').append(response);
        },
        error: function (error) {
            alert("Error editing song: " + error.status);
        }
    });
}

function deleteSong(id) {
    $.ajax({
        type: 'GET',
        url: 'deleteSong.php',
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
            alert("Error deleting song: " + error.status);
        }
    });
}