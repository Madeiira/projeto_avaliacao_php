<?php
require '../models/usuario.php';

class AuthController {
    private $conn;

    public function __construct() {
        require '../config/db.php';
        $this->conn = $conn;
    }

    public function login($login, $senha) {
        $usuario = new Usuario($this->conn);
        $user = $usuario->autenticar($login, $senha);
        if ($user) {
            $_SESSION['login'] = $login;
            header("Location: dashboard.php");
        } else {
            $_SESSION['error'] = "Login ou senha inválidos!";
        }
    }
}
?>