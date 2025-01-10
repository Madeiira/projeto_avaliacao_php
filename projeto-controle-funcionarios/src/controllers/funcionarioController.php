<?php
require '../models/Funcionario.php';
require '../models/Empresa.php';

class FuncionarioController {
    private $conn;

    public function __construct() {
        require '../config/db.php';
        $this->conn = $conn;
    }

    public function cadastrar($data) {
        $funcionario = new Funcionario($this->conn);
        if ($funcionario->cadastrar($data)) {
            return "Funcionário cadastrado com sucesso!";
        } else {
            return "Erro ao cadastrar funcionário.";
        }
    }

    public function listarFuncionarios() {
        $funcionario = new Funcionario($this->conn);
        return $funcionario->listar();
    }

    public function listarEmpresas() {
        $empresa = new Empresa($this->conn);
        return $empresa->listar();
    }

}
?>