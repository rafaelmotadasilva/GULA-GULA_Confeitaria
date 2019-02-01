<?php
session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	
$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../upload.php');
	exit();
} 

else {
	echo "<script>alert('Usuário ou senha inválidos!');window.location.href='../login.php';</script>";
}