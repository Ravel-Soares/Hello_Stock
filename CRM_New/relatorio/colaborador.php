<!DOCTYPE html>
<html lang="en">

<head>
    <title>Colaboradores | Hello Stock</title>
    <link rel="icon" type="image/x-icon" href="https://www.appfacilita.com/wp-content/uploads/2019/10/1-relatorios.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <meta name="robots" content="noindex, follow">
    <!--Boostratp-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <script
        nonce="5ac375f1-3692-462b-aa7b-4abf48c90a73">(function (w, d) { !function (a, e, t, r) { a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = { deferred: [] }, a.zaraz.q = [], a.zaraz._f = function (e) { return function () { var t = Array.prototype.slice.call(arguments); a.zaraz.q.push({ m: e, a: t }) } }; for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e); a.zaraz.init = () => { var t = e.getElementsByTagName(r)[0], z = e.createElement(r), n = e.getElementsByTagName("title")[0]; for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.x = Math.random(), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;) { const e = a.zaraz.q.shift(); a.zarazData.q.push(e) } z.defer = !0; for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => { try { a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t)) } catch { a.zarazData["z_" + t.slice(7)] = e.getItem(t) } })); z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t) }, ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, 0, "script"); })(window, document);
        </script>
</head>

<body>

    
        <?php 

            include('../../config.php');

            // cria a instrução SQL que vai selecionar os dados
            $query = ("SELECT colaborador, total_vendido_d, total_vendido_m FROM relatorio_funcionario");
            // executa a query
            $dados = mysqli_query($connection, $query);

            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);

        ?>

        <?php
            // se o número de resultados for maior que zero, mostra os dados
            if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
        ?>

    <div class="divp">
        <div class="layoutcor">
            <div class="espacamentonome">
                <div class="layoutcor">
                    <a href="../index.php"> <button type="button" class="btn btn-primary">Voltar </button> </a>
                    <table>
                        <thead>
                            <tr class="layoutcor-head">
                                <th class="coluna1">Colaborador</th>
                                <th class="coluna3">Total Vendidos Diario</th>
                                <th class="coluna5">Total Vendidos Mensal</th>
                            </tr>
                        </thead>
                        <?php while($exibe = mysqli_fetch_array($dados)){ ?>
                        <tbody>
                            <tr>
                                <td class="coluna1"><?php echo $exibe['colaborador'];?></td>
                                <td class="coluna2"><?php echo $exibe['total_vendido_d'];?></td>
                                <td class="coluna3"><?php echo $exibe['total_vendido_m'];?></td>                           
                        </tbody>
                        <?php } ?>
                    </table>

                    <div class="paginacao">
                    <nav aria-label="Navegação de página exemplo">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                        </ul>
                      </nav>
                  </div>
                    
                </div>
            </div>
        </div>

        <?php
        // finaliza o loop que vai mostrar os dados
        }while($linha = mysqli_fetch_assoc($dados));
      // fim do if
      }
    ?>
    </div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"720fd3e7a963a626","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.6.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>