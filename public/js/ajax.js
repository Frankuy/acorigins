function ajax(section, type, query, page, rarity, category, owned) {
    return $.get('/table/' + section + '/' + type + '/' + query + '?page=' + page + '&rarity=' + rarity + '&category=' + category + '&owned=' + owned, function(data) {
        $('#container-table').html(data);
    });
};

function ajaxSimple(section, query, page, rarity, owned) {
    return $.get('/table/' + section + '/' + query + '?page=' + page + '&rarity=' + rarity + '&owned=' + owned, function(data) {
        $('#container-table').html(data);
    });
}
