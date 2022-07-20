<?php

// Padronização de e-mails pré-configurados

include('enviar_email.php');

$cliente = $_POST['cliente'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['msg'];
$operador = $_POST['operador'];

$novo_cliente = "Olá $cliente tudo bem? Estamos felizes em ter a sua confiança! <br>
Para poder acessar nossos produtos, promoções especiais e acompanhar pedidos, acesse nosso site com os dados: <br>
https://www.hellostock.com.br/login <br>
Usuario: teste <br>
Senha: teste <br>
Em caso de dúvidas nos informe atráves do nosso chat ou pelo numero: 11 948873750";

/* $prod_aluguel = "Olá $cliente tudo bem? <br> Estamos entrando em contato referente ao produto alugado conosco.
A data de devolução está marcada para o dia . Não atrase, pois estará sujeito a multa. <br> Obrigado!";

$prod_atrasada = "Olá $cliente tudo bem? <br> Estamos entrando em contato referente a conta atrasada conosco.
peço que entre em contato conosco atráves do site ou deste e-mail. <br> Obrigado.";

$prod_saiu = "Olá $cliente tudo bem? <br> Seu produto saiu para a entrega, fique ciente com a data prevista.
Utilize nosso site para verificar a entrega: <br> https://www.hellostock.com.br/correios <br> Segue seu código de rastreio:
<br>  <br> Obrigado.";

$prod_entregue = "Olá $cliente tudo bem? <br> Identificamos a entrega do produto no endereço solicitado. <br>
Agradecemos pela preferencia e em caso de dúvidas acesse nosso FAQ: <br>
https://hellostock.com.br/FAQ <br> Obrigado.";

$prod_cotar = "Olá $fornecedor tudo bem? <br> estamos com falta no nosso estoque, precisamos realizar a cotação de
,  poderia nos confirmar se o valor continua de R$ $. <br> Obrigado.";
*/
?>