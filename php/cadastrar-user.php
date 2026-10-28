<?php
include('conexao.php');
session_start();
logsessao();

$logado = $_SESSION['email_cad'];
$cargo = $_SESSION['cargo'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Cadastro de usuário | Hayai</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <!-- mascara -->
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
        <h1>CADASTRO DE USUÁRIO</h1>

        <form action="cadastrar-usuario.php" method="POST">
          <label for="">Nome</label><br>
          <input type="text" name="nomecad" placeholder="Digite o nome"><br>

          <label for="">Email</label><br>
          <input type="text" name="emailcad" placeholder="Digite o e-mail"><br>

          <label for="">Senha</label><br>
          <input type="password" name="senhacad" placeholder="Digite a senha"><br>


          <label for="">Telefone</label><br>
          <input type="text" name="telefonecad" id="tel" placeholder="Digite o telefone"><br>

          <label for="">Cargo</label><br>
          <select id="option" name="cargocad">
            <option value="adm">Administrador</option>
            <option value="func">Funcionário</option>
          </select><br>

          <div class="button">
            <button type="submit" name="submitcad">
              <p id="textCenter">Cadastrar</p>
            </button> 
            <button type="reset">
              <p id="textCenter">Limpar</p>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $("#tel").mask("(00) 00000-0000");
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</body>

</html>