<?php
$servername = "localhost";
$username = "usuario";
$password = "senha";
$dbname = "banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>