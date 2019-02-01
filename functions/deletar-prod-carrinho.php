<?php 
    session_start();
    unset($_SESSION['carrinho'] [$_GET['id']]);
    header("Location: ../meu-carrinho.php");
?>