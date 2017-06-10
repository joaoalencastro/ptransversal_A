<?php
  require('../php/user_logado.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reservado | Sistema de Reserva</title>

    <!-- Calendario         -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<link rel="stylesheet" href="/resources/demos/style.css"> -->

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/reservado.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="Inicio" class="index">

<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top" style="color: white;">Reservado</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="#Inicio">Início</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#Pesquisa">Pesquisa</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#Mapa">Mapa de sala</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#Sobre">Sobre</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#Contato">Contato</a>
                    </li>
                    <li>
                        <ul class="nav navbar-top-links navbar-right">
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
                                <li><a href="../php/logout.php"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
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
	            <div id="datapicker" align="center" class="input-group date">
                        <input type="hidden" id="my_hidden_input">
                </div>
            <div id="agenda">
                <h2 id="Title"></h2>
                <div class="table-responsive">
                    <table class="tabela-agenda" >
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
    <!-- Portfolio Grid Section -->
    <section id="Pesquisa">
        <div class="container">
        	<div class="row">
	            <div class="col-lg-12 text-center">
	                <h2 style="color: black">Pesquisa</h2>
	                <hr class="star-primary">
	            </div>
	        </div>
	        <div class="row">
	        	<h3 align="center">Faça a sua pesquisa por disciplina,<br> nome da sala ou monitoria.</h3>
	            <div class="input-group nav navbar-nav" id="inputPesquisa">
	                <p><input  type="textarea" name="" placeholder="Ex.: APR, AT-11 ou Monitoria de SD" class="form-control" id="barra-pesquisa">
	                	<button type="submit" class="btn btn-default">Pesquisar</button>
	                </p>
	                </div>
	            </div>
	        </div>
        </div>
    </section>
    <section id="Mapa" class="success">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color: white">Mapa de Sala</h2>
                    <hr class="star-light">
            </div>
            </div>
            <div class="row" style="position: relative; left: 25%; margin-top: 50px;">
              <div class="column">
                <h3 align="center">Mapa da FT</h3>
                <img style="max-width: 100%" src="img/mapaFT.png" onclick="openModal();currentSlide(1)" class="hover-shadow">
              </div>
              <div class="column">
              <h3 align="center">Mapa do SG</h3>
                <img style="max-width: 100%" src="img/mapaSG.png" onclick="openModal();currentSlide(2)" class="hover-shadow">
              </div>
            </div>

            <div id="myModal" class="modal">
              <span style="position: relative; color: white" class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">

                <div class="mySlides">
                  <div class="numbertext">1 / 2</div>
                    <img src="img/mapaFT.png" style="width:100%">
                </div>

                <div class="mySlides">
                  <div class="numbertext">2 / 2</div>
                    <img src="img/mapaSG.png" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
              </div>
            </div>
    </section>
    <!-- About Section -->
    <section  id="Sobre">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color: black">Sobre</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Reservado é uma aplicação desenvolvida pela turma 2017/1 da disciplina de Projeto Transversal 1, ofertada pelo departamento de Engenharia Elétrica, onde o objetivo foi um sistema funcional que simplifique o processo de reserva do departamento, complementando o processo atual. </p>
                </div>
                <div class="col-lg-4">
                    <p>Para informações de como utilizar à aplicação acesse os <a href="">termos de uso</a>. Ou se deseja adquirir o sistema, o projeto está disponibilizado neste <a href="https://github.com/joaoalencastro/ptransversal_A">link</a>.</p>
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
    <section id="Contato" class="success" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contate-me</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" placeholder="E-mail" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Telefone</label>
                                <input type="tel" class="form-control" placeholder="Telefone" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Mensagem</label>
                                <textarea rows="5" class="form-control" placeholder="Mensagem" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                        <h3>Palestras</h3>
                        <ul>
                            <li>20/07/17 - 12:00: Sala At-11 professor Zelenovisk palestra de Sistemas Industriais
                            </li>
                            <li>19/07/17 - 14:00: Sala At-66 professor Flávio palestra de Cyber Ataques
                            </li>
                            <li>12/07/17 - 12:00: Sala At-11 professor Georges palestra de Arquitetura Linux
                            </li>
                            <li>20/07/17 - 12:00: Sala At-11 professor Zelenovisk palestra de Sistemas Industriais
                            </li>
                            <li>19/07/17 - 14:00: Sala At-66 professor Flávio palestra de Cyber Ataques
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Requisições</h3>

                            <li>AT-11 20/07/17 12:00 Pedido por aluno, Aprovada.
                            </li>
                            <li>AT-11 20/07/17 12:00 Pedido por aluno, Pendente.
                            </li>
                            <li>AT-11 19/07/17 12:00 Pedido por monitor, Aprovada.
                            </li>
                            <li>AT-11 19/07/17 12:00 Pedido por monitor, Pendente.
                            </li>
                            <li>AT-11 19/07/17 12:00 Pedido por aluno, reprovada.
                            </li>
                            <li>AT-11 19/07/17 12:00 Pedido por aluno, pendente.
                            </li>
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
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="/openseadragon/openseadragon.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGKrN2La36taC8h4UYW2r_522iEJYdO3U&callback=initMap"></script>
    <script>
        init();
        $(document).ready(function(){
        $(document).keypress(function(e){
        if(e.keyCode == 13){
        closeModal();
            }
        })
    })
    </script>
</body>

</html>
