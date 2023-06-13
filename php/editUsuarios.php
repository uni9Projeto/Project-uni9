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
        while ($user_data = mysqli_fetch_assoc($resultado)) {
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
        }
    } else {
        // Se não existir redireciona para:
        header('Location: ../tabelaUser.php');
        exit;
    }
} else {
    header('Location: ../tabelaUser.php');
    exit;
}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="icon" href="../img/logo1.png">
    <title>Cadastro</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="nav-bar">
            <input type="checkbox" id="check">
            <label for="check" class="btn-menu">
                <i class="fa fa-bars"></i>
            </label>

            <label class="logo">HIMAWARI</label>
            <ul>
                <li><a href="#">EDITAR USUÁRIOS</a></li>
                <li><a href="../tabelaUser.php">VOLTAR</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="row">
            <h1>Editar Cadastro</h1>
            <form action="saveUser.php" method="post">
                <label>Nome*</label>
                <input type="text" name="nome" id="nome" placeholder="Exemplo" required minlength="3" maxlength="25"
                    value="<?php echo $nome ?>">

                <label>E-mail*</label>
                <input type="email" name="email" id="email" placeholder="exemplo@gmail.com" required minlength="6"
                    maxlength="30" value="<?php echo $email ?>">

                <label>Senha*</label>
                <input type="password" name="senha" id="senha" placeholder="senha123" required minlength="8"
                    maxlength="16" value="<?php echo $senha ?>">

                <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" name="update" class="enviar">Enviar</button>
                </form>
        </div>
    </main>

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