<?php
    session_start();
    session_unset();
    session_destroy();

        echo "<script language='javascript'type='text/javascript'> 
        alert('Obrigado pela visita!');window.location.href='../index.html';</script>";
?>