<?php

    $op = $_POST["op"];

    switch ($op) {
        case "novocliente":
            $op = "novocliente";
            echo "$op";
            break;
        case "aluguel":
            $op = "aluguel";
            echo "$op";
            break;
        case "contaatrasada":
            $op = "contaatrasada";
            echo "Conta Atrasada";
            break;
        case "prodsaiu":
            $op = "prodsaiu";
            echo "Produto Saiu";
            break;
        case "prodentregue":
            $op = "prodentregue";
            echo "Produto foi Entregue";
            break;
        case "cotacaoprod":
            $op = "cotacaoprod";
            header('Location: cotaprod.php');
            break;

        case "personalizado":
            $op = "personalizado";
            echo "Personalizado";
            break;
    }

?>