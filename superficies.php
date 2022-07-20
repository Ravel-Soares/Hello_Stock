<!DOCTYPE html>

    <html lang="pt-br">

        <Head>

            <meta charset="utf-8">
            <title>superficies | Hello Stock</title>
            <link rel="icon" type="image/x-icon" href="imagens/Logo Hello Stock - Semfundo.png">
            <meta name="viewport" content="width=device-width,initial-scale=1">

            <style type="text/css"> 

            .navbar {margin-bottom: 0;}

            </style>
            <link rel="stylesheet" href="css/css_prod.css">

            <!-- CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <!-- JQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

            <!-- JS -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

        </Head>

        <body>

          <?php 
          
          session_start();
          include 'config.php';
          include 'nav.php';
          include 'cabecalho.html';

            $cat = $_GET['cat'];

            // variavel consulta vai receber a variavel conexao e variavel conexao vai receber uma query ou seja uma pesquisa no bd
            $consulta = $connection->query("SELECT pro_cod,imagens,pro_nome,pro_valorvenda,pro_quantidade,pro_valordesconto FROM produto WHERE pro_sup = '$cat'");
          
          ?>
 <!-- CARDS -->
<div class="container-fluid"> <!-- Container Responsivo -->
<!-- recebe o valor da consulta realiza uma busca no banco de dados-->    
<div class="row" style="display: flex; flex-wrap: wrap;">
<?php while ($exibe = mysqli_fetch_assoc($consulta)) {  ?> 
<div class="col-sm-3 container-fluid img-responsive" > <!-- 3 linhas de 4 colunas (Sistema GRID Bootstrap)-->

<div class="card"><img src=<?php echo $exibe['imagens'];?> style="width:100%"> <!-- Imagem Responsivel -->

</div>
<div><h3 class="text-center"> <?php echo mb_strimwidth($exibe['pro_nome'] , 0 , 20 , '...') ?> </h3> </div> <!-- exibindo o nome -->

<div><h4 class="text-center"> 
  
  <b style="color: #f0ad4e ;"><?php echo 'R$ ' .  number_format($exibe['pro_valorvenda'],2,',','.' )?></b>
  </h4></div><!-- exibindo o preço do produto -->


<div class="text-center">
    <?php if($exibe['pro_quantidade'] > 0) {  ?>

<a href="carrinho.php?cd=<?php echo $exibe['pro_cod']; ?>">
  <button class="botao-estilo"><span>Adicionar ao carrinho</span></button>
</a>

      <?php } else { ?>
      <button class="btn btn-lg btn-block btn-default" disabled>
      <span>Produto indisponível</span>
      </button>
      <?php } ?>
</div>

</div>
<?php } ?>

 <!-- CARDS// -->
</div> <!-- Fechamento da class ROW -->
</div> <!-- Fechamento do Container -->

            <?php

              include 'rodape.html';

            ?>
       

</body>
        
</html>