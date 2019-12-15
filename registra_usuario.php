<?php

	require_once('db.class.php'); //arquivo importado para dentro desse script

	$usuario = $_POST['usuario'];
	$email = $_POST['email']; //itens que serão pegos do formulario
	$senha = md5($_POST['senha']); //criptografia md5 gera um hash de 32 caracteres

	$objDb = new db();
	$link = $objDb->conecta_mysql(); //conectando ao banco de dados

	$usuario_existe = false;
	$email_existe = false;

	//verificar se o usuario ja foi cadastrado
		$sql = " select * from sindico where sind_usuario = '$usuario' ";
		if($resultado_id = mysqli_query($link, $sql)) {

			$dados_usuario = mysqli_fetch_array($resultado_id);

			if (isset($dados_usuario['sind_usuario'])) {
				$usuario_existe = true;
			}
		}

		else {
			echo 'Erro ao tentar localizar o registro de usuário';
		}

	//verificar se o email ja foi cadastrado
		$sql = " select * from sindico where sind_email = '$email' ";
		if($resultado_id = mysqli_query($link, $sql)) {

			$dados_usuario = mysqli_fetch_array($resultado_id);

			if (isset($dados_usuario['sind_email'])) {
				$email_existe = true;			
			}
		}

		else {
			echo 'Erro ao tentar localizar o registro de e-mail';
		}

		if($usuario_existe || $email_existe) {

			$retorno_get = '';

			if($usuario_existe) {
				$retorno_get.= "erro_usuario=1&";
			}

			if($email_existe) {
				$retorno_get.= "erro_email=1&";
			}

			header('Location: index.php?'.$retorno_get);

			die(); //encerra a verificação de usuário cadastrado repetido
		}

	//inserção dos dados no banco de dados
	$sql = " insert into sindico(sind_usuario, sind_email, sind_senha) values ('$usuario', '$email', '$senha')";

	//executar a query - alert para avisar que o cadastro foi efetuado e redirecionamento de pagina para a propria index
	if (mysqli_query($link, $sql)) {
		echo  "<script>alert('Cadastro efetuado com sucesso!'); 
		window.location.href = 'index.php'
		</script>";
	}

	else {
		echo "Erro ao resgistrar o usuário!";
	}

?>