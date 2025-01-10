<?php
class Empresa {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrar($nome) {
        $sql = "INSERT INTO tbl_empresa (nome) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nome);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM tbl_empresa";
        return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}
?>