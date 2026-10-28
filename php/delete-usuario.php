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
    
    $id_cad= $_GET['id'];
    $sqlSelect= "SELECT * FROM cadastros WHERE id_cad= $id_cad";
    $result = $conexao-> query($sqlSelect);

    // print_r($result);
   
    if($result->num_rows>0){
        $sqlDelete = "DELETE FROM cadastros WHERE id_cad = '$id_cad'";
        $resultDelete = $conexao->query($sqlDelete);

    }
}
header('location: controle-usuario.php'); 

?>