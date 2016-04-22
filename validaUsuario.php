<?php
ob_start();
session_start();
if(isset($_SESSION['usuariowva']) && (isset($_SESSION['senhawva']))){
	header("Location: home.php");exit;
}
	include("conexao2.php");
?>


  <?php

  if(isset($_GET['acao'])){

  	if(!isset($_POST['logar'])){

  		$acao = $_GET['acao'];
  		if($acao=='negado'){
  			echo '<div class="alert alert-danger">
  						  <button type="button" class="close" data-dismiss="alert">×</button>
  						  <strong>Erro ao acessar!</strong> Você precisa estar logado p/ acessar o Sistema.
  					</div>';
  		}
  	}
  }



  if(isset($_POST['logar'])){
  		// RECUPERAR DADOS FORM
  		$email = trim(strip_tags($_POST['email']));
  		$senha	 = trim(strip_tags($_POST['senha']));

  		// SELECIONAR BANCO DE DADOS

  		$select = "SELECT * from login WHERE BINARY usuario=:usuario AND BINARY senha=:senha ";

  		try{
  			$result = $conexao->prepare($select);
  			$result->bindParam(':email', $email, PDO::PARAM_STR);
  			$result->bindParam(':senha', $senha, PDO::PARAM_STR);
  			$result->execute();
  			$contar = $result->rowCount();
  			if($contar>0){
  				$email = $_POST['email'];
  				$senha	 = $_POST['senha'];
  				$_SESSION['usuariowva'] = $email;
  				$_SESSION['senhawva'] = $senha;

  				echo '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Logado com Sucesso!</strong> Redirecionando para o sistema.
                  </div>';

  				header("Refresh: 3, home.php?acao=welcome");
  			}else{
  				echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Erro ao logar!</strong> Os dados estão incorretos.
                  </div>';
  			}

  		}catch(PDOException $e){
  			echo $e;
  		}



  	}// se clicar no botão entrar no sistema

  ?>