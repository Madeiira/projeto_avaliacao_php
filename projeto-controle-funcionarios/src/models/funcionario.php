<?php
class Funcionario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function cadastrar($data) {
        $sql = "INSERT INTO tbl_funcionario (nome, cpf, rg, email, id_empresa, data_cadastro, salario) VALUES (?, ?, ?, ?, ?, NOW(), ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssd", $data['nome'], $data['cpf'], $data['rg'], $data['email'], $data['id_empresa'], $data['salario']);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT f.*, e.nome AS nome_empresa FROM tbl_funcionario f JOIN tbl_empresa e ON f.id_empresa = e.id_empresa";
        return $this->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}
?>