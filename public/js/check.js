$('.checkicon').click(function() {
    $(this).toggleClass('has-text-light uncheck has-text-success checked');
    if ($(this).hasClass('checked')) {
        $(this).html('<i class="fas fa-check-square"></i>');
    }
    else if ($(this).hasClass('uncheck')) {
        $(this).html('<i class="fas fa-square"></i>');
    }
})

function checkClick(id) {
    $.get('/check/' + id)
    getProgress();
}