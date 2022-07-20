<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/css_prod.css">
    <title>Detalhes | Hello Stock</title>
    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/fotos-gratis/3d-rendem-de-morph-homem-que-procurara-com-lupa_1048-2931.jpg">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

<!-- JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

<style>
h1 {
  text-align: center;
}

.comentario_produto{
    border-radius: 64px;

    background: #d1d1d1;
    box-shadow: inset 5px 5px 10px #c9c9c9,
                inset -5px -5px 10px #d9d9d9;
    margin-left: 15%;
    margin-right: 15%;
}
.botao-estilo{width: 400px;}

</style>

</head>
<body>
<?php 

    include "nav.php" ;
    include "config.php";


$det = $_GET['det'];
$consultaproduto = $connection->query("SELECT pro_cod,imagens,pro_nome,pro_valorvenda,pro_quantidade,pro_promocoes,pro_descricao FROM produto WHERE pro_cod = '$det'");

?>
    <?php while ($exibe_prod = mysqli_fetch_assoc($consultaproduto)) {  ?> 
    <main class="conteudo">
    <div class="imagem-produto">
    <div class="container"> 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
       <h1> <img src="
               <?php echo $exibe_prod['imagens']?>
                ",
                alt="Aqui era pra ter uma imagem de tinta",
                height="300px"
                width="300px
                "
                >
        </div>
  
        <div class="item">
        <h1> <img src="imagens/imagem_detalhes.png",
                alt="Aqui era pra ter uma imagem de tinta"
                >
        </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Proximo</span>
      </a>
    </div>
  </div>
        <br>
        <br>
                    <h1><?php echo $exibe_prod['pro_nome'] ?> </h1>
                    <br>
  <section class="comentario_produto">
        <br>
    <div class="detalhe-comentario">
    <h3>
       <?php echo $exibe_prod['pro_descricao'] ?>
    </h3>
    <br>
    </div>
    </section>
            </div>

            <div class="comprar-produto">
                <div class="Detalhes-produto" >
                
                </div>
                <br>
                <center><div class="botoes">
                    <a href="finalizarCompra.php"><input type="button" value="Comprar" class="botao-estilo"></a>
                    <br>
                    </br>
                    <a href="carrinho.php?cd=<?php echo $exibe_prod['pro_cod'] ?>">
                    <button class="botao-estilo"><span><b>Adicionar ao carrinho</b></span></button>
                    <br>
                </div></center>
            </div>
            
    </main><br>
    
        <?php } ?>
    </section>
        <br>
    <?php include "rodape.html" ?>
</body>
</html>