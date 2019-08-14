$(document).ready(function() {
    $('#loading').show();
    ajaxSimple('outfits', '', $('.pagination-link.is-active').text()).done(function() {
        $('#loading').hide();
    });
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    ajaxSimple('outfits', $('#searchBox').val(), 1).done(function() {
        $('#loading').hide();
    });
});
