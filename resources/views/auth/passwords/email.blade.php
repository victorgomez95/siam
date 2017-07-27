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

    

    <div class="banner">
        <div class="container">
            <br><br>
            <div class="row">
                <div align="center">
                    <h2>Recuperación de password</h2>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.banner -->
    <div class="container">
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Introduce tu Email y te enviaremos un correo de confirmación</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
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

