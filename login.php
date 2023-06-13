<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" href="img/logo1.png">
    <title>Login</title>
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
                <li><a href="index.html">HOME</a></li>
                <li><a href="cadastro.php">CADASTRO</a></li>
                <li><a href="#">LOGIN</a></li>
                <li><a href="contato.html">CONTATO</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="row">
            <h1>Login</h1>
            <form action="php/testLogin.php" method="post">

                <label>E-mail*</label>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" required minlength="6"
                    maxlength="30">

                <label>Senha*</label>
                <input type="password" name="senha" id="senha" placeholder="senha123" required minlength="8"
                    maxlength="16">

                <button type="submit" name="submit" class="enviar">Enviar</button>
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