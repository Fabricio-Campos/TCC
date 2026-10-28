<?php
include_once('conexao.php');
session_start();

$sql = "select * from cadastros where id_cad=''";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="../css/style1.css">
  <title>Perfil | Hayai</title>
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
      <div class="m-5">
        <h1>Perfil usuário</h1>

        <div class="col3">
          <?php
          $id = $_SESSION['id'];
          $sql = "select * from cadastros where id_cad='$id'";

          $query = mysqli_query($conexao, $sql);
          $array = mysqli_fetch_array($query);
          $arquivo = $array['arq_cad'];
          if (!empty($arquivo)  || $arquivo !== "") {
            echo "<img src='../imgperfil/$arquivo' class='foto-perfil' width='75%' height='75%'>";
          } else {
            echo "<img src='../images/icon.png' width='75%' height='75%'>";
          }

          ?>
          </br></br>
          <form enctype='multipart/form-data' method="POST" action="fotoPerfil.php">
            <div class="perfil1">
              <input type="file" name="arquivo" value="Coloque aqui..">
            </div>

            <button type="submit" class="button">Enviar</button></br></br>

          </form>
        </div>


        <div class="col2">
          <div class="col -md -8 mt-1">
            <div class="mb-content">
              <div class="perfil">
                <h3>Nome:</h3>
                <p>><?php echo $_SESSION['nome']; ?></p>
                <h3>Email:</h3>
                <p>><?php echo $_SESSION['email_cad']; ?></p>
                <h3>Telefone:</h3>
                <p>><?php echo $_SESSION['tel']; ?></p>
                <h3>Cargo:</h3>
                <?php
                if ($_SESSION['cargo'] == "adm") {
                  echo "<p>>Administrador</p>";
                } else {
                  echo "<p>>Funcionário</p>";
                }

                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>