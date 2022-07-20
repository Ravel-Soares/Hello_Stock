<?php
session_start();
include 'config.php';
?>

<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

$consulta = $connection->query("SELECT cod,login,senha,status_usu FROM usuario WHERE login = '$login' and senha = '$senha'");



if ($rowcount=mysqli_num_rows($consulta) == 1) { // se houver pelo menos um dado no banco de dados igual aos recebidos acima, então o usuario existe né pae
  $exibe_usuario = mysqli_fetch_assoc($consulta); // transformando os dados da consulta em um array

  if ($exibe_usuario['status_usu']) {
    $_SESSION['cod'] = $exibe_usuario['cod'];
    $_SESSION['status_usu'] =0;
    header('location: index.php');
  }
  else {
    $_SESSION['cod'] = $exibe_usuario['cod'];
    $_SESSION['status_usu'] =1;
    header('location: index.php');
  }


}else {
  header('location: erro.php');
}

/*
  if ($usuario == "cliente"){

    $consulta = $connection->query("SELECT cod,login,senha,status_usu FROM usuario WHERE login = '$nome' and senha = '$senha'");

    $rowCount = $consulta->num_rows;

    if ($rowCount == 1 ) 
    {
        $exibe_usuario = mysqli_fetch_assoc($consulta);

      if ($exibe_usuario['status_usu'] == 0)
      {
        $_SESSION['ID'] = $exibe_usuario['cod'];
        $_SESSION['status_usu'] = 0;
        header('location: index.php');
      } else {
        $_SESSION['ID'] = $exibe_usuario['cod'];
        $_SESSION['status_usu'] = 1 ;
        header('location: index.php');
      }
    }
    else {
      header('location: erro.php');
    } 
  
      }else {

        $consulta = $connection->query("SELECT id, login, nome, senha FROM funcionario WHERE login = '$nome' and senha = '$senha'");

        $rowCount = $consulta->num_rows;

        if ($rowCount == 1) 
        {
          $exibe_usuario = mysqli_fetch_all($consulta,MYSQLI_ASSOC);

        if ($exibe_usuario['status'] == 0)
        {
          $_SESSION['ID'] = $exibe_usuario['id'];
          $_SESSION['status'] = 0;
          $_SESSION['usuario'] = "cliente";
          header('location: index.php');
        } else {
          $_SESSION['ID'] = $exibe_usuario['id'];
          $_SESSION['status'] = 1 ;
          $_SESSION['usuario'] = "colaborador";
          header('location: index.php');
        }
        }
        else {
          header('location: erro.php');
        }
  }
  */
  ?>


