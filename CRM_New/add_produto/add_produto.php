<?php

  //Conexão com o Banco de Dados 
  include_once('../../config.php');

$pro_cod = $_POST['pro_cod'];
$pro_nome = $_POST['pro_nome'];
$pro_descricao = $_POST['pro_descricao'];
$pro_sup = $_POST['pro_sup'];
$pro_valorpago = $_POST['pro_valorpago'];
$pro_valorvenda = $_POST['pro_valorvenda'];
$pro_quantidade = $_POST['pro_quantidade'];
$imagens = $_POST['imagens'];
$pro_promocoes = $_POST['pro_promocoes'];
$pro_valordesconto = $_POST['pro_valordesconto'];
$localidade = $_POST['localidade'];

$sql = "INSERT INTO produto (pro_cod, pro_nome, pro_sup, pro_descricao, pro_valorpago, pro_valorvenda, pro_quantidade, imagens, pro_promocoes, pro_valordesconto, localidade) VALUES ('$pro_cod','$pro_nome','$pro_sup','$pro_descricao','$pro_valorpago','$pro_valorvenda','$pro_quantidade', '$imagens', '$pro_promocoes', '$pro_valordesconto', '$localidade')";

$sql1 = "INSERT INTO itensentrada (pro_cod, pro_quantidade, data_entrada, pro_valorpago) VALUES ('$pro_cod','$pro_quantidade', NOW(),'$pro_valorpago')";

if (mysqli_query($connection, $sql) and mysqli_query($connection, $sql1)) {
      echo "Salvo com sucesso";
      header('Location: ../index.php');
} else {
      echo "Erro ao salvar o produto";
}


?>