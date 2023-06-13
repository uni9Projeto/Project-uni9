<?php
session_start();

require_once 'php/config.php';

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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/tabelaUser.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" href="img/logo1.png">
    <title>Usuários</title>
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
                <li><a href="#">TABELA DE USUÁRIOS</a></li>
                <li><a href="painel.php">VOLTAR</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
        <div class ="m-5">
        <table class="table table-bordered text-center">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">SENHA</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Executa a consulta SQL
                    $sql_registros = "SELECT * FROM usuarios ORDER BY id ASC";
                    $resultado = $conexao->query($sql_registros);

                    // Verifica se a consulta foi executada com sucesso
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($user_data = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $user_data['id'] . "</td>";
                            echo "<td>" . $user_data['nome'] . "</td>";
                            echo "<td>" . $user_data['email'] . "</td>";
                            echo "<td>" . $user_data['senha'] . "</td>";
                            echo "<td> 

                                <a class='btn btn-sm btn-primary' href='php/editUsuarios.php?id=$user_data[id]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                    </svg>
                                </a>

                                <a class='btn btn-sm btn-danger' href='php/deleteUser.php?id=$user_data[id]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                    </svg>
                                </a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Erro na consulta: " . $conexao->error;
                    }
                    ?>
                </tbody>
            </table>
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
