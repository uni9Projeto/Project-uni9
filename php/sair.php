<?php

    session_start();

    //destrua os dados armazenados
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: ../login.php");

?>