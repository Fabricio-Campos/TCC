<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>
<?php
    include_once('conexao.php');

  if(isset($_POST['submit']) && !empty($_POST['nome_produto']) && !empty($_POST['grupo_produto'])&& !empty($_POST['quantidade_produto'])&& !empty($_POST['estoque_min'])){
    
    $nome_prod = $_POST['nome_produto'];
    $grupo_prod = $_POST['grupo_produto'];
    $quant_prod = $_POST['quantidade_produto'];
    // $uni_prod = $_POST['unit_produto'];
    // $valor_prod = $_POST['valor_produto'];
    $estoque_min = $_POST['estoque_min'];
    
    date_default_timezone_set('America/Sao_Paulo');
    $data_prod= date('Y/m/d H:i:s');
 
  $sqlInsert = mysqli_query($conexao, "INSERT INTO produtos (nome_prod,	grupo_prod,	quant_prod, data_prod, estoque_min) 
  VALUES ('$nome_prod', '$grupo_prod' ,'$quant_prod ', '$data_prod', '$estoque_min')");

  if ($sqlInsert){
    echo "<script language='javascript'type='text/javascript'> 
    alert('Cadastro efetuado com sucesso!');window.location.href='controle-estoque.php';</script>";
  }
  else{
    echo "<script language='javascript'type='text/javascript'> 
    alert('Não foi possível cadastrar');window.location.href='cadastrar-prod.php'; </script>";
  }

}else{
  echo "<script language='javascript'type='text/javascript'> 
  alert('Não foi possível cadastrar');window.location.href='cadastrar-prod.php'; </script>";
}
    // if(!empty($_POST['submit'])){
    //     if($unit_prod=='pc'){
    //       echo $quant_estoque= $unit_prod;
    //     }
    //     elseif($unit_prod=='uni'){
    //       echo $quant_estoque= $unit_prod;
    //     }
    //     elseif($unit_prod=='cx2'){
    //       echo $quant_estoque= $unit_prod * 2;
    //     }
    //     elseif($unit_prod=='cx3'){
    //       echo  $quant_estoque= $unit_prod * 3;
    //     }
    //     elseif($unit_prod=='cx5'){
    //       echo  $quant_estoque= $unit_prod * 5;
    //     }
    //     elseif($unit_prod=='cx10'){
    //       echo  $quant_estoque= $unit_prod * 10;
    //     }
    //     elseif($unit_prod=='cx15'){
    //       echo  $quant_estoque= $unit_prod  * 15;
    //     }
    //     elseif($unit_prod=='cx20'){
    //       echo  $quant_estoque= $unit_prod * 20;
    //     }
    //     elseif($unit_prod=='cx25'){
    //       echo  $quant_estoque= $unit_prod * 25;
    //     }
    //     elseif($unit_prod=='cx50'){
    //       echo  $quant_estoque= $unit_prod * 50;
    //     }
    //     elseif($unit_prod=='cto'){
    //       echo  $quant_estoque= $unit_prod * 100;
    //     }
    //     else{
    //       echo "<script language='javascript'type='text/javascript'> 
    //       alert('Não foi possível cadastrar');window.location.href='../cadastrar-produto.html'; </script>";
    //     }
    //   print_r($quant_estoque);
    //   $sqlInsert1 = mysqli_query($conexao, "INSERT INTO estoque (quant_estoque) VALUES ('$quant_estoque')");
    // }

 


?>