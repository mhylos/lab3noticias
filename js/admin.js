$(document).ready(function() {
    $('.edit').click(function(){
        $.ajax({
            data: {
                'id':$(this).attr('id')},
            url:'controller/CtrlNoticias.php?op=obtNoticiaPorId',
            type:'POST',
            success: function(response){
                data = $.parseJSON(response);
                if (data.length > 0){
                    $('#idInput').val(data[0]['id']);
                    $('#tituloTextArea').val(data[0]['titulo']);
                    $('#imgInput').attr('src',data[0]['imagen']);
                    $('#resumenTextArea').val(data[0]['resumen']);
                    $('#inputCat').val(data[0]['categoria']);
                    $('#noticiaTextArea').val(data[0]['noticia']);   
                    $('#fechaInput').val(data[0]['fecha']);             
                }
            }
      });
    });

    $('.delete').click(function(){
        $id = $(this).attr('id');
        Swal.fire({
            title: '¿Esta seguro que desea eliminar esta noticia?',
            showDenyButton: true,
            confirmButtonText: 'Sí',
            denyButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed)
                eliminar($id);
        });
    });
});

function eliminar(id){
    $.ajax({
        data: {
            'id':id},
        url:'controller/CtrlNoticias.php?op=eliminarNoticiaPorId',
        type:'POST',
        success: function(response){
            alert('se elimino')
        }
    });
}