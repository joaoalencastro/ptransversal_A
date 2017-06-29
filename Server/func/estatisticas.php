<?php

require('conexao2.php');


$sql2 = "SELECT * FROM fluxo;";
$result2 = mysqli_query($conexao,$sql2);
if (!$result2) {
    die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i2 = 0;
while ($ln2 = mysqli_fetch_array($result2)){
    $i2 = $i2 + 1;
}


$sql = "SELECT * FROM fluxo where status='pendente';";
$result = mysqli_query($conexao,$sql);
if (!$result) {
    die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i= 0;
while ($ln = mysqli_fetch_array($result)){
    $i = $i + 1;
}

$i3 = $i2 - $i;

$sql3 = "SELECT * FROM usuario;";
$result3 = mysqli_query($conexao,$sql3);
if (!$result3) {
    die('Algo deu errado na conexão. Erro: ' . mysqli_error($conexao));
}

$i4= 0;
while ($ln3 = mysqli_fetch_array($result3)){
    $i4 = $i4 + 1;
}






?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservado | Administrador </title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

        // Carregar a API de visualizacao e os pacotes necessarios.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Especificar um callback para ser executado quando a API for carregada.
        google.setOnLoadCallback(desenharGrafico);

        var usuarios = "<?php echo $i4; ?>";
        var sol_pende = "<?php echo $i; ?>";
        var sol_con = "<?php echo $i3; ?>";
        usuarios = parseInt(usuarios);
        sol_pende = parseInt(sol_pende);
        sol_con = parseInt(sol_con);
        /**
         * Funcao que preenche os dados do grafico
         */
        function desenharGrafico() {
            // Montar os dados usados pelo grafico


            var dados = new google.visualization.DataTable();
            dados.addColumn('string', 'Solicitações Pendentes');
            dados.addColumn('number', 'Solicitações Concluidas');
            dados.addRows([
                ['Solicitações Pendentes', sol_pende],
                ['Solicitações Concluidas', sol_con]
            ]);

            // Configuracoes do grafico
            var config = {
                'title':'Solicitações Recebidas',
                'width':400,
                'height':300

            };




            // Instanciar o objeto de geracao de graficos de pizza,
            // informando o elemento HTML onde o grafico sera desenhado.
            var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));


            // Desenhar o grafico (usando os dados e as configuracoes criadas)
            chart.draw(dados, config);

        }


    </script>

</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Administrador | Reservado</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil do Usuário</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-table fa-fw"></i> Pendências</a>
                    </li>
                    <li>
                        <a href="history.php"><i class="fa fa-bar-chart-o fa-fw"></i> Histórico</a>
                    </li>
                    <li>
                        <a href=".php"><i class="glyphicon glyphicon-stats"></i> Estatísticas</a>
                    </li>
                    <li>
                        <a href="configuration.php"><i class="glyphicon glyphicon-cog"></i> Configurações</a>
                    </li>

                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <!-- /.panel-heading -->
                    <div>
                        <div id="area_grafico" align="center">
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    init(1);
</script>

</body>

</html>
