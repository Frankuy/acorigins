$(document).ready(function() {
    $('#loading').show();
    getData($('.pagination-link.is-active').text()).done(
        function() {
            $('#loading').hide();
        }
    );
});

var ajaxget = null;

$('#searchBox').keyup(function() {
    $('#loading').show();
    clearTimeout(ajaxget);
    ajaxget = setTimeout(function() {
        getData(1).done(
            function() {
                $('#loading').hide();
            }
        )
    }, 1000);
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