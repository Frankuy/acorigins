$(document).ready(function() {
    $('#loading').show();
    if ($('#judul').text() == 'Melee Weapons') {
        ajax('weapons', 'melee', '', $('.pagination-link.is-active').text()).done(function() {
            $('#loading').hide();
        });
    }
    else if ($('#judul').text() == 'Ranged Weapons') {
        ajax('weapons', 'ranged', '', $('.pagination-link.is-active').text()).done(function() {
            $('#loading').hide();
        });
    }
    else if ($('#judul').text() == 'Shields') {
        ajax('weapons', 'shield', '', $('.pagination-link.is-active').text()).done(function() {
            $('#loading').hide();
        });
    }
});

$('#searchBox').keyup(function() {
    $('#loading').show();
    if ($('#judul').text() == 'Melee Weapons') {
        ajax('weapons','melee',$('#searchBox').val(), 1).done(function() {
            $('#loading').hide();
        });
    }
    else if ($('#judul').text() == 'Ranged Weapons') {
        ajax('weapons','ranged',$('#searchBox').val(), 1).done(function() {
            $('#loading').hide();
        });
    }
    else if ($('#judul').text() == 'Shields') {
        ajax('weapons','shield',$('#searchBox').val(), 1).done(function() {
            $('#loading').hide();
        });
    }
});