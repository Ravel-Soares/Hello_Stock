<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho | Hello Stock</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/126/126510.png">
<style>
      .navbar {margin-bottom: 0;}
</style>
<link rel="stylesheet" href="css/css_prod.css">

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

<!-- JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>


</style>
<link rel="stylesheet" href="css/css_prod.css">

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

<!-- JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

<style>
    .card2{
    width: 80%;
    height: 360px;
    margin-left: 10%;
    margin-right: 10%;
    border-radius: 15px;
    padding: 1.5rem;
    backdrop-filter: blur(7px);
    position: relative;
    transition: 0.3s ease-out;
    box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.5);
    }
</style>

</head>
<body>

<?php
 session_start();

 if (!isset($_SESSION['status_usu'])) {
     header('location: login.php');
 }

include "config.php"; //chamando a conexão
include "nav.php"; //chamando o menu
include "cabecalhologin.html"; // chamando cabeçalho

//verificando se o codigo do produto não está vazio
if (!empty($_GET['cd'])) {

// inserindo o codigo do produto na variavel $cd_prod
$cd_prod = $_GET['cd'];

if (!isset($_SESSION['carrinho'])) {
    // será criada uma sessão chamada carrinho para receber um vetor
    $_SESSION['carrinho'] = array();
}

// se a variavel $cd_prod não estiver setado(preencida)
if (!isset($_SESSION['carrinho'][$cd_prod])) {
    
    // será adcionado um produto ao carrinho
    $_SESSION['carrinho'][$cd_prod]=1;

}

// caso contrario, se ela estiver setada, adcione novos produtos
else {
    //$_SESSION['carrinho'][$cd_prod]+=1; !!!!!!!! Duplicando Item
} 
    // incluindo o arquivo 'mortraCarrinho.php'
    include 'mostraCarrinho.php';
} else {
    //mostrando o carrinho vazio
    include 'mostraCarrinho.php';
}

?>
<!-- exibindo o valor da variavel total da compra -->

<div class="row text-center" style="margin-top: 15px ;">
    <h1>Total: R$ <?php echo $total ?></h1>
</div>

<div class="row text-center" style="margin-top: 50px ;">

    <?php 

        if (!isset($cd)) {
            ?> <a href="index.php"><button class="btn btn-lg btn-primary">Adicionar Produto</button></a>
        <?php }else{ ?>
               <a href="index.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>
               <a href="finalizarCompra.php"><button class="btn btn-lg btn-success">Finalizar compra</button></a>
        <?php } ?>
     
     
</div>
</div>
</body>
</html>