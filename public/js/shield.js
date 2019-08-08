$(document).ready(function() {
    $('#loading').show();
    ajax('weapons', 'shield', '', $('.pagination-link.is-active').text()).done(function() {
        $('#loading').hide();
    });
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    ajax('weapons','shield',$('#searchBox').val(), 1).done(function() {
        $('#loading').hide();
    });
});