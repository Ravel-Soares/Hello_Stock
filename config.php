<?php
//Variaveis para conexão com o Banco de dados
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hello_stock';

//$connection recebe a conexão com o Banco de dados
$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

?>
