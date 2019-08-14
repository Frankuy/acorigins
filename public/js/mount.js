$(document).ready(function() {
    $('#loading').show();
    ajaxSimple('mounts', '', $('.pagination-link.is-active').text()).done(function() {
        $('#loading').hide();
    });
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    ajaxSimple('mounts', $('#searchBox').val(), 1).done(function() {
        $('#loading').hide();
    });
});