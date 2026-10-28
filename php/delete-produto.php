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
        
        $sqlDelete = "DELETE FROM produtos WHERE id_prod = '$id_prod'";
        $resultDelete = $conexao->query($sqlDelete);

    }
}
header('location: controle-estoque.php'); 

?>