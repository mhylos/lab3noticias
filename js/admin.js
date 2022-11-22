$(document).ready(function() {
    $('.edit').click(function(){
        rellenar($(this).attr('id'));
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
        }).then((result) => {
            if (result.isConfirmed)
                eliminar($id);
        });
    });
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
            location.reload()
        }
    });
}

function agregar(){
    $('#imgPreview').addClass('d-none');
    $('.imgPreviewPlaceholder').removeClass('d-none');
    $('form').trigger("reset");
    $('#imgPreview').attr('src','');
    $('.id-group').addClass('d-none');
    $("#infoNoticiaModal").modal("show");
}

$('form').on('submit',function(event){
    event.preventDefault();
    var fd = new FormData($(this)[0]);
    $.ajax({
        data: fd,
        url:'controller/CtrlNoticias.php?op=editar',
        type:'POST',
        contentType: false,
        processData: false,
        success: function(response){
            location.reload()
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