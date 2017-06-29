<?php
  require('../conexao/conexao.php');
  session_start();
  if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
    header("Location: login.php");
    exit;
  } else {
    $nome  =  $_SESSION['nome'];
    $email =  $_SESSION['email'];
    $senha =  $_SESSION['senha'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reservado | Sistema de Reserva</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../css/reservado.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!--            Bootstrap Calendário     -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
               <a class="navbar-brand" href="index.php"><img src="../img/logoBar.png" style="max-width: 250px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="#page-top">Início</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Pesquisa</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#mapa">Mapa de Salas</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#sobre">Sobre</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contato</a>
                    </li>
                    <li>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown" id='dropNome'>
                                

        
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <a style="color: black;" href="../login/logout.php"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-md-3">
                    <div id="datapicker"  class="input-group date">
                        <input type="hidden" id="my_hidden_input">
                    </div> 
                </div>
                <div id="agenda" class="col-md-9">
                    <h2 id="Title">Exemplo</h2>
                        <div class="table-responsive">
                            <table id="tabela-agenda">
                              <tr>
                                <th></th>
                                <th class="coluna-horario">08:00</th>    
                                <th class="coluna-horario">09:00</th>
                                <th class="coluna-horario">10:00</th>
                                <th class="coluna-horario">11:00</th>
                                <th class="coluna-horario">12:00</th>
                                <th class="coluna-horario">13:00</th>
                                <th class="coluna-horario">14:00</th>
                                <th class="coluna-horario">15:00</th>
                                <th class="coluna-horario">16:00</th>
                                <th class="coluna-horario">17:00</th>
                                <th class="coluna-horario">18:00</th>
                                <th class="coluna-horario">19:00</th>
                                <th class="coluna-horario">20:00</th>
                                <th class="coluna-horario">21:00</th>
                              </tr>
                            </table>
                        </div>
                </div>        
            </div>
        </div>
    </header>
    <!-- Sessão de Pesquisa -->
    <section id="about">
        <div class="portfolio">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color: black">Pesquisa</h2>
                    <hr style="" class="star-primary">
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 align="center">Faça a sua pesquisa por disciplina.</h3>
                    </div>
            </div>
            <div class="row" id="space">
                <div class="col-lg-4">
                    
                </div>
                <div class="col-lg-4" id="the-basics">
                  <form id="formulario">
                        <input class="typeahead" type="text" placeholder="Ex.: Algoritmo e Estrutura de Dados" id="barra-pesquisa" style="width: 300px; padding: 5px; border: 1px solid #ccc;">
                        <input  id="resultado"  type="submit" class="btn btn-default" value="Pesquisar" data-toggle="modal" data-target="#modalResultado" style="padding: 5px; margin-top: 10px;">
                    </form>
                  
            </div>
        </div>
    </section>
    <!-- Portfolio Grid Section -->
    <section class="success" id="mapa">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Mapa de Salas</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row" style="padding-top: 20px;">
                <div class="col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <img src="../img/mapaFT.png" class="img-responsive" alt="FT">
                    </a>
                   <h3 align="center">Mapa FT</h3>
                </div>
                <div class="col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <img src="../img/mapaSG.png" class="img-responsive" alt="Slice of cake">
                    </a>
                    <h3 align="center">Mapa SG</h3>
                </div>
            </div>
        </div>
    </section>
    <section id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color: black">Sobre</h2>
                    <hr class="star-light">
                </div>
            </div>
           <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p align='justify' >Aplicação web destinada a alunos, monitores, professores e funcionários do departamento de Engenharia Elétrica (ENE) e, possivelmente, de outros departamentos. A aplicação permite ao usuário cadastrado fazer solicitações de reserva de salas,</p>
                </div>
                <div class="col-lg-4">
                    <p align='justify' >gerenciar o uso das mesmas e, a todos os usuários, o sistema permite que sejam visualizados os mapas de sala. Para informações de como utilizar à aplicação acesse os <a href="">termos de uso</a>. Ou se deseja adquirir o sistema, o projeto está disponibilizado neste <a href="https://github.com/joaoalencastro/ptransversal_A">link</a>.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="success" style="background-color: #008B8B">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contato</h2>
                    <hr  class="star-light">
                </div>
            </div>  
            <div class="row" align="center">
                <p class="col-lg-12" style="position: relative;top: 70px;">Para entrar em contato envie um e-mail para:</p>
            </div>
            <div class="row" align="center">
                <div class="col-lg-4 glyphicon glyphicon-envelope" style="font-size: 3em; padding-top: 70px; position: relative; left: 15%; top: 10px"></div><p class="col-lg-4" style="font-size: 2.5em; padding-top: 70px;padding-bottom: 100px">reservado.ene@gmail.com</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                      <h3>Localização</h3>    
                      <div id="map"></div>
                    </div>
                    <div class="footer-col col-md-4">
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Patrocínio</h3>
                        <img src="../img/latitude.jpg" style="max-width: 100%; padding-bottom: 20px; padding-top: 20px;">
                        <img src="../img/logoft.jpeg" style="max-width: 100%;">
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Latitude 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
      
      <!-- Modal de Resultado da pesquisa-->
            <div class="modal fade" id="modalResultado" role="dialog">
            <div class="modal-dialog  modal-sm">
    
      <!-- Modal conteudo-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Resultado</h4>
                </div>
                <div class="modal-body">
                <!-- Estrutura previamente definida e será alterada somente aqui -->
                <h4 class="principal" style="text-align: center;"></h4>
                <h5 class="codigo" style="text-align: center;"></h5>
                <ul>
                    <li class="prof"></li>
                    <li class="dias"></li>
                    <li class="horario"></li>
                    <li class="vagas"></li>
                    <li class="local"></li>
                </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
      

     <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="padding-bottom: 40px;">SG</h2>
                            <div id="over" >
                            <img src="../img/mapaSG.png" style="width: 900px; height: 650px" alt="" usemap="#sgmap"  border="0">
                            <map name="sgmap">
                                <area alt="Auditório SG-11" onclick="fecharmodal()" 
                                 coords="493,324,571,368" shape="rect" id="SG-11"  data-toggle="modal" href="#SG11M" >   
                            </map>
                            </div>
                            <p>Clique em alguma sala para ver o seu itinerário.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2 style="padding-bottom: 40px;">Faculdade de Tecnologia</h2>
                            <div id="over" >
                            <img src="../img/mapaFT.png" style="width: 900px; height: 650px" alt="" usemap="#mymap"  border="0" >
                            <map name="mymap">
                                <area shape="rect" coords="654,453,696,409" onclick="fecharmodal()" data-toggle="modal" href="#BT-52_15M" id="BT-52/15">
                                <area shape="rect" coords="609,475,645,427" onclick="fecharmodal()" data-toggle="modal" href="#BT-34_15M" id="BT-34/15">
                                <area shape="rect" coords="548,447,600,484" onclick="fecharmodal()" data-toggle="modal" href="#BT-25_15M" id="BT-25/15">
                                <area shape="rect" coords="500,469,553,498" onclick="fecharmodal()" data-toggle="modal" href="#BT-16_15M" id="BT-16/15">
                                <area shape="rect" coords="432,488,502,540" onclick="fecharmodal()" data-toggle="modal" href="#AuditorioM" id="Auditório"> 
                                <area shape="rect" coords="222,431,285,463" onclick="fecharmodal()" data-toggle="modal" href="#LabRedesM" id="Lab-Redes">	
                            </map>
                            </div>
                            <p>Clique em alguma sala para ver o seu itinerário.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="generic">
      
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="freelancer.js"></script>
    
    <!-- Pesquisa -->
    <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- CALENDÁRIO     -->
    <script src="../js/bootstrap-datepicker.min.js"></script>
    <script src="../js/bootstrap-datepicker.pt-BR.min.js"></script>

   <!-- 	GOOGLE MAPS	    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAi_fHRVquIJPJNsj6c6lyRoCla1w9qEpI&callback=initMap">
    </script>

    <script type="text/javascript">
        var nome_d = "<?php echo $nome; ?>"
        var array = nome_d.split(" ");
        let html = '<a  class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i>'+array[0]+ ' ' + array[1]+' <i class="fa fa-caret-down"></i></a>';
        $("#dropNome").append(html);
      
        init();
        pesquisa();
        resgatevalor();
    </script>

</body>

</html>
