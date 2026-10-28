<?php
session_start();
include_once('conexao.php');

logsessao();

  $logado = $_SESSION['email_cad'];
  $cargo=$_SESSION['cargo'];
  

if(!empty($_GET['search'])){

  $data = $_GET['search'];
  $sql = "SELECT * FROM produtos WHERE id_prod LIKE '%$data%' or nome_prod LIKE '%$data%' or grupo_prod LIKE '%$data%' ORDER BY id_prod DESC";
} 
else{
  // echo"Não temos nada, trazer todos os registros";
  $sql = "SELECT * FROM produtos ORDER BY id_prod DESC";
}

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Cadastro de estoque | Hayai</title>
</head>
<script>
</script>

<body >
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.html"><img src="../images/1.png" class="logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="painelgeral.php">Painel de controle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sobrenos.phpl">Suporte</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="logout.php">Sair</a>
          </li>
      </div>
    </div>
  </nav>


  <div class="container-fluid">
    <div class="container">
      <div class="m-5">
        <h1>CADASTRO DE PRODUTOS</h1>
        <div class="box-search m-4">
          <input type="search" class="form-control w-50" placeholder="Pesquisar" id="pesquisar">
          <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
            <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
            </svg>
          </button>
        </div>
      <div class="barra">
      <div id="borda">
        <table class="tablee">
            <div class="adicionar">
              <a href="cadastrar-prod.php"><button class="btn text-white btn-orange">Adicionar+</button></a>
            </div>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Grupo</th>
              <th scope="col">Quantidade</th>
              <!-- <th scope="col">Unidade</th> -->
              <!-- <th scope="col">Valor</th> -->
              <!-- <th scope="col">Estoque</th> -->
              <th scope="col">Data cadastro</th>
              <th scope="col">Estoque mínimo</th>
              
              <th scope="col">...</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($user_data = mysqli_fetch_assoc($result)) {

              $data=date('d/m/Y', strtotime($user_data['data_prod']));

              echo "<tr>";
              echo "<td>" . $user_data['id_prod'] . "</td>";
              echo "<td>" . $user_data['nome_prod'] . "</td>";
              echo "<td>" . $user_data['grupo_prod'] . "</td>";
              echo "<td>" . $user_data['quant_prod'] . "</td>";
              // echo "<td>" . $user_data['uni_prod'] . "</td>";
              // echo "<td>" . $user_data['valor_prod'] . "</td>";
              // echo "<td>" . $user_data['estoque_prod'] . "</td>";
              echo "<td>" . $data . "</td>";
              echo "<td>" . $user_data['estoque_min'] . "</td>";
              
              echo "<td>
                <a class='btn btn-sm btn-primary' href='edit-produto.php?id=$user_data[id_prod]'>
                   <button class='btn btn-sm btn-primary'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                      <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                      </svg>
                   </button>
                </a>
                <a class='btn btn-sm btn-danger' href='confirm1.php?id=$user_data[id_prod]'>
                  <button class='btn btn-sm btn-danger' >
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg>
                  </button>
                </a>

              </td>";                
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>     
     
        

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <footer class="footer" >
        <div id="interface1">
          <div class="footerContainer" >
            <div class="arrumar1">
              <div class="socialIcons">
                <a href="https://www.instagram.com/takakis_company/"><i class='bx bxl-instagram'></i></a>
                <a href=""><i class='bx bx-envelope' ></i></a>
                <a href="#"><i class='bx bx-phone' ></i></a>
              </div>
            </div>
          </div>
            <div class="footerBottom">
              <p class="pfooter"> Designed by <span> Takaki´s Company</span> 2023.</p>
            </div>
        </div>
      </footer> 
</body>
<script>
  var search = document.getElementById('pesquisar');

  search.addEventListener("keydown", function(event){
    if(event.key === "Enter"){
      searchData();
    }
  });

  function searchData(){
    window.location = 'controle-estoque.php?search='+search.value;
  }
</script>
</html>