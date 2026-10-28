<?php
include('conexao.php');
session_start();
logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  
?>

<?php

$id_cad = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Confirmação para deletar | Hayai</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../css/style1.css'>
</head>
<body>

    <nav class='navbar navbar-expand-lg bg-dark navbar-dark'>
        <div class='container'>
        <a class='navbar-brand' href='../index.html'><img src='../images/1.png' class='logo' alt=''></a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
            <li class='nav-item'>
                <a class='nav-link' aria-current='page' href='../index.html'>Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='../login.html'>Login</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link active' href='painelgeral.php'>Painel de controle</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='sobrenos.php'>Suporte</a>
            </li>
            <li class='nav-item'>
            <a class='btn btn-danger' href='logout.php'>Sair</a>
            </li>
        </div>
        </div>
    </nav>




<div class='container-fluid text-center'>  
    <div class='container'>
      <div id='interface'>
        <h1>Tem certeza que deseja excluir esse usuário?</h1>

        <div class='face'>
            <a href='delete-usuario.php?id=$id_cad'>
                <div class='button1'>
                    Sim
                </div>
            </a>
            
            <a href='controle-usuario.php'>
                <div class='button1' >
                    Não 
                </div>
            </a>
        </div>
      </div>
    </div>
</div> 

    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js'
        integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r'
        crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js'
        integrity='sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+'
        crossorigin='anonymous'></script>
</body>
</html>

";

?>