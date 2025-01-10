<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require '../src/controllers/FuncionarioController.php';
$funcionarioController = new FuncionarioController();
$funcionarios = $funcionarioController->listarFuncionarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .blue { background-color: blue; color: white; }
        .red { background-color: red; color: white; }
    </style>
</head>
<body>
    <h1>Funcionários</h1>
    <a href="cadastro_empresa.php">Cadastrar Empresa</a>
    <a href="cadastro_funcionario.php">Cadastrar Funcionário</a>
    <a href="exportar_pdf.php">Exportar para PDF</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Data de Cadastro</th>
            <th>Salário</th>
            <th>Bonificação</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario): ?>
            <tr class="<?= $funcionario['classe'] ?>">
                <td><?= $funcionario['nome'] ?></td>
                <td><?= $funcionario['cpf'] ?></td>
                <td><?= $funcionario['email'] ?></td>
                <td><?= date('d/m/Y', strtotime($funcionario['data_cadastro'])) ?></td>
                <td>R$ <?= number_format($funcionario['salario'], 2, ',', '.') ?></td>
                <td>R$ <?= number_format($funcionario['bonificacao'], 2, ',', '.') ?></td>
                <td>
                    <a href="editar_funcionario.php?id=<?= $funcionario['id_funcionario'] ?>">Editar</a>
                    <a href="excluir_funcionario.php?id=<?= $funcionario['id_funcionario'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>