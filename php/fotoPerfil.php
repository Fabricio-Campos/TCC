<?php
include('conexao.php');
session_start();
logsessao();

if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {

    $id = $_SESSION['id'];

    $stmt = mysqli_prepare($conexao, "SELECT arq_cad FROM cadastros WHERE id_cad = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $array = mysqli_fetch_assoc($result);
    $img = $array['arq_cad'] ?? '';

    if (!empty($img) && file_exists('../imgperfil/' . $img)) {
        unlink('../imgperfil/' . $img);
    }

    $parquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $pnome = $_FILES['arquivo']['name'];
    $pextensao = strtolower(pathinfo($pnome, PATHINFO_EXTENSION));

    
    $extensoes_permitidas = ['png', 'jpg', 'jpeg', 'gif'];

    if (in_array($pextensao, $extensoes_permitidas)) {
        
        $novonome = uniqid(time()) . "." . $pextensao;
        $diretorio = "../imgperfil/" . $novonome; // Espaço em branco removido

        if (move_uploaded_file($parquivo_tmp, $diretorio)) {
            // Prepared Statement para atualizar o registro
            $stmt_update = mysqli_prepare($conexao, "UPDATE cadastros SET arq_cad = ? WHERE id_cad = ?");
            mysqli_stmt_bind_param($stmt_update, "si", $novonome, $id);
            mysqli_stmt_execute($stmt_update);

            echo "<script language='javascript'>alert('Foto cadastrada com sucesso!!!');window.location.href='perfil.php';</script>";
            exit;
        } else {
            echo "<script language='javascript'>alert('Erro ao salvar o arquivo no servidor.');window.location.href='perfil.php';</script>";
            exit;
        }

    } else {
        echo "<script language='javascript'>alert('Tipo de arquivo inválido');window.location.href='perfil.php';</script>";
        exit;
    }
}
?>