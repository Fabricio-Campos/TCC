<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>
<?php  
  if(!empty($_GET['id'])){
    include_once('conexao.php');
    $id_prod= $_GET['id'];
    $sqlSelect= "SELECT * FROM produtos WHERE id_prod= $id_prod";
    $result = $conexao-> query($sqlSelect);
    // print_r($result);
   
    if($result->num_rows>0){
        while($user_data = mysqli_fetch_assoc($result)){
          $nome_prod =  $user_data['nome_prod'];
          $grupo_prod = $user_data['grupo_prod'];
          $quant_prod = $user_data['quant_prod'];
          // $uni_prod = $user_data['uni_prod'] ;
          // $valor_prod = $user_data['valor_prod'] ;
          $data_prod= $user_data['data_prod'];
          $estoque_min= $user_data['estoque_min'];
        }
        // print_r($nome_prod);
      }else{
        header('location: controle-estoque.php'); 
      }
    }else{
      header('location: controle-estoque.php'); 
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar produto | Hayai</title>
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
            <a class="nav-link" href="../login.html">Login</a>
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
                
                <form action="edit-save-produto.php" method="POST">
                    <label for="" >Nome</label><br>
                    <input type="text" name="nome_produto" value="<?php echo $nome_prod ?>" placeholder="Digite o nome do produto..."><br>
                   
                    <label for="" >Grupo do produto</label><br>
                    <select  id="option" name="grupo_produto" value="<?php echo $nome_prod ?>">
                       <option value="INS"  <?=($grupo_prod == 'INS')?'selected':''?>>Insumo</option>
                       <option value="CONS"<?=($grupo_prod == 'CONS')?'selected':''?>>Consumo</option>
                       <option value="MP" <?=($grupo_prod == 'MP')?'selected':''?>>Matéria Prima</option>
                    </select><br>
                    
                    <input type="hidden" name="quantidade_produto" placeholder="Digite a quantidade..." value="<?php echo $quant_prod ?>"><br>
                    
                    
                    <label for="" >Estoque mínimo</label><br>
                    <input type="text" name="estoque_min" placeholder="Digite o valor do estoque mínimo..." value="<?php echo $estoque_min?>"><br>

                    <!-- <label for="" >Unidade</label><br>
                    <select id="option" name="unit_produto">
                      <option value="pc" <?=($uni_prod == 'pc')?'selected':''?>>Peça</option>
                      <option value="uni"  <?=($uni_prod == 'uni')?'selected':''?>>1 unidade</option>
                      <option value="cx2" <?=($uni_prod == 'cx2')?'selected':''?>>Caixa com 2 unidades</option>
                      <option value="cx3"<?=($uni_prod == 'cx3')?'selected':''?>>Caixa com 3 unidades</option>
                      <option value="cx5" <?=($uni_prod == 'cx5')?'selected':''?>>Caixa com 5 unidades</option>
                      <option value="cx10" <?=($uni_prod == 'cx10')?'selected':''?>>Caixa com 10 unidades</option>
                      <option value="cx15" <?=($uni_prod == 'cx15')?'selected':''?>>Caixa com 15 unidades</option>
                      <option value="cx20"  <?=($uni_prod == 'cx20')?'selected':''?>>Caixa com 20 unidades</option>
                      <option value="cx25" <?=($uni_prod == 'cx25')?'selected':''?>>Caixa com 25 unidades</option>
                      <option value="cx50"  <?=($uni_prod == 'cx50')?'selected':''?>>Caixa com 50 unidades</option>
                      <option value="cto"  <?=($uni_prod == 'cto')?'selected':''?>>Cem unidades</option>
                    </select><br> -->
                    
                    <!-- <label for="" >Valor total</label><br>
                    <input type="text" name="valor_produto" placeholder="Digite o valor do produto..." value="<?php echo $valor_prod ?>"><br>
                     -->
                    <input type="hidden" name="id_prod" value="<?php echo $id_prod?>">
                    <div class="button">
                        <button type="submit" name="update"><p id="textCenter">Atualizar</p></button> <button type="reset"><p id="textCenter">Limpar</p></button>
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