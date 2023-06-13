<?php
session_start();

require_once 'config.php';

// Verifica se as variáveis de sessão 'email' e 'senha' não estão definidas
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    // Se não existir o registro, redireciona para login e destrói qualquer informação
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: login.php");
    exit; // Encerra o script para evitar execução adicional
}

// Atribui valor armazenado do login
$login = $_SESSION['email'];

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql_seleciona = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexao->query($sql_seleciona);

    if ($resultado->num_rows > 0) {
        $sql_deletar = "DELETE FROM usuarios WHERE id = $id";
        $resultado_deletar = $conexao->query($sql_deletar);

        if ($resultado_deletar) {
            // Redireciona para tabelaUser.php após a exclusão
            header('Location: ../tabelaUser.php');
            exit;
        } else {
            echo "Erro ao excluir o usuário: " . $conexao->error;
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
