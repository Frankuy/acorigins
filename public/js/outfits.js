$(document).ready(function() {
    $('#loading').show();
    ajaxSimple('outfits', '', $('.pagination-link.is-active').text(), $("#rarity option:selected").val(), $("#owned option:selected").val()).done(function() {
        $('#loading').hide();
    });
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    ajaxSimple('outfits', $('#searchBox').val(), 1, $("#rarity option:selected").val(), $("#owned option:selected").val()).done(function() {
        $('#loading').hide();
    });
});

$('#rarity').change(function() {
    $('#loading').show();
    ajaxSimple('outfits', $('#searchBox').val(), 1, $("#rarity option:selected").val(), $("#owned option:selected").val()).done(function() {
        $('#loading').hide();
    });
});

$('#owned').change(function() {
    $('#loading').show();
    ajaxSimple('outfits', $('#searchBox').val(), 1, $("#rarity option:selected").val(), $("#owned option:selected").val()).done(function() {
        $('#loading').hide();
    });
});
