<?php
include("functions/conexao.php");
session_start();
include('functions/session.php');
$msg = false;
if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pega a extensão do arquivo
    $novo_nome = $_FILES['arquivo']['name']; //Define o nome do arquivo
    $diretorio = "galeria/upload/"; // Define o diretório para onde enviaremos o arquivo
    $id_categoria = $_POST['id_categoria'];
    $nome_produto = $_POST['nome_produto'];
    $valor_produto = $_POST['valor_produto'];
    $descricao_produto = $_POST['descricao_produto'];
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); // Efetua o upload
    $sql_code = "INSERT INTO produto (id_produto, arquivo, id_categoria, nome_produto, valor_produto, descricao_produto) VALUES(null, 'adm/galeria/upload/$novo_nome', '$id_categoria', '$nome_produto', '$valor_produto', '$descricao_produto')";
    if(mysqli_query($conexao, $sql_code)){
        $msg = "<div class='alert alert-success'>
                    Cadastro feito com sucesso!
                </div>";
        echo ('<meta http-equiv="refresh" content=0;"upload.php">');
    }else{
        $msg = "<div class='alert alert-danger'>
                    Falha ao cadastrar produto!
                </div>";
        echo ('<meta http-equiv="refresh" content=0;"upload.php">');
        }
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
                <?php if(!$_SESSION['usuario']){?>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastre-se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Entre</a>
                    </li>     
                <?php }
                else {?>
                    <a class="nav-link" href="#"><?php echo $_SESSION['usuario'];?></a>
                    <li class="nav-item">
                        <a class="nav-link" href="functions/logout.php">Sair</a>
                    </li>
                    
                <?php }?>
            </li>  
          </ul>
        </div>
        <!-- Navegação -->   
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#481B08"> 
          <div class="container"> 
            <a class="navbar-brand" href="upload.php">
              <img src="galeria/identidade-visual/marca-e-logo/admin.png" width="84,28" height="59,1" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="upload.php"><font face="Carter One">Painel</font></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="upload.php"><font face="Carter One">Produtos</font></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="upload.php"><font face="Carter One">Pessoas</font></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="upload.php"><font face="Carter One">Vendas</font></a>
                </li>
              </ul>
            </div> 
          </div>
        </nav>
      </header>
      <div class="container">
        <div class="row pt-4">
            <div class="col-lg-3 mt-5">
                <h2 class="py-2">Painel</h2>
                <div class="list-group"> 
                    <h5><a class="list-group-item" href="upload.php">Produtos</a></h5>  
                </div>
                <div class="nav-item"> 
                    <h5><a class="list-group-item" href="upload.php">Gerenciar Pessoas</a></h5>  
                </div>
                <div class="nav-item"> 
                    <h5><a class="list-group-item" href="upload.php">Vendas</a></h5>  
                </div>
            </div>
            <div class="col-lg-9 mt-5">
                <div class="col-sm-12">
                <!--Formulário-->
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <h2 class="mb-4">Cadastro de Produtos</h2>
                    <?php if($msg != false) echo "<p> $msg </p>";?>
                        <div class="form-row mb-4">
                            <div class="col">
                                <input type="file" required name="arquivo" class="form-control-file" maxlength="64">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row align-items-center">      
                                <select class="custom-select ml-2 mr-2" name="id_categoria">
                                <option selected>Categorias...</option>
                                    <option value="2">Chocolates</option>
                                    <option value="3">Trufas</option>
                                    <option value="4">Colomba Pascal</option>
                                    <option value="5">Pães de Mel</option>
                                    <option value="6">Panetones</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" required="required" class="form-control" name="nome_produto" placeholder="Nome" maxlength="32">
                            </div>
                            <div class="col">
                                <input type="number" required="required" class="form-control" value="39"  name="valor_produto">
                            </div>
                        </div>       
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" required="required" class="form-control" id="" name="descricao_produto" rows="2" maxlength="64"></textarea>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                <span id="nav-bar-cart"></span>
                            </button>       
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
          <div class="row">
            <div class="col-12 col-md">
              <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
            </div>
            <div class="col-6 col-md">
            </div>
            <div class="col-6 col-md">
            </div>
            <div class="col-6 col-md">
            </div>
          </div>
        </footer>
      </div>
  </body>
</html>