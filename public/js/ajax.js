var base = 'https://acorigins.herokuapp.com';

function ajax(section, type, query, page, rarity, category, owned) {
    return $.get(base + '/table/' + section + '/' + type + '/' + query + '?page=' + page + '&rarity=' + rarity + '&category=' + category + '&owned=' + owned, function(data) {
        $('#container-table').html(data);
    });
};

function ajaxSimple(section, query, page, rarity, owned) {
    return $.get(base + '/table/' + section + '/' + query + '?page=' + page + '&rarity=' + rarity + '&owned=' + owned, function(data) {
        $('#container-table').html(data);
    });
}

function getData(page) {
    if ($('#judul').text() == 'Melee Weapons') {
        return ajax('weapons','melee',$('#searchBox').val(), page, $("#rarity option:selected").val(), $("#category option:selected").val(), $("#owned option:selected").val());
    }
    else if ($('#judul').text() == 'Ranged Weapons') {
        return ajax('weapons','ranged',$('#searchBox').val(), page, $("#rarity option:selected").val(), $("#category option:selected").val(), $("#owned option:selected").val());
    }
    else if ($('#judul').text() == 'Shields') {
        return ajax('weapons','shield',$('#searchBox').val(), page, $("#rarity option:selected").val(), '', $("#owned option:selected").val());
    }
    else if ($('#judul').text() == 'Outfits') {
        return ajaxSimple('outfits',$('#searchBox').val(), page, $("#rarity option:selected").val(), $("#owned option:selected").val());
    }
    else if ($('#judul').text() == 'Mounts') {
        return ajaxSimple('mounts',$('#searchBox').val(), page, $("#rarity option:selected").val(), $("#owned option:selected").val());
    };
}