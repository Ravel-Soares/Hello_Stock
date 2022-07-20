<?php
session_start();

if (!isset($_SESSION['status_usu'])) {
  header('location: login.php');
}

include 'config.php';

$data = date('Y-m-d');
$ticket = uniqid(); // gerando um ticket com função uniqid();
$cd_user = $_SESSION['cod']; //recebendo o codigo do usuario logado

// criando um loop para sessão carrinho q recebe o $cd e a quantidade 

foreach ($_SESSION['carrinho'] as $cd => $qnt) {
  $consulta = $connection->query("SELECT pro_valorvenda FROM produto WHERE pro_cod = $cd");
  $exibe = mysqli_fetch_assoc($consulta);
  $preco = $exibe['pro_valorvenda'];

  $inserir = $connection->query("INSERT INTO itenssaida (colaborador , pro_cod , pro_quantidade , data_saida, valor_unitario)
                                VALUES('$cd_user','$cd','$qnt','$data','$preco');");
}

include 'fim.php';

?>