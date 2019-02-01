<?php
include("functions/conexao.php");
session_start();
include('functions/session.php');
$id_produto = addslashes($_GET['id']);
if (!isset($_SESSION['carrinho'])){
  $_SESSION['carrinho'] = array();
}
$read_produto = mysqli_query($conexao, "SELECT * FROM produto WHERE id_produto = '".$id_produto."'");
  if(mysqli_num_rows($read_produto) > '0'){
    foreach($read_produto as $read_produto_view);
    if($_SESSION['carrinho'] [$id_produto]) {
        $_SESSION['carrinho'] [$id_produto] += 1;
    }else{
      $_SESSION['carrinho'] [$id_produto] = 1;
    }
    header('Location: meu-carrinho.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head> 
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Carter+One|Open+Sans" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="icon" href="galeria/identidade-visual/marca-e-logo/cake-slice.png">
    <title>GULA-GULA Confeitaria | Loja virtual de doces</title>
  </head>
  <body>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>   
      <header>     
        <!-- Abas nav -->   
        <div class="container">
          <ul class="nav justify-content-center">   
            <li class="nav-item">
              <?php if(!$_SESSION['cliente']){?>
                <li class="nav-item">
                  <a class="nav-link" href="cadastro.php">Cadastre-se</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Entre</a>
                </li>
                <li class="nav-item">
                  <a href="meu-carrinho.php" class="nav-link" title="Acesse seu Carrinho">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="nav-bar-cart">My Cart</span>
                  </a>
                </li>            
              <?php }
              else {?>
                <a class="nav-link" href="meus-pedidos.php">Olá! <?php echo $_SESSION['cliente'];?></a>
                <li class="nav-item">
                  <a class="nav-link" href="functions/logout.php">Sair</a>
                </li>
                <li class="nav-item">
                  <a href="meu-carrinho.php" class="nav-link" title="Acesse seu Carrinho">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="nav-bar-cart">My Cart</span>
                  </a>
                </li>
              <?php }?>
            </li>  
          </ul>
        </div>
        <!-- Navegação -->   
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#481B08"> 
          <div class="container"> 
            <a class="navbar-brand" href="index.php">
              <img src="galeria/identidade-visual/marca-e-logo/logo.png" width="84,28" height="59,1" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php"><font face="Carter One">Início</font></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="produtos.php"><font face="Carter One">Produtos</font></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sobre.php"><font face="Carter One">Sobre</font></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contato.php"><font face="Carter One">Contato</font></a>
                </li>  
              </ul>
            </div> 
          </div>
        </nav>
      </header>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mt-5">
            <h2 class="py-2">Categorias</h2>
            <div class="list-group">
              <h5>
                <?php
                  $read_categoria = mysqli_query($conexao, "SELECT * FROM categoria");
                  if(mysqli_num_rows($read_categoria) > '0'){
                    foreach($read_categoria as $read_categoria_view){
                      echo utf8_encode('<a href="produtos.php?cat='.$read_categoria_view['id_categoria'].'" class="list-group-item">'.$read_categoria_view['descricao_categoria'].'</a>');
                    }
                  }
                ?>
              </h5>
            </div>
          </div>
          <div class="col-lg-9 mt-5">
            <h2 class="py-2">Carrinho</h2>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <td><h5>Item</h5></td>
                  <td><h5>Descrição</h5></td>
                  <td><h5>Valor</h5></td>
                  <td><h5>Quantidade</h5></td>
                  <td><h5>Valor Total</h5></td>
                  <td><h5>Opções</h5></td>
                </tr>
                <?php
                  $item_carrinho = '0';
                  if(count($_SESSION['carrinho']) > '0'){
                    foreach($_SESSION['carrinho'] as $id_produto_carrinho => $quantidade_produto_carrinho){
                      $item_carrinho++;
                      $read_produto_carrinho = mysqli_query($conexao, "SELECT nome_produto, valor_produto FROM produto WHERE id_produto = '".$id_produto_carrinho."'");
                      if (mysqli_num_rows($read_produto_carrinho) > '0'){
                        foreach($read_produto_carrinho as $read_produto_carrinho_view);
                        $valor_total_produto_carrinho = $quantidade_produto_carrinho * $read_produto_carrinho_view['valor_produto'];
                        $valor_total += $valor_total_produto_carrinho;
                      }
                    echo '<tr>
                        <td>'.$item_carrinho.'</td>
                        <td>'.$read_produto_carrinho_view['nome_produto'].'</td>
                        <td>'.number_format($read_produto_carrinho_view['valor_produto']).'</td>
                        <td>'.$quantidade_produto_carrinho.'</td>
                        <td>'.number_format($valor_total_produto_carrinho).'</td>
                        <td><a class="btn btn-primary my-0" href="functions/deletar-prod-carrinho.php?id='.$id_produto_carrinho.'"><font face="Carter One">Deletar</font></a></td>
                    </tr>';
                    } 
                  }
                ?>
              </table>
            </div>  
          <div class="card-footer">
            <h3>R$ <?php echo number_format($valor_total);?></h3>
          </div>
          <table class="table">
            <tr>
              <td><a class="btn btn-primary" href="functions/finalizar-pedido.php"><font face="Carter One">Finalizar</font></a></td>
            </tr>
          </table>
        </div>
      </div>
      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
          </div>
          <div class="col-6 col-md">
            <h5><font face="Open Sans">Institucional</font></h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="faq.php">FAQ</a></li>
              <li><a class="text-muted" href="privacidade.php">Privacidade</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
          <h5><font face="Open Sans">Redes Sociais</font></h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="https://www.facebook.com/" target="_blank">Facebook</a></li>
              <li><a class="text-muted" href="https://www.instagram.com/?hl=pt-br" target="_blank">Instagram</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5><font face="Open Sans">Sobre</font></h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="equipe.php">Equipe</a></li>
            </ul>
          </div>
        </div>
      </footer>
  </body>
</html>
