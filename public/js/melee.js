$(document).ready(function() {
    ajax('weapons','melee','', $('.pagination-link.is-active').text());
});

$('#searchBox').keyup(function() {
    if ($('#searchBox').val() == '') {
        ajax('weapons','melee',$('#searchBox').val(), 1);
    }
    else {
        ajax('weapons','melee',$('#searchBox').val(), 1);   
    }
});
