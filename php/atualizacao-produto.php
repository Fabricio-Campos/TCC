<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>

<?php
if (!empty($_GET['id'])) {
  include_once('conexao.php');
  $id_prod = $_GET['id'];
  $sqlSelect = "SELECT * FROM produtos WHERE id_prod= $id_prod";
  $result = $conexao->query($sqlSelect);
  // print_r($result);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $nome_prod =  $user_data['nome_prod'];
      $grupo_prod = $user_data['grupo_prod'];
      $quant_prod = $user_data['quant_prod'];
      //   $uni_prod = $user_data['uni_prod'] ;
      // $valor_prod = $user_data['valor_prod'] ;
      // $estoque_prod =$user_data['estoque_prod'];
      $data_prod = $user_data['data_prod'];
      $estoque_min = $user_data['estoque_min'];

      // echo $nome_prod;
      // echo $grupo_prod;
      // echo $quant_prod;
      // echo $uni_prod;
      // echo $valor_prod;
      // echo $estoque_prod;
      // echo $data_cad;
      // echo $estoque_min;


    } ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <title>Entrada e Baixa | Hayai</title>
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

      <div class="container-fluid text-center">  
        <div class="container">
          <div id="interface">
              <h1>ENTRADA E BAIXA NO ESTOQUE</h1>
              <br>
              <form action="" method="Post">
                
                <h1>
                  O que deseja fazer?
                </h1> <br>
                
                  <div class="selectesntrada">
                      <select name="controle" id="" class="opicaoentrada">
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                      </select>
                  
                      <input type="int" name="estoque" class="opicaoentrada" placeholder="Digite a quantia">
                  </div>

              <div class="button3">
                  <input class="btn text-white" type="submit" name="Executar">
              </div>
      </form>
        </div>
      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
    if (isset($_POST['Executar']) && !empty($_POST['controle']) && !empty($_POST['estoque'])) {
      $pcontrole = $_POST['controle'];
      $pquantidade = $_POST['estoque'];
      if ($quant_prod < $pquantidade && $pcontrole == 'saida') {
        echo "<script language='javascript'type='text/javascript'> 
                    alert('Não tem no estoque a quantidade necessária para saída!');</script>";
      } else {
        if ($pcontrole == 'entrada') {
          $atualiestoque = $quant_prod + $pquantidade;

        } else {
          $atualiestoque = $quant_prod - $pquantidade;
        }

        $sqlUpdate = "UPDATE produtos SET quant_prod='$atualiestoque' WHERE id_prod='$id_prod'";
        
        date_default_timezone_set('America/Sao_Paulo');
        $pdata= date('Y/m/d H:i:s');

        $result = $conexao->query($sqlUpdate);
        $sqlInsert1 = mysqli_query($conexao, "INSERT INTO estoque (fk_id_prod, quantidade, tipo ,data_move) 
        VALUES ('$id_prod','$pquantidade', '$pcontrole', '$pdata' )");
  
        echo "<script language='javascript'type='text/javascript'> 
                    alert('Cadastro efetuado com sucesso!');window.location.href='controle-estoque.php';</script>";
      }
    }
    // print_r($nome_prod);
  } else {
    // header('location: controle-estoque.php'); 
  }
} else {
  //   header('location: controle-estoque.php'); 
}
?>