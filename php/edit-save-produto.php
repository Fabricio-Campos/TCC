<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>
<?php
    include_once('conexao.php');

    if(isset($_POST['update']) && !empty($_POST['nome_produto']) && !empty($_POST['grupo_produto'])&& !empty($_POST['quantidade_produto'])&& !empty($_POST['estoque_min'])){
        $id_prod =$_POST['id_prod'];
        $nome_prod = $_POST['nome_produto'];
        $grupo_prod = $_POST['grupo_produto'];
        $quant_prod = $_POST['quantidade_produto'];
        // $uni_prod = $_POST['unit_produto'];
        // $valor_prod = $_POST['valor_produto'];
        $estoque_min = $_POST['estoque_min'];

        date_default_timezone_set('America/Sao_Paulo');
        $data_prod= date('Y/m/d H:i:s');
        echo $data_prod;

        $sqlUpdate ="UPDATE produtos SET nome_prod='$nome_prod', grupo_prod='$grupo_prod', quant_prod='$quant_prod', estoque_min='$estoque_min',data_prod='$data_prod' WHERE id_prod='$id_prod'";
    
        $result = $conexao->query($sqlUpdate);
      
      header('location: cadastro-estoque.php');
   }else{
    echo "<script language='javascript'type='text/javascript'> 
    alert('Não foi possível atualizar');window.location.href='cadastro-estoque.php'; </script>";
  }
?>