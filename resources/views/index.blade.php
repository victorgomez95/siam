<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistema Integral de Administración Médica</title>
  {!! Html::style('assets/css/bootstrap.min.css') !!}
  {!! Html::style('assets/css/landing-page.css') !!}
  {!! Html::style('assets/css/bootstrap.css') !!}
  <!-- Custom Fonts -->
  {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style="background:#001453;border-bottom:none">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                    <li>
                        <a href="#" style="color: white"> <h4>Productos</h4></a>
                    </li>
                    <li>
                        <a href="#services" style="color: white"> <h4>Empresa</h4> </a>
                    </li>
                    <li>
                        <a href="#" style="color: white"> <h4>Ayuda</h4></a>
                    </li>
                    <li>
                        <a href="{{url('/register')}}"><button type="button" class="btn btn-primary" style="background: #1678C2;border-style: none;">Crear cuenta</button></a>
                    </li>
                    <li>
                        <a href="{{url('/login')}}"><button type="button" class="btn btn-success" style="background: #16AB39;border-style: none;">Iniciar sesión</button></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    

    
    <div class="intro-header">
        <div id="particles-js" style="position: absolute;top: 50px;width: 100%;">

        </div>

        <div class="container"  >
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Expediente Clínico Digital</h1>
                        <h3>+ de 12000 profesionales de la salud en la red más conectada en la asistencia sanitaria. </h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="{{url('users/registro')}}" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-send" style="color:#001453"></i> <span class="network-name"> Empezar</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
    <div ></div>
    <!-- Page Content -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Conozca la herramienta más progresiva en el cuidado de la salud</h2>
                    <p class="lead">
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{ asset('assets/img/seguimiento1.jpg') }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Vea por que más profesionales nos eligen sobre cualquier otro sistema</h2>
                    <p class="lead">
                    </p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="{{ asset('assets/img/doctores.png') }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">
        <div class="container">
            <div align="center" class="col-lg-4 col-md-8 col-sm-12 col-xs-6">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top"  src="{{ asset('assets/img/cloud_upload.png') }}" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Basado en la Nube</h4>
                            <p class="card-text" >Con autulizaciones automaticas</p>
                        </div>
                    </div>
            </div>
            <div align="center" class="col-lg-4 col-md-8 col-sm-12 col-xs-6">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" style="width:152px;height:140px" src="{{ asset('assets/img/security.png') }}" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Seguridad de datos</h4>
                            <p class="card-text" >Maxima seguridad de datos personales</p>
                        </div>
                    </div>
            </div>
            <div align="center" class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" style="width:152px;height:140px" src="{{ asset('assets/img/money.png') }}" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">Gratis</h4>
                            <p class="card-text" >Totalmente gratis</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Intuitivo <font style="color: blue">&</font> Fácil de usar</h2>
                    <p class="lead">
                        Es un software muy intuitivo y fácil de usar incluso por personas que no tienen conocimientos avanzados.
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{ asset('assets/img/iphone.png') }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Contáctanos</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="#"  class="btn btn-default btn-lg" style="background: #001453;color: white;border-style: none"> <span class="network-name">Grupo goMont</span></a>
                        </li>
                        <li>
                            <a href="#"  class="btn btn-default btn-lg" style="background: #1DA1F2;color: white;border-style: none"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg" style="background: #3B5998;color: white;border-style: none"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer style="background: black;color: white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Mont&Go Software S.A de C.V. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

  {!!Html::script('assets/js/jquery.js')!!}
  {!!Html::script('assets/js/bootstrap.min.js')!!}
  {!!Html::script('assets/vendor/particles.js')!!}
  {!!Html::script('assets/vendor/app.js')!!}
</body>
</html>
