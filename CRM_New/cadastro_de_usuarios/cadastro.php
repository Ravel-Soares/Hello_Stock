<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Cliente | Hello Stock</title>
  <link rel="icon" type="image/x-icon" href="https://previews.123rf.com/images/bearsky23/bearsky231607/bearsky23160700048/60624440-woman-in-suit-holding-new-hire-sign.jpg">

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- CSS do cabeçalho -->
<link rel="stylesheet" href="../cabecalho.css">

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

include '..\..\config.php';
include '..\..\cabecalhologin.html';

?>


<div class="container-fluid">
      <form action="valid_cadastro.php" method="post" class="row col-sm-4 col-sm-offset-4 ">

        <div >
          <div class="title">
            <h1 style="color: #eea236;" >Cadastrar</h1>
          </div>
        </div>

        <div class="form-group">
          <label>Nome</label>
          <input type="text" required class="form-control" name="nome"  placeholder="Digite seu nome" required>
        </div>

        <div class="form-group">
          <label>E-mail</label>
          <input type="e-mail" class="form-control" name="email" id="e-nmail" required placeholder="Digite sua senha">
        </div>

        <div class="form-group">
          <label>CPF:</label>
          <input type="tel" class="form-control" name="doc" id="cpf/cnpj" SIZE=11 MAXLENGTH=11 required placeholder="XXX.XXX.XXX-XX">
        </div>

        <div class="form-group">
          <label>Razão social: </label>
          <input type="text" class="form-control" name="rsocial" id="razao-social" required placeholder="Razão social">
        </div>

        <div class="form-group">
          <label>Contato:</label>
          <input type="tel" class="form-control" name="contato" id="contato" SIZE=11 MAXLENGTH=11 required placeholder="Digite sua senha">
        </div>

        <div class="form-group">
          <label>Cep:</label>
          <input type="tel" class="form-control" name="cep" id="cep" SIZE=10 MAXLENGTH=10 required placeholder="Digite seu cep">
        </div>

        <div class="form-group">
          <label>Endereco:</label>
          <input type="text" class="form-control" name="endereco" id="endereco" required placeholder="Digite seu endereço">
        </div>

        <div class="form-group">
          <label>Numero:</label>
          <input type="tel" class="form-control" name="endnumero" id="endnumero" SIZE=6 MAXLENGTH=6 required placeholder="Numero da Casa">
        </div>

        <div class="form-group">
          <label>Bairro:</label>
          <input type="text" class="form-control" name="bairro" id="bairro" required placeholder="Seu bairro">
        </div>

        <div class="form-group">
          <label>Cidade:</label>
          <input type="text" class="form-control" name="cidade" id="cidade" required placeholder="Sua cidade">
        </div>

        <div class="form-group">
          <label>Estado:</label>
          <input type="text" required class="form-control" name="estado" id="estado"  placeholder="Seu Estado" required>
        </div>

        <div class="form-group ">
          <button name="cadastrar" class="form-control" type="submit" value="cadastrar">Cadastrar</button>
        </div>

      </form> <!--fim form-->

    </div> <!--fim class do form-->
</body>
</html>