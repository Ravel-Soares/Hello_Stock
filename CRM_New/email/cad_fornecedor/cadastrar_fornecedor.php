<?php

if(isset($_POST['cadastrar']))
    
  //Conexão com o Banco de Dados 
  include ('../config.php'); 

  //Variaveis de cadastro
  $nome = $_POST['nome'];
    $nome = strtolower($nome); // deixar em minusculo
  $email = $_POST['email'];
  $cnpj = $_POST['cnpj'];
  $empresa = $_POST['empresa'];
    $empresa = strtolower($empresa); // deixar em minusculo
  $contato = $_POST['contato'];
  $ramal = $_POST['ramal'];
  $cep = $_POST['cep'];
  $endereco = $_POST['endereco'];
    $endereco = strtolower($endereco); // deixar em minusculo
  $endnumero= $_POST['endnumero'];
  $bairro = $_POST['bairro'];
   $bairro = strtolower($bairro); // deixar em minusculo
  $cidade = $_POST['cidade'];
    $cidade = strtolower($cidade); // deixar em minusculo
  $estado = $_POST['estado'];
    $estado = strtolower($estado); // deixar em minusculo

    //Enviar informações ao Banco de dados

    $query = mysqli_query($connection,"INSERT INTO fornecedor (for_nome, for_cnpj, for_empresa, for_cep, for_endereco, for_bairro, for_contato, for_ramal, for_email, for_endnumero, for_cidade, for_estado) VALUES ('$nome','$cnpj','$empresa','$cep','$endereco','$bairro','$contato', '$ramal', '$email','$endnumero','$cidade','$estado')");

    // entre na tela de enviar e-mail
    
    header('Location: index.html');

?>