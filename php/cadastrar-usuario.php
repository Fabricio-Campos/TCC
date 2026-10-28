<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>
<?php
    include_once('conexao.php');

    if(isset($_POST['submitcad']) && !empty($_POST['nomecad']) && !empty($_POST['emailcad'])&& !empty($_POST['senhacad'])&& !empty($_POST['telefonecad'])){
    
      $nomecad = $_POST['nomecad'];
      $emailcad = $_POST['emailcad'];
      $senhacad = $_POST['senhacad'];
      $telefonecad = $_POST['telefonecad'];
      $cargocad = $_POST['cargocad'];
       
      date_default_timezone_set('America/Sao_Paulo');
      $data_cad= date('Y/m/d H:i:s');

      $sqlInsert = mysqli_query($conexao, "INSERT INTO cadastros (nome_cad, email_cad, senha_cad, telefone_cad, cargo_cad, data_cad, arq_cad)
       VALUES ('$nomecad', '$emailcad', '$senhacad', '$telefonecad', '$cargocad', '$data_cad','')");

      if ($sqlInsert){
        echo "<script language='javascript'type='text/javascript'> 
        alert('Cadastro efetuado com sucesso!');window.location.href='controle-usuario.php';</script>";

      }else{
        echo "<script language='javascript'type='text/javascript'> 
        alert('Não foi possível cadastrar');window.location.href='cadastrar-user.php'; </script>";
      }

    }else{
      echo "<script language='javascript'type='text/javascript'> 
      alert('Não foi possível cadastrar');window.location.href='cadastrar-user.php'; </script>";
    }
    
?>