$(document).ready(function() {
    $('#loading').show();
    ajax('weapons','ranged','', $('.pagination-link.is-active').text()).done(function() {
        $('#loading').hide();
    });
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    ajax('weapons','ranged',$('#searchBox').val(), 1).done(function() {
        $('#loading').hide();
    });
});