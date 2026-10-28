<?php
include('conexao.php');
session_start();
logsessao();

$logado = $_SESSION['email_cad'];
$cargo = $_SESSION['cargo'];

?>
<?php
if (!empty($_GET['id'])) {
  include_once('conexao.php');
  $id_cad = $_GET['id'];
  $sqlSelect = "SELECT * FROM cadastros WHERE id_cad= $id_cad";
  $result = $conexao->query($sqlSelect);

  $sqlSelect1 = "SELECT * FROM `login` WHERE id_login= $id_cad";
  $result1 = $conexao->query($sqlSelect1);
  // print_r($result);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $nomecad =  $user_data['nome_cad'];
      $emailcad = $user_data['email_cad'];
      $senhacad = $user_data['senha_cad'];
      $telefonecad = $user_data['telefone_cad'];
      $cargocad = $user_data['cargo_cad'];
    }
    // print_r($nome);
  } else {
    header('location: controle-usuario.php');
  }
} else {
  header('location: controle-usuario.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <title> Editar usuario | Hayai</title>
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
        <h1>CADASTRO DE FUNCIONÁRIOS</h1>

        <form action="edit-save-usuario.php" method="POST">
          <label for="">Nome</label><br>
          <input type="text" name="nomecad" value="<?php echo $nomecad ?>" placeholder="Digite o nome"><br>

          <input type="hidden" name="emailcad" placeholder="Digite o email" value="<?php echo $emailcad ?>">

          <label for="">Senha</label><br>
          <input type="password" name="senhacad" placeholder="Digite a senha" value="<?php echo $senhacad ?>"><br>
          <label for="">Telefone</label><br>
          <input type="text" name="telefonecad" id="tel" placeholder="Digite o telefone" value="<?php echo $telefonecad ?>">

          <label for="">Cargo</label><br>
          <select id="option" name="cargocad">
            <option value="adm" <?= ($cargocad == 'adm') ? 'selected' : '' ?>>Administrador</option>
            <option value="func" <?= ($cargocad == 'func') ? 'selected' : '' ?>>Funcionário</option>
          </select><br>

          <input type="hidden" name="id_cad" value="<?php echo $id_cad ?>">
          <div class="button">
            <button type="submit" name="update">
              <p id="textCenter">Atualizar</p>
            </button>
            <button type="reset">
              <p id="textCenter">Limpar</p>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $("#tel").mask("(00) 00000-0000");
  </script>
</body>

</html>