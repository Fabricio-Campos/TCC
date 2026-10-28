<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>
<?php
    include_once('conexao.php');

    if(isset($_POST['update']) && !empty($_POST['nomecad']) && !empty($_POST['emailcad'])&& !empty($_POST['senhacad'])&& !empty($_POST['telefonecad'])){
        $id_cad =$_POST['id_cad'];
        $nomecad = $_POST['nomecad'];
        $emailcad = $_POST['emailcad'];
        $senhacad = $_POST['senhacad'];
        $telefonecad = $_POST['telefonecad'];
        $cargocad = $_POST['cargocad'];

        $sqlUpdate ="UPDATE cadastros SET nome_cad='$nomecad', email_cad='$emailcad', senha_cad='$senhacad', telefone_cad='$telefonecad', cargo_cad= '$cargocad' WHERE id_cad='$id_cad'";
        $result = $conexao->query($sqlUpdate);
      header('location: controle-usuario.php'); 
    }else{
      echo "<script language='javascript'type='text/javascript'> 
      alert('Não foi possível atualizar');window.location.href='controle-usuario.php'; </script>";
    }
?>