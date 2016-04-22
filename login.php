<?php
ob_start();
session_start();
if(isset($_SESSION['usuario']) && (isset($_SESSION['senha']))){
	header("Location: home.php");exit;
}
	include("conexao2.php");
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="cssprologin/signin.css" rel="stylesheet">

    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="senha" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php

if(isset($_GET['acao'])){

	if(!isset($_POST['logar'])){

		$acao = $_GET['acao'];
		if($acao=='negado'){
			echo '<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert">�</button>
						  <strong>Erro ao acessar!</strong> Voc� precisa estar logado p/ acessar o Sistema.
					</div>';
		}
	}
}



if(isset($_POST['logar'])){
		// RECUPERAR DADOS FORM
		$email = trim(strip_tags($_POST['email']));
		$senha	 = trim(strip_tags($_POST['senha']));

		// SELECIONAR BANCO DE DADOS

		$select = "SELECT * from login WHERE BINARY email=:email AND BINARY senha=:senha ";

		try{
			$result = $conexao->prepare($select);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->bindParam(':senha', $senha, PDO::PARAM_STR);
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				$email = $_POST['email'];
				$senha	 = $_POST['senha'];
				$_SESSION['usuario'] = $email;
				$_SESSION['senha'] = $senha;

				echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">�</button>
                      <strong>Logado com Sucesso!</strong> Redirecionando para o sistema.
                </div>';

				header("Refresh: 3, home.php?acao=welcome");
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">�</button>
                      <strong>Erro ao logar!</strong> Os dados est�o incorretos.
                </div>';
			}

		}catch(PDOException $e){
			echo $e;
		}



	}// se clicar no bot�o entrar no sistema

?>
