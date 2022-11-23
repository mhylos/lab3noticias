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

    // document.cookie = `i_sports = ${e}`;

    // document.querySelector(`#${id}`).innerHTML = `<?php
    //         $i = $_COOKIE['i_sports'];
    //         $sql = "SELECT titulo, imagen FROM tabla_noticia WHERE LOWER(categoria) = 'deportes' ORDER BY fecha DESC LIMIT ${e};";
    //         $result = mysqli_query($conexion, $sql);
    //         while ($mostrar = mysqli_fetch_array($result)) {
    //             echo "<hr>";
    //             echo "<div class='row p-1'>";
    //             echo "  <div class='col-3 d-flex flex-column justify-content-center'>";
    //             echo "      <img class='small-square rounded' src='assets/img/$mostrar[imagen]' alt=''>";
    //             echo "  </div>";
    //             echo "  <div class='col'>";
    //             echo "      <h4 class='cutlines'>$mostrar[titulo]</h4>";
    //             echo "      <small>hace 1 hora</small>";
    //             echo "  </div>";
    //             echo "</div>";
    //         }
    //         ?>`;
    // console.log(d);
}