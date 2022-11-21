$(document).ready(function() {
    $('.edit').click(function(){
        rellenar($(this).attr('id'));
    });

    $('.delete').click(function(){
        $id = $(this).attr('id');
        Swal.fire({
            title: '¿Está seguro que desea eliminar esta noticia?',
            showDenyButton: true,
            confirmButtonText: 'Sí',
            denyButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed)
                eliminar($id);
        });
    });
});

function rellenar(id){
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

function guardarCambios(){
    console.log("a");
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
        }

        reader.readAsDataURL(file);
    }
});