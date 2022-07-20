<style> 

.prodteste {
  padding-top:20px;
  padding-bottom: 80;

}

</style>
<div class="card2">
<div class="container-fluid">

 <div class="row text-center" style="margin-top: 15px;">

    <h1>Carrinho de compras | Hello Stock</h1>
</div>
    <?php 
    $total = null; // variavel total que recebe um valor nulo

    //criando um loop para sessão carrinho que recebe o $cd e a quantidade
    foreach ($_SESSION['carrinho'] as $cd => $qnt) {
    $consulta = $connection->query("SELECT * FROM produto WHERE pro_cod = '$cd'");
    $exibe  = mysqli_fetch_assoc($consulta);

    $produto = $exibe['pro_nome'];
    $preco = number_format(($exibe['pro_valorvenda']),2,',','.');
    $total += $exibe['pro_valorvenda'] * $qnt; // variavel que recebe preço * quantidade 

    ?>


    <div class="row" style="margin-top: 15px ;">

    <div class="col-sm-1 col-sm-offset-1">
        <img src="<?php echo $exibe['imagens'] ?>" alt="não funcionou" class="img-responsive">
    </div>

    <div class="col-sm-4">
        <h4 style="padding-top: 20px;"><?php echo $produto ?></h4>
    </div>

    <div class="col-sm-2">
        <h4 style="padding-top:20px ;">R$ <?php echo $preco ?></h4>
    </div>

    <div class="col-sm-2">
        <form>
            <h4 class="prodteste"><input type="number" min="1" max="15" name="quantidade_produto" value="<?php echo $qnt ?>"></h4>
        </form> 
        
    </div>

    <div class="col-sm-1 col-xs-offset-right-1" style="padding-top: 20px ;">

    <!-- remover item do carrinho pelo id -->
    <a href="removeCarrinho.php?cd=<?php echo $cd ;?>">
    <button class="btn btn-danger btn-lg btn-block" style="width:100px;">
       Remover
    </button>
</a>

</div>
</div>
    


<?php } ?>
   </div>
</div>