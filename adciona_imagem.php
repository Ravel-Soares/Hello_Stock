<!DOCTYPE html>
<!-- video que estou utilizando para fazer esse codigo
PHP/MySQL: Upload de arquivos e imagens com salvamento no banco de dados (Atualizado 2021)
 -->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escolha sua imagem de perfil!</title>

    <style type="text/css">

    	.img-escolha{
    		width: 350px;
    		height: 400px;
    		padding: 15px;
    		margin-left: 40%;
    		margin-top: 10%;
    		background-color: rgba(255, 0, 0, 0.5);
    		align-content: center;
    		text-align: center;
    		border-radius: 10px;
    	}

    	.local-imagem{
    		margin-left: 20%;
    		height: 200px;
    		width: 200px;
    		border-radius: 50%;
    		border: none;
    		background-color: black;
    		display: flex;
    		align-items: center;
    		justify-content: center
    	}

    	
    </style>

</head>
<body>
	<?php 

	if (isset($_FILES['arquivo'])) {
		echo "arquivo adcionado";
	}

	session_start();
	include "config.php";
	$nome = $_POST['nome']
	?>
	 <div class="img-escolha">
	 	<h1>Olá <?php echo $nome ?> que tal escolher uma foto de pefil? </h1>
	 	<div class="local-imagem">
	 	<div class="imagem">
	 		<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-camera-fill" viewBox="0 0 16 16">
		  <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
		  <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
       </svg>
	 	</div>
	 	</div>
	 	<br>
	 	 	<div class="adcionar imagem">
	 		<form method="POST" enctype="multipart/form-data">
	 			<input type="file" name="arquivo">
	 		</form>
	 	</div>
	 </div>


</body>
</html>