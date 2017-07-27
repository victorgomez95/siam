<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistema Integral de Administración Médica</title>
  {!! Html::style('assets/css/bootstrap.min.css') !!}
  {!! Html::style('assets/css/landing-page.css') !!}
  {!! Html::style('assets/css/bootstrap.css') !!}
  {!! Html::style('assets/css/miStyle.css') !!}
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
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="navbar" style="width:9%;height:2%;padding-top:15px;" >
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                    <li>
                        <a href="#" style="color: white"> <h4>Productos</h4></a>
                    </li>
                    <li>
                        <a href="#" style="color: white"> <h4>Empresa</h4> </a>
                    </li>
                    <li>
                        <a href="#" style="color: white"> <h4>Ayuda</h4></a>
                    </li>
                    <li>
                        <a href="{{url('users/registro')}}"><button type="button" class="btn btn-primary" style="background: #1678C2;border-style: none;">Crear cuenta</button></a>
                    </li>
                    <li>
                        <a href="{{url('login')}}"><button type="button" class="btn btn-success" style="background: #16AB39;border-style: none;">Iniciar sesión</button></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    

    <div class="banner">
        <div class="container">
            <br><br>
            <div class="row">
                <div align="center">
                    <h2>404 Error Page</h2>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.banner -->
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div align="right">
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">404 error</li>
                </ol>
            </section>
        </div>
        

        <!-- Main content -->
        <section class="content">
        <div align="center" class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada.</h3>
            <p>
                No hemos podido encontrar la página que buscabas.  
                Mientras tanto, puedes volver a <a href="{{url('/logout')}}">la página principal</a>.
            </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <br>
    <br>

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
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
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
