<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nav | Hello Stock</title>

<link rel="stylesheet" href="css/nav.css">         
            <!-- CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <!-- JQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

            <!-- JS -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
<script>
  
$(document).on('focusin', 'navbar input.search-textbox', function(){
    if($(this).val() <= 0){
        var parent = $(this).closest('div.search');
        parent.addClass('focused');
    }
});
$(document).on('focusout', 'navbar input.search-textbox', function(){
    if($(this).val() <= 0){
        var parent = $(this).closest('div.search');
        parent.removeClass('focused');
    }
});
$(document).on('click', 'navbar .search', function(){
    $(this).children('input.search-textbox').focus();
});


$(document).on('keyup', 'navbar input.search-textbox', function(){
    var parent = $(this).closest('div.search');
    var phrase = $(this).val(),
        phrase_length = phrase.length;

    if(phrase_length >= 2){
        parent.addClass('multi-char');
        if(!parent.hasClass('not-null')){
            parent.addClass('not-null');
        }

    }
    else if(phrase_length == 1){
        parent.addClass('not-null');
        parent.removeClass('multi-char');
    }
    else if(phrase_length <= 0){
        parent.removeClass('not-null');
        parent.removeClass('multi-char');
    }
});


$(document).on('click', 'navbar .tabs ul.navbar-body li a', function(){
    var $this = $(this);
    TabHighlighter.set($this);
    $this.closest('li').siblings('.active').removeClass('active');
    $this.closest('li').addClass('active');
});
var TabHighlighter = {
    set: function($this){
        $('.tab-highlighter').css({
            'left':  $this.closest('li').offset().left,
            'width': $this.closest('li').outerWidth()
        });
    },
    refresh: function(){
        var $this = $('.tabs ul.navbar-body li.active a');
        $('.tab-highlighter').css({
            'left':  $this.closest('li').offset().left,
            'width': $this.closest('li').outerWidth()
        });
    }
};
$(window).resize(function(){
    TabHighlighter.refresh();
});
$(document).ready(function(){
	TabHighlighter.refresh();
});
</script>
</head>
<body>
<navbar>
  <div class="navbar nav navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
      <div class="v-flex">
        <div class="navbar-body">
          <div class="navbar-start">
            <div class="hamburger-menu">
              <div class="ic_menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
            </div>
            <img class="logo" src="https://i.imgur.com/XxBaCUE.png" style="height: 60px;width:70px;">
          </div>
          <!--     PARTE DE PERQUISA     -->
          <div class="search">
            
            <form action="Pesquisando.php" method="POST">
            <input type="text" name="pesquisa" class="search-textbox" placeholder="Search">
            <a href="pesquisando.php" class="ico-btn search-btn"><button type="submit"></button></a>
            </form>
            
          </a>
          </div>
           <!--     PARTE DE PERQUISA//     -->
          
          <div class="navbar-end">
            <a href = "carrinho.php" style="text-transform: uppercase;color: #eea236 ;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg></a>
          </div>
          
          <div class="navbar-end">
          <?php if (empty($_SESSION['cod']))  {  ?> 
            <a href="login.php" style="text-transform: uppercase;color: #eea236 ;">Login</a>
            <?php } else {
                 if ($_SESSION['status_usu'] == 0) {
                  $consulta_usuario = $connection->query("SELECT nome,status_usu FROM usuario where cod = '$_SESSION[cod]'");
                  $exibe_usuario = mysqli_fetch_assoc($consulta_usuario);
                  ?>
                  
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #eea236 ; display: flex; align-items: center;">
             <div style="height: 40px; width: 40px; background-color: black; border-radius: 50%;">
                 
             </div>
            <?php echo $exibe_usuario['nome'] ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="destroy_secao.php">Sair</a></li>
              </ul>
              </li>

              <?php } elseif ($_SESSION['status_usu'] == 1)  { ?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #eea236;text-transform: uppercase">Admin<span class="caret"></span></a>
                 <ul class="dropdown-menu">
                 <li><a href="destroy_secao.php">Sair</a></li>
                 <li><a href="./CRM_New/index.php">Estoque</a></li>
                 </ul>
              </li>              
              <?php } } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-fixed-top navbar-inverse tabs paper-shadow-bottom-z-2">
    <div class="container-fluid">
      <ul class="navbar-body list-inline">
        <li class="active"><a href="index.php" class="active" style="color: #eea236 ;">Início</a></li>
        <li class="active"><a href="promocoes.php" style="color: #eea236 ;">Promoções</a></li>
        
        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #eea236 ;"> Sobre <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="manutencao.html">Conta</a></li>
                    <li><a href="manutencao.html">Suporte</a></li>
                    <li><a href="manutencao.html">Contato</a></li>
                    <li><a href="faq/index.html">FAQ</a></li>
                  </ul>
                </li>
        
        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #eea236 ;"> Outras superficies <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="superficies.php?cat=Piso">Pisos</a></li>
                    <li><a href="superficies.php?cat=teto">Tetos</a></li>
                    <li><a href="superficies.php?cat=tijolos e telhas">Tijolos e telhas</a></li>
                    <li><a href="superficies.php?cat=concretos">Concretos</a></li>
                    <li><a href="superficies.php?cat=azulejos e pastilhas">Azulejos e pastilhas</a></li>
                    <li><a href="superficies.php?cat=gesso">Gesso</a></li>
                    <li><a href="superficies.php?cat=vidros">Vidros</a></li>
                  </ul> 
                </li>
                
      </ul>
      <div class="tab-highlighter"></div>
    </div>
  </div>
  <!--2 navbar for pushing 1 above after scrolling (Not Implemented yet.)-->
</navbar>
</body>
</html>
<!-- 
              				Logo Hello Stock 
					
					https://i.imgur.com/XxBaCUE.png
              											-->