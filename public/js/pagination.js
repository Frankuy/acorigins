$(document).ready(function() {
    if ($('.pagination-link.is-active').text() == 1) {
        $('.pagination-previous').attr('disabled', true);
        $('.pagination-previous').off('click');
    }
    
    if ($('.pagination-link.is-active').text() == $('#lastpage').val()) {
        $('.pagination-next').attr('disabled', true);
        $('.pagination-next').off('click');
    }
})

$.paginate = function() {
    if ($('#judul').text() == 'Melee Weapons') {
        ajax('weapons','melee',$('#searchBox').val(), $('.pagination-link.is-active').text());
    }
    else if ($('#judul').text() == 'Ranged Weapons') {
        ajax('weapons','ranged',$('#searchBox').val(), $('.pagination-link.is-active').text());
    }
    else if ($('#judul').text() == 'Shields') {
        ajax('weapons','shield',$('#searchBox').val(), $('.pagination-link.is-active').text());
    }
    else if ($('#judul').text() == 'Outfits') {
        ajaxSimple('outfits',$('#searchBox').val(), $('.pagination-link.is-active').text());
    }
    else if ($('#judul').text() == 'Mounts') {
        ajaxSimple('mounts',$('#searchBox').val(), $('.pagination-link.is-active').text());
    };
}

$('.pagination-link').click(function() {
    $('.pagination-link.is-active').removeClass('is-active');
    $(this).addClass('is-active');
    $.paginate();
});

$('.pagination-next').click(function() {
    var currPage = parseInt($('.pagination-link.is-active').text());
    $('.pagination-link.is-active').removeClass('is-active');
    $('.pagination-link').filter(function() {
        return $(this).text() == currPage + 1;
    }).addClass('is-active');
    $.paginate();
});

$('.pagination-previous').click(function() {
    var currPage = parseInt($('.pagination-link.is-active').text());
    $('.pagination-link.is-active').removeClass('is-active');
    $('.pagination-link').filter(function() {
        return $(this).text() == currPage - 1;
    }).addClass('is-active');
    $.paginate();
});