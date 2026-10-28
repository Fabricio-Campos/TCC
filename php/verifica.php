<?php
session_start();
    
    if(isset($_POST['logar']) && !empty($_POST['email_cad']) && !empty($_POST['senha_cad']))
    {
		include_once('conexao.php');
        $emailcad=$_POST['email_cad'];
        $senhacad=$_POST['senha_cad'];

		$sql ="SELECT * FROM cadastros WHERE email_cad = '$emailcad' and senha_cad = '$senhacad'";
       
        $result=$conexao->query($sql);
        $result2=mysqli_fetch_array($result);
                
        // print_r($result);
         if(!mysqli_num_rows($result)==1)
         {
            $_SESSION['log'] = "desativado";
            unset($_SESSION['email_cad']);
            unset($_SESSION['senha_cad']);

            echo "<script language='javascript' type='text/javascript'> 
            alert('Email ou senha inválido!');window.location.href='../login.html'</script>"; 
        }else{
            $_SESSION['log'] = "ativo";
            $_SESSION['cargo']=$result2['cargo_cad'];
            $_SESSION['nome']=$result2['nome_cad'];
            $_SESSION['tel']=$result2['telefone_cad'];
            $_SESSION['id']=$result2['id_cad'];
            // echo $_SESSION['cargo'];
            // echo $_SESSION['nome'];
            // echo $_SESSION['tel'];
            $nome=$_SESSION['nome'];

            $_SESSION['email_cad']=$emailcad;
            $_SESSION['senha_cad']=$senhacad;
            $sql = "SELECT * FROM cadastros WHERE email_cad= '$emailcad'";
            $result = $conexao->query($sql);

            echo "<script language='javascript' type='text/javascript'> 
            alert('Bem-vindo, $nome!');</script>"; 

            // $sql = "SELECT * FROM produtos ORDER BY id_prod DESC";
            // $result3 = $conexao->query($sql);

            // while ($user_data = mysqli_fetch_assoc($result3)) {
            //     $pquantidade = $user_data['quant_prod'];
            //     $p_min = $user_data['estoque_min'];
            //     $nome_prod = $user_data['nome_prod'];
            //     $p_minaviso = $p_min + 1;
                
            //     if ($p_min >= $pquantidade) {   
            //         echo "<script language='javascript' type='text/javascript'> 
            //         alert('ALERTA, $nome_prod em falta!');</script>"; 
            //     }else if ($p_minaviso == $pquantidade) {
            //         echo "<script language='javascript' type='text/javascript'> 
            //         alert('AVISO, $nome_prod chegando no limite!');</script>";
            //     } else {
            //         echo "";
            //     }
            // }
            echo"<script language='javascript' type='text/javascript'>window.location.href='painelgeral.php'</script>"; 
        }
    }else{
            echo "<script language='javascript' type='text/javascript'> 
            alert('Email ou senha inválido!');window.location.href='../login.html'</script>"; 
    }

    
?>