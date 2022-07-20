<?php
  if(!isset($_POST['cadastrar'])){
    echo 'Não funcionou';
  }
  if(isset($_POST['cadastrar'])) 
  {
    
  //Conexão com o Banco de Dados 
  include_once('../../config.php'); 

  //Variaveis de cadastro
  $nome = $_POST['nome'];
  $senhainc = $_POST['nome'];
  $email = $_POST['email'];
  $doc = $_POST['doc'];
  $rsocial = $_POST['rsocial'];
    $rsocial = strtolower($rsocial); // deixar em minusculo
  $contato = $_POST['contato'];
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

  //Criação do login automatico

  $login1 = substr($nome, 0, 1);
  $login2 = substr($nome, 2, 1);
  $login3 = substr($nome, 7, 7);
  $login4 = substr($doc, 1, 2);
  $login5 = substr($doc, 3, 3);
  
  // Concatenação dos logins

  $login7 = $login1 . $login2 . $login3 . $login4 . $login5;

  // Remoção do espaçamento no login

  $login8 = str_replace(" ", "", $login7);

  // Deixar tudo minusculo

  $login = strtolower($login8);

  //Selecionar o Banco de Dados

  $select = mysqli_query($connection,"SELECT * FROM usuario");
  $array = mysqli_fetch_array($select);

  //If Else para nome vazio

    if($nome == "" || $nome == null){
      echo"<script language='javascript' type='text/javascript'>
      alert('O campo nome deve ser preenchido');
      window.location.href='../login.php.php';</script>";

      }
      else
      {

        //Geração de senha

        function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
          $senha = "0"; // inicia a váriavel
          $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
          $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
          $nu = "0123456789"; // $nu contem os números
          $si = "!@#$%¨&*()_+="; // $si contem os símbolos

          if ($maiusculas){
                  // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
                  $senha .= str_shuffle($ma);
          }

              if ($minusculas){
                  // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
                  $senha .= str_shuffle($mi);
              }

              if ($numeros){
                  // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
                  $senha .= str_shuffle($nu);
              }

              if ($simbolos){
                  // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
                  $senha .= str_shuffle($si);
              }

              // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
              return substr(str_shuffle($senha),0,$tamanho);
          }

          $senhainc = gerar_senha(10, true, true, true, true); // criar a senha sem criptografia MD5
          $senhafull = MD5($senhainc); // passando para o MD5

          //Enviar informações ao Banco de dados

          $query = mysqli_query($connection,"INSERT INTO usuario (login ,nome, cpfcnpj, social, cep, endereco, bairro, contato, email, endumero, cidade, estado, senha) VALUES ('$login','$nome','$doc','$rsocial','$cep','$endereco','$bairro','$contato','$email','$endnumero','$cidade','$estado','$senhainc')");

          // entre na tela estoque.php
          header('location: ../../login.php');
        }

      } 
?>