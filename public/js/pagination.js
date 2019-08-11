$(document).ready(function() {
    if ($('.pagination-link.is-active').text() == 1) {
        $('.pagination-previous').attr('disabled', true);
        $('.pagination-previous').off('click');
    }
    
    if ($('.pagination-link.is-active').text() == $('#lastpage').val()) {
        $('.pagination-next').attr('disabled', true);
        $('.pagination-next').off('click');
    }
});

$('.pagination-link').click(function() {
    $('.pagination-link.is-active').removeClass('is-active');
    $(this).addClass('is-active');
    getData($('.pagination-link.is-active').text());
});

$('.pagination-next').click(function() {
    var currPage = parseInt($('.pagination-link.is-active').text());
    $('.pagination-link.is-active').removeClass('is-active');
    $('.pagination-link').filter(function() {
        return $(this).text() == currPage + 1;
    }).addClass('is-active');
    getData($('.pagination-link.is-active').text());
});

$('.pagination-previous').click(function() {
    var currPage = parseInt($('.pagination-link.is-active').text());
    $('.pagination-link.is-active').removeClass('is-active');
    $('.pagination-link').filter(function() {
        return $(this).text() == currPage - 1;
    }).addClass('is-active');
    getData($('.pagination-link.is-active').text());
});