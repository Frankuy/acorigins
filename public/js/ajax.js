function ajax(section, type, query, page) {
    return $.get('/table/' + section + '/' + type + '/' + query + '?page=' + page, function(data) {
        $('#container-table').html(data);
    });
};

function ajaxSimple(section, query, page) {
    return $.get('/table/' + section + '/' + query + '?page=' + page, function(data) {
        $('#container-table').html(data);
    });
}
