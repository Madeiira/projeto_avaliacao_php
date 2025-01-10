<?php
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
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required>
        <label for="rg">RG:</label>
        <input type="text" name="rg">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="id_empresa">Empresa:</label>
        <select name="id_empresa">
            <?php foreach ($empresas as $empresa): ?>
                <option value="<?= $empresa['id_empresa'] ?>"><?= $empresa['nome'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="salario">Salário:</label>
        <input type="number" name="salario" step="0.01" required>
        <button type="submit">Cadastrar</button>
        <?php if (isset($msg)) echo "<p>$msg</p>"; ?>
    </form>
</body>
</html>