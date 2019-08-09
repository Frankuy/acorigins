$(document).ready(function() {
    $('#loading').show();
    ajaxSimple('mounts', '', $('.pagination-link.is-active').text(), $("#rarity option:selected").val()).done(function() {
        $('#loading').hide();
    });
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    ajaxSimple('mounts', $('#searchBox').val(), 1,  $("#rarity option:selected").val()).done(function() {
        $('#loading').hide();
    });
});

$('#rarity').change(function() {
    $('#loading').show();
    ajaxSimple('mounts', $('#searchBox').val(), 1,  $("#rarity option:selected").val()).done(function() {
        $('#loading').hide();
    });
});