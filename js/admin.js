$(document).ready(function() {
    rellenar_tabla();
});

function rellenar(id){
    $('.id-group').removeClass('d-none');
    $.ajax({
        data: {
            'id':id},
        url:'controller/CtrlNoticias.php?op=obtNoticiaPorId',
        type:'POST',
        success: function(response){
            data = $.parseJSON(response);
            if (data.length > 0){
                $('#idInput').val(data[0]['id']);
                $('#tituloTextArea').val(data[0]['titulo']);
                $('#imgPreview').attr('src', 'assets/img/'+data[0]['imagen']);
                $('#resumenTextArea').val(data[0]['resumen']);
                $('#inputCat').val(data[0]['categoria']);
                $('#noticiaTextArea').val(data[0]['noticia']);   
                $('#fechaInput').val(data[0]['fecha']);             
            }
        }
  });
}

function eliminar(id){
    $.ajax({
        data: {
            'id':id},
        url:'controller/CtrlNoticias.php?op=eliminarNoticiaPorId',
        type:'POST',
        success: function(response){
            rellenar_tabla();
        }
    });
}

function agregar(){
    $('#modalTitulo').text('Agregar noticia');
    $('#imgPreview').addClass('d-none');
    $('.imgPreviewPlaceholder').removeClass('d-none');
    $('form').trigger("reset");
    $('#imgPreview').attr('src','');
    $('.id-group').addClass('d-none');
    $("#infoNoticiaModal").modal("show");
}

function buscar(){
    string = $('#inputBuscar').val();
    if (string) {
        $.ajax({
            data: {
                'string':string
            },
            url:'controller/CtrlNoticias.php?op=buscar',
            type:'POST',
            success: function(response){
                if (response != 0){
                    data = $.parseJSON(response);
                    html = '';
                    data.forEach(element => {
                        html += generateRowHTML(element);
                    });
                    $('#contentTable').html(html)
                }
            }
        });
    }
}

function rellenar_tabla(){
    $.ajax({
        url:'controller/CtrlNoticias.php?op=obtNoticias',
        type:'POST',
        success: function(response){
            data = $.parseJSON(response);
            html = '';
            data.forEach(element => {
                html += generateRowHTML(element);
            });
            $('#contentTable').html(html)
            create_row_listeners();
        }
    });
}


/////////////
//LISTENERS//
/////////////
$('form').on('submit',function(event){
    event.preventDefault();
    fd = new FormData($(this)[0]);
    accion = ($('#modalTitulo').text() == 'Agregar noticia') ? 'agregar':'editar';
    $.ajax({
        data: fd,
        url:'controller/CtrlNoticias.php?op='+accion,
        type:'POST',
        contentType: false,
        processData: false,
        success: function(response){
            if (response == 1) {
                rellenar_tabla();
                $("#infoNoticiaModal").modal("hide");
            } else if(response == 'falta imagen') {
                Swal.fire({
                icon: 'error',
                background: '#1f1f1f',
                confirmButtonColor: '#d33',
                title: 'Error...',
                text: 'Falta subir una imagen',
                color: '#FFFFFF'
                })
            }
        }
    });
})

$('input[type=file]').change(function(){
    var file = $(this).get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#imgPreview").attr("src", reader.result);
            $('.imgPreviewPlaceholder').addClass('d-none');
            $('#imgPreview').removeClass('d-none');
        }

        reader.readAsDataURL(file);
    }
});

function create_row_listeners(){
    $('.edit').click(function(){
        rellenar($(this).attr('id'));
        $('#modalTitulo').text('Editar noticia');
        $('.imgPreviewPlaceholder').addClass('d-none');
        $('#imgPreview').removeClass('d-none');
    });

    $('.delete').click(function(){
        $id = $(this).attr('id');
        Swal.fire({
            title: '¿Está seguro que desea eliminar esta noticia?',
            showDenyButton: true,
            confirmButtonColor: '#26272a',
            confirmButtonText: 'Sí',
            denyButtonText: 'No',
            background: '#1f1f1f',
            color: '#FFFFFF'
        }).then((result) => {
            if (result.isConfirmed)
                eliminar($id);
        });
    });
}

function generateRowHTML(element){
    html = '';
    html += '<div class="row " id="'+element.id+'">';
    html += '<div class="col-7 col-md-3">';
    html +=     '<div class="d-block d-md-none text-truncate">';
    html +=         '<span class="d-inline">['+element.id+'] </span>';
    html +=         '<span>'+element.titulo+'</span>';
    html +=     '</div>';
    html +=     '<span class="d-none d-md-block">'+element.id+'</span>';
    html += '</div>';
    html += '<div class="d-none col-md d-md-block">';
    html +=     '<span class="crop-text">'+element.titulo+'</span>';
    html += '</div>';
    html += '<div class="d-none col-md-2 d-md-block">';
    html +=     '<span>'+element.fecha+'</span>';
    html += '</div>';
    html += '<div class="col-5 col-md-2">';
    html +=     '<button type="button" data-bs-toggle="modal" data-bs-target="#infoNoticiaModal" id="'+element.id+'" class="edit btn btn-outline-light btn-sm"><i class="bi bi-pencil-square"></i></button>';
    html +=     '<button type="button" class="delete btn btn-danger btn-sm mx-1" id="'+element.id+'"><i class="bi bi-trash"></i></button>';
    html += '</div>';
    html += "</div>";
    html += '<hr class="my-1">';
    return html;
}