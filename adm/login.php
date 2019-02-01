<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Sistema de Login - PHP + MySQL</title>
    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos customizados para esse template -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form action="functions/logar.php" method="POST" name="login" class="form-signin">
      <img class="mb-4" src="https://image.flaticon.com/icons/svg/992/992754.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
      <label for="inputEmail" class="sr-only">Seu usuário</label>
      <input type="text" name="usuario" class="form-control" placeholder="Seu usuário" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button><br>
      <a class="nav-link" href="cadastro.php">Novo por aqui? Cadastre-se</a>
    </form>
  </body>
</html>