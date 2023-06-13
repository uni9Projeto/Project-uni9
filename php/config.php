<?php 

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'himawari';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // Verifica se a conexão foi efetuada
    // if($conexao->connect_errno) {
        // echo "Não foi possível efetuar a conexão";
    // }
    // else {
        // echo "A conexão foi efetuada com sucesso!";
    // }
?>
