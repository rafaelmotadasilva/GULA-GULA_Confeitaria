<?php
	include_once('conexao.php');
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	
	$comando = "INSERT INTO contato(nome, sobrenome, email, mensagem, created) VALUES ('$nome', '$sobrenome', '$email', '$mensagem', NOW())";
	if($resulta = mysqli_query($conexao, $comando)){
		echo "<script>alert('Mensagem enviada com sucesso')</script>";
		echo ('<meta http-equiv="refresh" content=0;"../contato.php">');
	}else{
		echo "<script>alert('Falha no envio!')</script>";
		echo ('<meta http-equiv="refresh" content=0;"../contato.php">');
	}
	
?>