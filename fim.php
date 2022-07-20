<!DOCTYPE html>

    <html lang="pt-br">

        <Head>

            <meta charset="utf-8">
            <title> Hello Stock </title>
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
          
            
            include 'config.php';
            include 'nav.php';
            include 'cabecalho.html';

            // variavel consulta vai receber a variavel conexao e variavel conexao vai receber uma query ou seja uma pesquisa no bd
            $consulta = $connection->query("SELECT pro_cod,imagens,pro_nome,pro_valorvenda,pro_quantidade,pro_promocoes FROM produto ");
          
          ?>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-center">
                    <h2>Compra efetuada com sucesso!!</h2>
                </div>
            </div>

            <meta http-equiv="refresh" content="4; URL='index.php'"/>

            <?php

              include 'rodape.html';

            ?>
       

</body>
        
</html>