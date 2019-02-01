<?php

include "conexao.php";

$nome= $_POST["usuario"];
$senha= md5($_POST["senha"]);
$botao= $_POST["botao"];

//-----------------Modulo Inclusão---------------------

	if ($botao=="cadastrar")
{
	$comando = $conexao->query("SELECT * FROM usuario WHERE usuario='$nome'");
	if(mysqli_num_rows($comando) > 0){
		echo "<script>alert('Usuario ja cadastrado!')</script>";
		echo ('<meta http-equiv="refresh" content=0;"cadastro.php">');
	exit();
	} 
	
	else {
	 if(!$conexao->query("INSERT INTO usuario (usuario,senha) VALUES ('$nome','$senha')")) die ('Os dados não foram inseridos');
	 echo "<script>alert('Usuario cadastrado com sucesso')</script>";
	 echo ('<meta http-equiv="refresh" content=0;"../login.php">');
	}
}

?>