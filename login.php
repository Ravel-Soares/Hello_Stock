<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login | Hello Stock</title>
  <link rel="icon" type="image/x-icon" href="imagens/Logo Hello Stock - Semfundo.png">


         <link rel="stylesheet" href="css/estilo.css">
         <!-- CSS -->
         
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

         <!-- JQuery -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

         <!-- JS -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

         <style>
           .form-control:focus{
             border-color: #eea236; /* colocando cor laranja quando clicko no input do login */
           }
         </style>
  
</head>

<body>
  <?php
  
include 'config.php';
include 'cabecalhologin.html';

  ?>


    <div class="container-fluid">
      <form action="valid-login.php" method="post" class="row col-sm-4 col-sm-offset-4 ">

        <div >
          <div class="title">
            <h1 style="color: #eea236;" >Login</h1>
          </div>
        </div>

        <div class="form-group">
          <label>Login</label>
          <input type="text" required class="form-control" name="login"  placeholder="Digite seu nome" required>
        </div>

        <div class="form-group">
          <label>Senha</label>
          <input type="password" class="form-control" name="senha" id="senha" required placeholder="Digite sua senha">
        </div>

        <div class="form-group ">
          <button name="entrar" class="form-control" type="submit" value="Login">Entrar</button>
        </div>
        <div>
          <a href="./cadastro_cliente/cadastro.php">Ainda não tem um cadastro?</a>
        </div>
        <div>
          <a href="index.php">Voltar a tela Inicial</a>
        </div>
      </form> <!--fim form-->

    </div><br> <!--fim class do form-->

    <?php 
    include 'rodape.html';
    ?>

</body>

</html>