<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de produtos | Hayai</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.html"><img src="../images/1.png" class="logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="painelgeral.php">Painel de controle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sobrenos.php">Suporte</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="logout.php">Sair</a>
          </li>
    </div>
  </nav>

    <div class="container-fluid">
        <div class="container">
            <div class="cadastroproduto">
                <h1>CADASTRO DE PRODUTO</h1>
                
                <form action="cadastrar-produto.php" method="POST">
                    <label for="" >Nome</label><br>
                    <input type="text" name="nome_produto" placeholder="Digite o nome do produto..."><br>
                   
                    <label for="" >Grupo do produto</label><br>
                    <select  id="option" name="grupo_produto">
                       <option value="INS" >Insumo</option>
                       <option value="CONS">Consumo</option>
                       <option value="MP">Matéria Prima</option>
                    </select><br>
                    
                    <label for="" >Quantidade</label><br>
                    <input type="text" name="quantidade_produto" placeholder="Digite a quantidade..."><br>
                   
                    <!-- <label for="" >Unidade</label><br>
                    <select id="option" name="unit_produto">
                      <option value="pc">Peça</option>
                      <option value="uni">1 unidade</option>
                      <option value="cx2">Caixa com 2 unidades</option>
                      <option value="cx3">Caixa com 3 unidades</option>
                      <option value="cx5">Caixa com 5 unidades</option>
                      <option value="cx10">Caixa com 10 unidades</option>
                      <option value="cx15">Caixa com 15 unidades</option>
                      <option value="cx20">Caixa com 20 unidades</option>
                      <option value="cx25">Caixa com 25 unidades</option>
                      <option value="cx50">Caixa com 50 unidades</option>
                      <option value="cto">Cem unidades</option>
                    </select><br> -->

                    
                    <!-- <label for="" >Valor total</label><br>
                    <input type="text" name="valor_produto" placeholder="Digite o valor do produto..."><br> -->
                    
                    <label for="" >Estoque mínimo</label><br>
                    <input type="text" name="estoque_min" placeholder="Digite o valor do estoque mínimo..."><br>
                   
                   
                    <div class="button">
                        <button type="submit" name="submit"><p id="textCenter">Cadastrar</p></button> <button type="reset"><p id="textCenter">Limpar</p></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

        

</body>

</html>