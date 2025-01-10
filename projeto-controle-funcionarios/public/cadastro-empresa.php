<?php

//Página para cadastro de empresas

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Empresa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post" action="">
        <label for="nome">Nome da Empresa:</label>
        <input type="text" name="nome" required>
        <button type="submit">Cadastrar</button>
        <?php if (isset($msg)) echo "<p>$msg</p>"; ?>
    </form>
</body>
</html>