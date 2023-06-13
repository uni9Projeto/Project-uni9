<?php

    session_start();

    require_once 'php/config.php';

    // Verifica se as variáveis de sessão 'email' e 'senha' não estão definidas
    if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) {

        // Se não existir o registro redireciona para e destrua qualquer informação:
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: login.php");
    }

    // atribui valor armazenado do login
    $login = $_SESSION['email'];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" href="img/logo1.png">
    <title>Painel de Controle</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <input type="checkbox" id="check">
            <label for="check" class="btn-menu">
                <i class="fa fa-bars"></i>
            </label>

            <label class="logo">HIMAWARI</label>
            <ul>
                <li><a href="#">PAINEL DE CONTROLE</a></li>
                <li><a href="php/sair.php">SAIR</a></li>
            </ul>
        </nav>
    </header>

    <div class="first-content">
        <h2>Painel de controle</h2>
    </div>
    <div class="row">
        <div class="card blue">
            <a href="php/cadastrar.php">
                <p><img src="img/cadastro.png" alt="Cadastros de Usuários" /></p>
            </a>
            <p>Cadastrar usuários</p>
        </div>

        <div class="card blue">
            <a href="tabelaUser.php">
                <p><img src="img/tabelauser.png" alt="Tabela de Usuários" /></p>
            </a>
            <p>Editar cadastros de usuários</p>
        </div>

        <div class="card blue">
            <a href="cadProdutos.php">
                <p><img src="img/produtos.png" alt="Tabela de Usuários" /></p>
            </a>
            <p>Cadastrar produtos</p>
        </div>

        <div class="card blue">
            <a href="tabelaProd.php">
                <p><img src="img/tabelaprod.png" alt="Tabela de Usuários" /></p>
            </a>
            <p>Editar registros de produtos</p>
        </div>
    </div>

    <footer>
		<div class="footer-content">
			<h3>HIMAWARI</h3>
			<p>A <i> HIMAWARI </i> é um grupo que gerencia o estoque e funcinários
				de sua com maior precisão no dia a dia de trabalho.</p>
			<ul class="sociais">
				<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="footer-bottom">
			<p>Copyright &copy;2022 HIMAWARI. Designed by <span>Universitários da Instituição Uni9</span></p>
		</div>
	</footer>
</body>

</html>