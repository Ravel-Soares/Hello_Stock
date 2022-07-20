<HTML>
    <head>
        <meta charset="UTF-8">
        <title>Enviar e-mails</title>
        <meta http-equiv="refresh" content="3; URL='index.html'"/>
    </head>

    <body>

        <?php

    /*

    //Verificar se existe algum campo vazio.
     if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
        $assunto = $_POST['assunto'];
    }
    if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
        $mensagem = $_POST['mensagem'];
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }

    //Fim verificação

    */
    

    //Utilizando bibliotecas adquiridas atravez do Composer
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
    //fim composer

    //Buscando autoload dentro da pasta vendor para auticação e enviar e-mails.
    require './lib/vendor/autoload.php';

        //Estanciando PHPMailer
        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; //servidor SMTP, neste caso utilizamos o GMAIL
            $mail->SMTPAuth = true; // SMTP auticação, deixe sempre true, pois se não, não irá funcionar
            $mail->Username = 'hellostock.tcc@gmail.com';   //endereço de e-mail que irá enviar
            $mail->Password = 'H3llo@St0ck#2022$';  //senha do e-mail
            $mail->Port = 587;  //Porta para o GMAIL, padrão 587

            $mail->setFrom('hellostock.tcc@gmail.com', $operador); //o e-mail que irá enviar, o nome do usuario do e-mail
            $mail->addAddress($email); //Quem vai receber o e-mail, lembrando que esta enviado atráves do metodo POST no index.html (GET será bloqueado)
            
            $mail->isHTML(true);    // Se o e-mail será enviado em HTML (Alguns servidores não aceitam)                         
            $mail->Subject = $assunto; // Assunto que será colocado no index.html pelo metodo POST
            $mail->Body = nl2br($novo_cliente); // Texto que será colocado no index.html pelo metodo POST
            $mail->AltBody = nl2br(strip_tags($novo_cliente));  // Texto que será colocado no index.html pelo metodo POST

            $mail->send(); //Enviar e-mail
            
            echo 'E-mail enviado com sucesso!<br> Você será redirecionado em 3 segundos';
        } catch (Exception $e) {
            echo "Erro: E-mail não enviado  . Error PHPMailer: {$mail->ErrorInfo}";
        }

        ?>



    </body>



</HTML>