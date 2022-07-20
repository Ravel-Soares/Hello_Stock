<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>

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

include 'nav.php';
include 'cabecalhologin.html';
include 'config.php';

  ?>


    <div class="container-fluid">
      <form action="login.php" method="post" class="row col-sm-4 col-sm-offset-4 ">

        <div >
          <div class="title">
            <h1 style="color: #eea236;" class="text-center" >LOGIN INCORRETO</h1>
          </div>
        </div>

      
        <div class="form-group ">
          <button name="entrar" class="form-control" type="submit" value="Login">TENTAR NOVAMENTE</button>
        </div>

      </form> <!--fim form-->

    </div> <!--fim class do form-->

    <?php 
    include 'rodape.html';
    ?>

</body>

</html>