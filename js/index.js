function update(id) {
    var e = 3;
    let innerHTML = document.querySelector(`#${id}`).innerHTML;
    for (let index = 0; index < innerHTML.split(' ').length; index++) {
        if (innerHTML.split(' ')[index] == '<hr><div') {
            e++;
        }
    }
    $.ajax({
        data: {
            'cant': e,
            'category': id
        },
        url: 'controller/CtrlNoticias.php?op=load_more',
        type: 'POST',
        success: function (innerHTML) {
            document.querySelector(`#${id}`).innerHTML = innerHTML;
        }
    })
}