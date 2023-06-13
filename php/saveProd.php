<?php
require_once 'config.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['quantidade'];

    $sql_update = "UPDATE produtos SET nome = '$nome', fabricante = '$fabricante', categoria = '$categoria', quantidade = '$quantidade' WHERE id = '$id'";
    $resultado = $conexao->query($sql_update);

    if ($resultado) {
        header('Location: ../tabelaProd.php');
        exit;
    } else {
        echo "Erro ao atualizar o produto: " . $conexao->error;
    }
}
?>
