<?php
include('conexao.php');
session_start();
logsessao();

$id = $_SESSION['id'];
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
  <link rel="stylesheet" href="../css/style2.css">
  <link rel="shortcut icon" href="images/1.png" type="image/x-icon">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Gerenciamento | Hayai</title>
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
            <a class="nav-link active" href="painelgeral.php">Painel de controle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sobrenos.php">Suporte</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="logout.php">Sair</a>
          </li>

      </div>
  </nav>

    <!-- notificacao -->
    <script defer src="../js/script.js"></script>
    <div class="canto">
      <div class='notific'>
        <?php
          $sql = "SELECT * FROM produtos ORDER BY id_prod DESC";
          $result3 = $conexao->query($sql);
         
          while ($user_data = mysqli_fetch_assoc($result3)) {
            $pquantidade = $user_data['quant_prod'];
            $p_min = $user_data['estoque_min'];
            $nome_prod = $user_data['nome_prod'];
            $p_minaviso = $p_min + 1;
            
            if ($p_minaviso == $pquantidade) {
              echo "
                  <div class='atencao'>
                    <div class='text'>
                      <img src='../images/alert.png' width='40px' heigh='40px'>
                      <p><b>Aviso!</b> &nbsp;$nome_prod em falta.</p>   
                    </div>    
                    <div class='a'></div>          
                  </div>  

                  
                ";
            }else if ($p_min >= $pquantidade) {   
              echo "    
                  <div class='aviso'>
                  <div class='text'>
                   <img src='../images/atencao.png' width='40px' heigh='40px'>
                    <p><b>Atenção!</b>&nbsp; $nome_prod em falta.</p>
                    </div>
                    <div class='a'></div>       
                  </div>  
              "; 
            } else {
              echo "";
            }
          }
        ?>
         <!-- <div class="ok">
            <div class="line1"></div>
            <div class="line2"></div>
         </div> -->
      </div> 
      </div> 
    <!-- fim notificacao -->

    <div class="container-fluid">
    <div class="container">

      <div class="col4">
        <a href="perfil.php"><button>
            <h3>Perfil</h3>
          </button></a>
      </div>

      <h1>O que deseja gerenciar?</h1>


      <div id="alink">
        <a href="controle-estoque.php">
          <div class="col">
            <button id="buttons">
              <div class="col2">
                <h3>Controle de estoque</h3>
                <p>VEJA seus produtos!</p>
              </div>
            </button>
          </div>
        </a>

        <?php
        if ($_SESSION['cargo'] == "adm") {
          echo
          "
          <a href='cadastro-estoque.php'>
          <div class='col'>
              <button id='buttons'>
                    <div class='col1'>
                      <h3>Cadastro de produto</h3>
                      <p>Cadastre seu produto AQUI!</p>
                    </div> 
              </button>           
          </div>   
          </a>

              
          <a href='controle-usuario.php'>
              <div  class='col'>
               <button id='buttons'>   
                  <div class='col3'>
                    <h3>Controle de usuário</h3>
                    <p>Controle o ACESSO!</p>
                  </div> 
                </button>
              </div> 
            </a>
              ";
        }
        ?>


      </div>
    </div>
  </div>
<br>
  <div id="interface1">
    <footer class="footer">
      <div id="container">
        <div id="row">

          <div class="footer-col">
            <h4>Takaki's Company</h4>
            <ul>
              <li><a href="#"><img src="../images/logotakakis.png" width="50%"></a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Obter ajuda</h4>
            <ul>
              <li><a href="sobrenos.php">Sobre nós</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Acessar</h4>
            <ul>
              <li><a href="../login.html">Login</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h4>Siga-nos</h4>

            <div class="social-links">
              <li><a href="https://www.instagram.com/takakis_company/"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class='bx bxs-phone'></i></a></li>
            </div>
          </div>

        </div>
      </div>
    </footer>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="../js/person.js"> </script>
</body>

</html>