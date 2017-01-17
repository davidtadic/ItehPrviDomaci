$(document).ready(function () {

    $("#band-table").tablesorter();

});

function editBand(id) {
    $.ajax({
        type: 'GET',
        url: 'editBand.php',
        data: 'id=' + id,
        cache: false,
        success: function (response) {
            $('#container').hide();
            $('#edit-band').append(response);
        },
        error: function (error) {
            alert("Error editing bands: " + error.status);
        }
    });
}

function deleteBand(id) {
    $.ajax({
        type: 'GET',
        url: 'deleteBand.php',
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
            alert("Error deleting band: " + error.status);
        }
    });
}