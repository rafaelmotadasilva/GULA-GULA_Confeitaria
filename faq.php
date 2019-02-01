<?php 
session_start();
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
        <section>
          <div class="container mt-4 py-5 pl-5 pr-5">
            <h1>FAQ - Perguntas Frequentes</h1><br>
            <h4>Valores</h4><br>
            <p class="lead">
              Trabalhamos com produtos à pronta entrega nas lojas e também com doces personalizados.
              Para saber os preços dos produtos à venda nas lojas, ligue para (11) 4125-2288. 
            </p>
            
            <h4>Entrega</h4><br>
            <p class="lead">
            Fazemos entregas agendadas com antecedência, para até 16km de distância. As entregas são cobradas de acordo com cada distância. Caso você necessite de entrega além de 16km ou em outra cidade, terceirizamos o serviço com uma empresa parceira. Não trabalhamos com delivery. 
            </p>

            <h4>Validade</h4><br>
            <p class="lead">
            Nossos produtos são artesanais e feitos à mão. Não trabalhamos com conservantes. Portanto, a validade deles é curta: Brownie (18 dias), Pão de Mel (14 dias), Cupcakes, cheesecakes e bolos (5 dias), cookies americanos (10 dias), cookies amanteigados (75 dias). Brigadeiros e Tortinhas (4 dias). 
            </p>

        </section>
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