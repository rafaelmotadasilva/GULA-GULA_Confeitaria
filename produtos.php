<?php 
session_start();
require "functions/conexao.php"; 
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
                <li class="nav-item active">
                  <a class="nav-link" href="produtos.php"><font face="Carter One">Produtos</font><span class="sr-only">(Página atual)</span></a>
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
    <!-- Page Content -->
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
            <div class="row pt-2">
                <?php
                    if(isset($_GET['cat']) && $_GET['cat'] != ''){
                        $id_cat = addslashes($_GET['cat']);
                        $sql_categoria = "AND id_categoria = '".$id_cat."'";
                    }else{
                        $sql_categoria = ""; 
                    }
                    $read_produto = mysqli_query($conexao, "SELECT * FROM produto WHERE id_produto != '' {$sql_categoria}");
                    if(mysqli_num_rows($read_produto) > '0'){
                        foreach($read_produto as $read_produto_view){
                ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class = "col d-flex justify-content-center">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $read_produto_view['arquivo'];?>" alt="">
                            <div class="card-body">
                                <h5>R$ <?php echo number_format($read_produto_view['valor_produto']);?></h5>
                                <h5 class="card-title">
                                    <?php
                                    echo '<a href="produto.php?id='.$read_produto_view['id_produto'].'" class="nav-link-btn">'.$read_produto_view['nome_produto'].'</a>';
                                    ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>
            </div>
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
    </div>
  </body>
</html>