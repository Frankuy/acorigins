$(document).ready(function() {
    $('#loading').show();
    getData($('.pagination-link.is-active').text()).done(
        function() {
            $('#loading').hide();
        }
    );
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    getData(1).done(
        function() {
            $('#loading').hide();
        }
    );
});

$('#rarity').change(function() {
    $('#loading').show();
    getData(1).done(
        function() {
            $('#loading').hide();
        }
    );
});

$('#owned').change(function() {
    $('#loading').show();
    getData(1).done(
        function() {
            $('#loading').hide();
        }
    );
});

$('#category').change(function() {
    $('#loading').show();
    getData(1).done(
        function() {
            $('#loading').hide();
        }
    );
});