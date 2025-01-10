<?php
require '../models/Empresa.php';
 
class EmpresaController {
    private $conn;

    public function __construct() {
        require '../config/db.php';
        $this->conn = $conn;
    }

    public function cadastrar($nome) {
        $empresa = new Empresa($this->conn);
        if ($empresa->cadastrar($nome)) {
            return "Empresa cadastrada com sucesso!";
        } else {
            return "Erro ao cadastrar empresa.";
        }
    }
}
?>