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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/reservado.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!--            Bootstrap Calendário     -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">

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
                <a class="navbar-brand" href="#page-top">Reservado</a>
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
                            <li class="dropdown">

                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                   <i class="fa fa-user fa-fw"></i> Bruno Putinho <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <a style="color: black;" href="#"><i class="fa fa-user fa-fw"></i> Perfil do Usuário</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a style="color: black;" href="../php/logout.php"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
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
                        <h3 align="center">Faça a sua pesquisa por disciplina ou  sala.</h3>
                    </div>
            </div>
            <div class="row" id="space">
                <div class="col-lg-4">
                    
                </div>
                <div class="col-lg-4">
                    <input  type="textarea" name="" placeholder="Ex.: APR, AT-11 ou Monitoria de SD" class="form-control" id="barra-pesquisa">

                </div>
                <div class="col-lg-2">
                    <a type="submit" class="btn btn-default">Pesquisar</a>
                </div>
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
                        <img src="img/mapaFT.png" class="img-responsive" alt="FT">
                    </a>
                   <h3 align="center">Mapa FT</h3>
                </div>
                <div class="col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <img src="img/mapaSG.png" class="img-responsive" alt="Slice of cake">
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
    <section id="contact" class="success" style="background-color: #008B8B">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contato</h2>
                    <hr  class="star-light">
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
                                <input type="text" class="form-control" placeholder="Nome" id="name" required data-validation-required-message="Por favor digite o seu nome">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Digite o seu endereço de email">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Número de Telefone</label>
                                <input type="tel" class="form-control" placeholder="Número de Telefone" id="phone" required data-validation-required-message="Digite o seu número">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Mensagem</label>
                                <textarea rows="5" class="form-control" placeholder="Mensagem" id="message" required data-validation-required-message="Digite sua mensagem."></textarea>
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
                        <h3>Location</h3>
                        <p>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Freelancer</h3>
                        <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2016
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
    <!-- Modal Login -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form action="../php/user_authentication.php" method="post" autocomplete="off" id="login-form">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Digite seu nome de usuário e senha.</span>
                            </div>
                            <input id="login_username" class="form-control" type="text" name="email" placeholder="E-mail" required>
                            <input id="login_password" class="form-control" type="password" name="senha" placeholder="Senha" autocomplete="off" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Lembre-me
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
                            </div>
                            <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link">Esqueceu a senha?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Increva-se</button>
                            </div>
                        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
                        <div class="modal-body">
                            <div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Digite o seu e-mail de cadastro</span>
                            </div>
                            <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Entrar</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Registrar</button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" action="../php/post_cadastro_user.php" method="post" autocomplete="off" style="display:none;">
                        <div class="modal-body">
                            <div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Registre sua conta</span>
                            </div>
                            <input class="form-control" type="text" placeholder="Nome *" name='nome' required>
                            <input class="form-control" type="text" placeholder="Matrícula *" name='matricula' required>
                            <input class="form-control" type="text" placeholder="E-Mail *" name="email" required>   
                            <input class="form-control" type="text" placeholder="RG *" name="rg" required>     
                            <input class="form-control" type="text" placeholder="Data de nascimento: Ex:. DD/MM/AAAA *" name="idade" required>     
                            <input class="form-control" type="password" placeholder="Digite sua senha *" name="senhatxt" required>
                            <input class="form-control" type="password" placeholder="Confirme sua senha *" name="senha2txt" required>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="register">Registrar</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Entrar</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link">Esqueceu a senha?</button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>
    <!-- END # MODAL LOGIN -->





     <!-- Portfolio Modals -->
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
                            <h2 style="padding-bottom: 40px;">SG</h2>
                            <img src="img/mapaSG.png" class="img-responsive img-centered" alt="">
                            <p>Clique em alguma sala para ver o seu itinerário.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <h2 style="padding-bottom: 40px;">Faculdade de Tecnologia</h2>
                            
                            <img src="img/mapaFT.png" class="img-responsive img-centered" alt="">
                            <p>Clique em alguma sala para ver o seu itinerário.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.js"></script>

    <!-- CALENDÁRIO     -->
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.pt-BR.min.js"></script>


    <script type="text/javascript">
        init();
    </script>

</body>

</html>
