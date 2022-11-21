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
        $result = $this->conn->query($sql);
        return $result;
    }

    function getById($id) {
        $this->start();
        $sql = 'SELECT * FROM tabla_noticia WHERE id='.$id;
        $noticia = mysqli_fetch_all($this->query($sql), MYSQLI_ASSOC);
        $this->close();
        return $noticia;
    }

    function deleteById($id) {
        $this->start();
        $sql = 'DELETE FROM tabla_noticia WHERE id='.$id;
        $this->query($sql);
        $this->close();
    }
}
?>