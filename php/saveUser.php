<?php
require_once 'config.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_update = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
    $resultado = $conexao->query($sql_update);

    if ($resultado) {
        header('Location: ../tabelaUser.php');
        exit;
    } else {
        echo "Erro ao atualizar o usuário: " . $conexao->error;
    }
}
?>
