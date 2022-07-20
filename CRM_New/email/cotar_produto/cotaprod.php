<form method="post">
    Quantidade <input type="text" name="quantidade" /><br />
    <input type="submit" name="submit" value="Pesquisar" />
</form>

<?php

$quantidade = $_POST['quantidade'];
//Conexão com o Banco de Dados 
    include_once('../config.php'); 

$sql = mysqli_query($connection,"SELECT pro_nome, pro_valorpago, pro_quantidade FROM produto WHERE (pro_quantidade < $quantidade)");

while ($reg = mysqli_fetch_array($sql)){

    echo (" <b> Produto: </b> $reg[pro_nome] <b> Valor Pago: </b> $reg[pro_valorpago] <b> Quantidade: </b> $reg[pro_quantidade] <p>");

}

?>