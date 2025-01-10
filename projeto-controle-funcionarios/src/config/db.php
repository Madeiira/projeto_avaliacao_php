<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "projetophp";
$port = 3316;               // Porta do MySQL

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criação das tabelas
$sql = "
CREATE TABLE IF NOT EXISTS tbl_usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_empresa (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_funcionario (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    rg VARCHAR(20),
    email VARCHAR(30) NOT NULL,
    id_empresa INT,
    data_cadastro DATE,
    salario DOUBLE(10,2),
    bonificacao DOUBLE(10,2),
    FOREIGN KEY (id_empresa) REFERENCES tbl_empresa(id_empresa)
);
";

// Execute a criação das tabelas
if ($conn->multi_query($sql)) {
    do {
        // Loop para processar todas as consultas
    } while ($conn->more_results() && $conn->next_result());
} else {
    echo "Erro ao criar tabelas: " . $conn->error;
}

// Inserção dos registros
$inserirUsuarios = "
INSERT INTO tbl_usuario (login, senha) VALUES ('teste@gmail.com.br', MD5('1234'));
";

// Execute as inserções
if ($conn->multi_query($inserirUsuarios)) {
    do {
        // Loop para processar todas as consultas
    } while ($conn->more_results() && $conn->next_result());
    echo "Registros inseridos com sucesso.";
} else {
    echo "Erro ao inserir registros: " . $conn->error;
}

$conn->close();
?>