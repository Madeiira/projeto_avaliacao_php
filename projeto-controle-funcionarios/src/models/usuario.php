<?php
class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function autenticar($login, $senha) {
        $senhaHash = md5($senha);
        $sql = "SELECT * FROM tbl_usuario WHERE login=? AND senha=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $login, $senhaHash);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>