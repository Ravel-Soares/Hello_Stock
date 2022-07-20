<?php

    session_start();

    unset($_SESSION['carrinho'] [$_GET['cd']]);

    header('location: carrinho.php')
   
?>