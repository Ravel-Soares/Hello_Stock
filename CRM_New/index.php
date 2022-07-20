<!DOCTYPE html>
<html lang="PT_BR">

<head>
    <meta charset="utf-8">
    <title>CRM | Hello Stock</title>
    <link rel="icon" type="image/x-icon" href="https://e-millennium.com.br/wp-content/uploads/2016/08/crm2.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">

    <!--Links-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

</head>

<?php 
          
            session_start();
            include '../config.php';

    // --------------------------------------------------------------------------------------------------------//

            $query = ("SELECT login, nome, cargo FROM funcionario");
            // executa a query
            $consulta = mysqli_query($connection, $query);

    // --------------------------------------------------------------------------------------------------------//

            $query2 = ("SELECT * FROM itenssaida");
            // executa a query
            $consulta2 = mysqli_query($connection, $query2);
            // calcula quantos dados retornaram
            $linhas = mysqli_num_rows($consulta2);

            $query3 = ("SELECT SUM(valor_unitario) AS total FROM itenssaida");

            $consulta3 = mysqli_query($connection, $query3);

    // --------------------------------------------------------------------------------------------------------//

            $query4 = ("SELECT SUM(pro_valorpago) AS total FROM itensentrada");

            $consulta4 = mysqli_query($connection, $query4);

    // --------------------------------------------------------------------------------------------------------//

         $consulta_usuario = $connection->query("SELECT nome,status_usu FROM usuario where cod = '$_SESSION[cod]'");
         $exibe_usuario = mysqli_fetch_assoc($consulta_usuario);

          ?>

<body>
    <!--deixar conteudo centralizado-->
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!--Circulo de loading ao atualizar a pagina-->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Carregando...</span>
            </div>
        </div> <!--Fim circulo-->

        <!--menu-->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">

                <!--Nome Hello Stock (esquerda)-->
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Hello Stock</h3>
                </a><!--fim nome-->
                
                <!--imagem de perfil do usuario e Hello Stock(esquerda)-->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="https://i.imgur.com/oygmsV2.jpeg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div> <!--fim imagem-->

                    <!-- nome Usuario (esquerda)-->
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $exibe_usuario['nome'] ?></h6> <!-- Colocar o Nome em PHP puxando do BD -->
                        <span>Supervisor</span>
                    </div>
                </div><!--fim div usario e Hello Stock-->


                <!--Menu (esquerda)-->
                <div class="navbar-nav w-100">
                    <!--Dashboards-->
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <!--Relátórios-->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Relatorios</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="relatorio/colaborador.php" class="dropdown-item">Relatorio Colaboradores</a> 
                            <a href="relatorio/pedidos.php" class="dropdown-item">Relatorio Pedidos</a>
                            <a href="relatorio/produtos_minimos.php" class="dropdown-item">Estoque Minimo</a>
                        </div>    
                    </div>
                    
                    <!--Estoque-->
                    <a href="../index.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Estoque</a>
                    <!--Adicionar itens ao Estoque-->
                    <a href="add_produto/addprod.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Adicionar Produto</a>
                    <!--Adicionar itens ao Estoque-->
                    <a href="cadastro_de_usuarios/cadastro.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Cadastrar Cliente</a>
                    <!--Pedidos-->
                    <a href="relatorio/pedidos.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Pedidos</a>
                </div> <!--Fim menu-->
            </nav>    
        </div> <!--Fim div menu-->

        <!--div usuario (direita)-->
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <!--Conteudo usuario-->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="https://i.imgur.com/oygmsV2.jpeg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $exibe_usuario['nome'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Perfil</a>
                            <a href="../destroy_secao.php" class="dropdown-item">Sair</a>
                        </div>
                    </div>
                </div>
            </nav> <!--fim div usuario-->

            <!--div dos titulos-->
            <div class="container-flu id pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Vendas</p>
                                <h6 class="mb-0"><?php echo $linhas ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Vendidos</p>
                                <h6 class="mb-0">R$ 
                                <?php 
                                    while($row = mysqli_fetch_assoc($consulta3)) {
                                        $total = $row['total'];
                                        echo $total;
                                    } 
                                ?>
                                 </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Investido</p>
                                <h6 class="mb-0">R$ 
                                <?php 
                                
                                    while($row1 = mysqli_fetch_assoc($consulta4)) {
                                        $total1 = $row1['total'];
                                        echo $total1;
                                    } 

                                ?>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Lucro</p>
                                <h6 class="mb-0">
                                    <?php

                                        $ganho = ($total / $total1) * 100; 
                                        echo number_format($ganho,2,',','.' );

                                    ?>
                                         %           
                                 </h6>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div> <!--fim div titulos-->

            <!--div colaborador online-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Colaborador Online</h6>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            
                            <!--titulos colaborador online-->
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Colaborador</th>
                                    <th scope="col">Status</th>   
                                    <th scope="col">Informações</th>
                                </tr>
                            </thead>
                            <?php while ($exibe = mysqli_fetch_assoc($consulta)) { ?> 
                            <!--colaboradores-->
                            <tbody>
                                <tr>               
                                    <td> <?php echo $exibe['nome'];?></td>
                                    <td>Online</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detalhes</a></td>
                                </tr>
                            </tbody>

                                <?php  } ?>

                        </table>
                    </div>
                </div>
            </div> <!--fim colaborador online-->

            <!--Calendario-->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calendario</h6>
                                <a href="">Ver todos</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div> <!--fim calendario-->

        </div>

        <!--seta para voltar ao topo-->
        <a href="#" class="voltar-topo"><i class="bi bi-arrow-up"></i></a>

    </div>


    <!--links 2-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>