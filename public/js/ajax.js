function ajax(section, type, query, page, rarity, category) {
    return $.get('/table/' + section + '/' + type + '/' + query + '?page=' + page + '&rarity=' + rarity + '&category=' + category, function(data) {
        $('#container-table').html(data);
    });
};

function ajaxSimple(section, query, page, rarity) {
    return $.get('/table/' + section + '/' + query + '?page=' + page + '&rarity=' + rarity, function(data) {
        $('#container-table').html(data);
    });
}
