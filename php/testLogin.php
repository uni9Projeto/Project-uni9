<?php
session_start();

// Verifica se o envio do formulário foi correto e se os campos "email" e "senha" não estão vazios
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    // Ganha acesso ao sistema
    require_once 'config.php';

    // Atribui os valores enviados aos respectivos campos 'email' e 'senha'
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Faz a verificação no banco de dados se existe o registro
    $sql_verifica = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";

    // Consulta o banco de dados e retorna o valor para ser armazenado
    $resultado = $conexao->query($sql_verifica);

    // Verifica o número de linhas afetadas pelo resultado da consulta
    if(mysqli_num_rows($resultado) > 0) {
        // Se não existir o registro, mantenha em login e destrua qualquer informação
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: ../login.php");
        exit(); // Encerra o script após o redirecionamento
    }
    else {
        // Se existir o registro, redireciona para a página correta e armazena os dados
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: ../painel.php");
        exit(); // Encerra o script após o redirecionamento
    }
}
else {
    // Não ganha acesso ao sistema
    header("Location: ../login.php");
    exit(); // Encerra o script após o redirecionamento
}
?>
