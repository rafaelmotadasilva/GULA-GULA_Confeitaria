<?php

include "conexao.php";

$nome= $_POST["nome"];
$usuario= $_POST["usuario"];
$email= $_POST["email"];
$senha= md5($_POST["senha"]);
$cep= $_POST["cep"];
$estado= $_POST['estado'];
$cidade= $_POST['cidade'];
$endereco= $_POST['endereco'];
$botao= $_POST["botao"];

//-----------------Modulo Inclusão---------------------

if ($botao=="Criar")
{
	$comando = $conexao->query("SELECT * FROM cliente WHERE usuario='$usuario'");
	if(mysqli_num_rows($comando) > 0){
		echo "<script>alert('Usuario ja cadastrado!')</script>";
		echo ('<meta http-equiv="refresh" content=0;"../cadastro.php">');
	exit();
	} 
	
	$comando = $conexao->query("SELECT * FROM cliente WHERE email='$email'");
	if(mysqli_num_rows($comando) > 0){
		echo "<script>alert('Email ja cadastrado!')</script>";
		echo ('<meta http-equiv="refresh" content=0;"../cadastro.php">');
	exit();
	}

	else {
	 if(!$conexao->query("INSERT INTO cliente (nome,usuario,email,senha,cep,estado,cidade,endereco) VALUES ('$nome','$usuario','$email','$senha','$cep','$estado','$cidade','$endereco')"));
	 echo "<script>alert('Cadastrado com sucesso')</script>";
	 echo ('<meta http-equiv="refresh" content=0;"../login.php">');
	}
}

?>