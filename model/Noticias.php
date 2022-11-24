<?php
class NoticiasDB {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $name = "noticias";
    public $conn;

    function start() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function close() {
        $this->conn->close();
    }

    function query($sql) {
        $this->start();
        $result = $this->conn->query($sql);
        $this->close();
        return $result;
    }

    function getAll()
    {
        $sql = "SELECT * FROM tabla_noticia;";
        $results = $this->query($sql);
        return $results;
    }

    function getById($id) {
        $sql = 'SELECT * FROM tabla_noticia WHERE id='.$id;
        $noticia = mysqli_fetch_all($this->query($sql), MYSQLI_ASSOC);
        return $noticia;
    }

    function deleteById($id) {
        $sql = 'DELETE FROM tabla_noticia WHERE id='.$id;
        $this->query($sql);
    }

    function editWithoutIMG($id, $titulo, $resumen, $categoria, $noticia, $fecha) {
        $sql = 'UPDATE tabla_noticia
                SET titulo="'.$titulo.'", resumen="'.$resumen.'", categoria="'.$categoria.'", noticia="'.$noticia.'", fecha="'.$fecha.'"
                WHERE id='.$id;
        $this->query($sql);
    }

    function editWithIMG($id, $titulo, $imagen, $resumen, $categoria, $noticia, $fecha) {
        $sql = 'UPDATE tabla_noticia
                SET titulo="'.$titulo.'", imagen="'.$imagen.'", resumen="'.$resumen.'", categoria="'.$categoria.'", noticia="'.$noticia.'", fecha="'.$fecha.'"
                WHERE id='.$id;
        $this->query($sql);
    }

    function agregar($titulo, $imagen, $resumen, $categoria, $noticia, $fecha)
    {
        $sql = "INSERT into tabla_noticia (titulo, imagen, resumen, categoria, noticia, fecha) 
                VALUES ('$titulo', '$imagen', '$resumen', '$categoria', '$noticia', '$fecha')";
        $this->query($sql);
    }

    function buscar($string)
    {
        $sql = "SELECT id, titulo, fecha FROM tabla_noticia WHERE id = '$string' OR LOWER(titulo) LIKE LOWER('%$string%') OR fecha = ('$string');";
        $results = $this->query($sql);
        return $results;
    }
}
?>