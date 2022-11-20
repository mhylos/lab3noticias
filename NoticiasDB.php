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
}
?>