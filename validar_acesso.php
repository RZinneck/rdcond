<?php

	session_start();

	require_once('db.class.php'); //arquivo importado para dentro desse script

	$usuario = $_POST['usuario']; //recebendo os parametros usuario e senha pelo POST
	$senha = md5($_POST['senha']); //criptografia md5 gera um hash de 32 caracteres

	$sql = "SELECT sind_id, sind_usuario, sind_email FROM sindico WHERE sind_usuario = '$usuario' AND sind_senha = '$senha'"; //procurando o usuario e senha no bd
	
	$objDb = new db();
	$link = $objDb->conecta_mysql(); //conectando ao banco de dados

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id) { 									
		$dados_usuario = mysqli_fetch_array($resultado_id); //validação do usuário - instrução fecth array recupera em forma de array os dados do usuario no banco de dados

		if(isset($dados_usuario['sind_usuario'])) {

			$_SESSION['id_usuario'] = $dados_usuario['sind_id'];
			$_SESSION['usuario'] = $dados_usuario['sind_usuario']; // variaveis globais podem ser usadas em todo documento
			$_SESSION['email'] = $dados_usuario['sind_email'];

			header('Location: home.php');
		}
		else {
			header('Location: index.php?erro=1');
		}
	}
	else {
		echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
	}

?>