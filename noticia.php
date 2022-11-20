<?php
include 'NoticiasDB.php';

$bd = new NoticiasDB();
$sql = "SELECT * FROM noticias";
$bd->start();
$bd->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Titulo: " . $row["titulo"] . " " . $row["resumen"] . "<br>";
    }
} else {
    echo "0 results";
}
$bd->close();
?>