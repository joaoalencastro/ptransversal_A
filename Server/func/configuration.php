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
                        <a href="configuration.php"><i class="glyphicon glyphicon-stats"></i> Estatísticas</a>
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
                <h1 class="page-header">Configurações</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Adicionar salas
                    </div>
                    <form action="../tarefas_funcionario/addRoom.php" method="post">
                        <div class="col-md-2">
                            <h4 style="margin: 15px;">Nome</h4>
                            <input style="margin: 15px;" type="text" name="nome"  class="form-control" placeholder="Ex.: AT-11">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Número de cadeiras</h4>
                            <input style="margin: 15px;" type="number" name="cadeiras" class="form-control" placeholder="Ex.: 28">
                        </div>
                        <div class="col-md-2" >
                            <h4 style="margin: 15px;">Atributos</h4>
                            <div class="checkbox" style="margin-left: 15px;">
                                <label><input type="hidden" name="projetor" value="0"></label>
                                <label><input type="checkbox" name="projetor" value="1">Projetor</label>
                            </div>
                            <div class="checkbox" style="margin-left: 15px;">
                                <label><input type="hidden" name="ar" value="0"></label>
                                <label><input type="checkbox" name="ar" value="1">Ar</label>
                            </div>
                            <div class="checkbox" style="margin-left: 15px;">
                                <label><input type="hidden" name="laboratorio" value="0"></label>
                                <label><input type="checkbox" name="laboratorio" value="1">Laboratório</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4>Anexar imagem da sala</h4>
                            <button>anexo</button>
                        </div>
                        <div class="col-md-1" style="margin: 20px; margin-top: 10%;">
                            <input type="submit" class="bnt btn-success" value="Enviar">
                        </div>
                    </form>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Adicionar Professor
                    </div>
                    <form action="php/post_cadastro_func.php" method="post">
                        <div class="col-md-2">
                            <h4 style="margin: 15px;">Nome</h4>
                            <input style="margin: 15px;" type="text" name='nome' class="form-control" placeholder="Digite o nome">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Matrícula</h4>
                            <input style="margin: 15px;" type="text" name='matricula' class="form-control" placeholder="Digite a matrícula">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Email</h4>
                            <input style="margin: 15px;" type="email" name='email' class="form-control" placeholder="Digite o emal">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">RG</h4>
                            <input style="margin: 15px;" type="text" name='rg' class="form-control" placeholder="Digite o RG">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Senha</h4>
                            <input style="margin: 15px;" type="password" name='senhatxt'  class="form-control" placeholder="Digite sua senha">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Confirme sua senha</h4>
                            <input style="margin: 15px;" type="password" name='senhatxt2' class="form-control" placeholder="Confirme sua senha">
                        </div>
                        <div class="col-md-1" style="margin: 20px; margin-top: 5%;">
                            <input type="submit" class="bnt btn-success" value="Enviar">
                        </div>
                    </form>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Adicionar Funcionário   
                    </div>
                    <form action="php/post_cadastro_func.php" method="post">
                        <div class="col-md-2">
                            <h4 style="margin: 15px;">Nome</h4>
                            <input style="margin: 15px;" type="text" name='nome'  class="form-control" placeholder="Digite o nome">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Matrícula</h4>
                            <input style="margin: 15px;" type="text"  name='matricula' class="form-control" placeholder="Digite a matrícula">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Email</h4>
                            <input style="margin: 15px;" type="email" name='email' class="form-control" placeholder="Digite o email">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">RG</h4>
                            <input style="margin: 15px;" name='rg' type="number" placeholder="Digite o RG" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Senha</h4>
                            <input style="margin: 15px;" type="password" name='senhatxt2' class="form-control" placeholder="Digite sua senha">
                        </div>
                        <div class="col-md-3">
                            <h4 style="margin: 15px; white-space: nowrap;">Confirme sua senha</h4>
                            <input style="margin: 15px;" type="password" name='senhatxt2'  class="form-control" placeholder="Confirme sua senha">
                        </div>
                        <div class="col-md-1" style="margin: 20px; margin-top: 5%;">
                            <input type="submit" class="bnt btn-success" value="Enviar">
                        </div>
                    </form>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
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
    init(0);
</script>

</body>

</html>
