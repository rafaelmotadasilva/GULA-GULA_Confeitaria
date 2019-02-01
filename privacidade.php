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
          <h1>
            Política de privacidade
          </h1><br>
        <p class="lead">Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível.</p>
        <p class="lead">A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o GULA-GULA Confeitaria.</p>
        <p class="lead">Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o GULA-GULA Confeitaria serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98).</p>
        <p class="lead">A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p><p>O uso do GULA-GULA Confeitaria pressupõe a aceitação deste Acordo de privacidade. A equipa do GULA-GULA Confeitaria reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.</p>
        <h2>
          Os anúncios
        </h2><br>
        <p class="lead">Tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.</p>
        <h2>
          Ligações a Sites de terceiros
        </h2><br>
        <p class="lead">O GULA-GULA Confeitaria possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p>
        <p class="lead">Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.</p>
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