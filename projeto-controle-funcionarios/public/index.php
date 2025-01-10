<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../src/controllers/AuthController.php';
    $authController = new AuthController();
    $authController->login($_POST['login'], $_POST['senha']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post" action="">
        <label for="login">Email:</label>
        <input type="email" name="login" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <button type="submit">Entrar</button>
        <?php if (isset($_SESSION['error'])) echo "<p>{$_SESSION['error']}</p>"; ?>
    </form>
</body>
</html>