function getProgress() {
    $.get('/progress', function(data) {
        $('.container-progress').html(data);
        $('.modal-progress').html(data);
        $('.meleeStatContainer').hide();
        $('.rangedStatContainer').hide();
    });
};

function toggleMelee() {
    $('.meleeStatContainer').toggle();
    $('.meleeIcon').toggleClass('showMelee hideMelee');
    $('.showMelee').html('<i class="fas fa-chevron-right"></i>');
    $('.hideMelee').html('<i class="fas fa-chevron-down"></i>');
};

function toggleRanged() {
    $('.rangedStatContainer').toggle();
    $('.rangedIcon').toggleClass('showRanged hideRanged');
    $('.showRanged').html('<i class="fas fa-chevron-right"></i>');
    $('.hideRanged').html('<i class="fas fa-chevron-down"></i>');
};

$(document).ready(function() {
    getProgress();
})

$('.modal-close').click(function() {
    $('.modal').removeClass('is-active');
})

$('.progressIcon').click(function() {
    $('.modal').addClass('is-active');
})

