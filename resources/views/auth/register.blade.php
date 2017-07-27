
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistema Integral de Administración Médica</title>
  {!! Html::style('assets/css/bootstrap.min.css') !!}
  {!! Html::style('assets/css/landing-page.css') !!}
  {!! Html::style('assets/css/bootstrap.css') !!}
  {!! Html::style('assets/css/strength.css') !!}
  {!! Html::style('assets/css/miStyle.css') !!}
  
  {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

@include('alerts.errors')
@include('alerts.request')

<body>

    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style="background:#001453;border-bottom:none">
        <div class="container topnav">
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
        </div>
    </nav>


	<a  name="contact"></a>
    <div class="banner">

        <div class="container">
            <br><br>
            <div class="row">
                <div align="center">
                    <h2>Registro de usuarios</h2>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <br><br>
        <div align="center" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <table style="border-style: none">
                <tr>
                    <td>
                        <h1 style="font-family: arial, sans-serif;color: black">Registrate gratis</h1>
                         
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 style="font-family:  arial, sans-serif;;">Todos los dispositivos.<br>Siempre libre. Sin ataduras</h3>
                    </td>
                </tr>
            </table><br>          
            <img class="img-responsive" src="{{ asset('assets/img/doctores.png') }}" alt="" style="width: 50%; height: 50%"> 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row main">
				<div class="main-login main-center">
                    <h2>Formulario de registro</h2>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#1" data-toggle="tab">Clínica</a>
                        </li>
                        <li>
                            <a  href="{{url('/register/particular')}}">Particular</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="1">
                            {!!Form::open(array('url'=>'register/clinica','method'=>'POST','autocomplete'=>'off'))!!}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="cols-sm-2 control-label">Nombre</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Nombre" required minlength="2" />
                                    </div>
                                    @if ($errors->has(''))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('anio_fundacion') ? ' has-error' : '' }}">
                                <label for="apellidos" class="cols-sm-2 control-label">Año de fundación</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="number" class="form-control" name="anio_fundacion" id="anio_fundacion" value="{{ old('anio_fundacion') }}" placeholder="2017" required/>
                                    </div>
                                    @if ($errors->has('anio_fundacion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('anio_fundacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ubicacion') ? ' has-error' : '' }}">
                                <label for="apellidos" class="cols-sm-2 control-label">Dirección</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}" placeholder="Av. Rio mayo 2225, Vista hermosa, Cuernavaca" minlength="2" required/>
                                    </div>
                                    @if ($errors->has('ubicacion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ubicacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="cols-sm-2 control-label">Teléfono</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" placeholder="7771234567" minlength="10" maxlength="10"  pattern="[0-9]{10}" required/>
                                    </div>
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
                                <label for="apellidos" class="cols-sm-2 control-label">RFC</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="rfc" id="rfc" value="{{ old('rfc') }}" placeholder="Persona moral" minlength="2" required/>
                                    </div>
                                    @if ($errors->has('rfc'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rfc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nombre_encargado') ? ' has-error' : '' }}">
                                <label for="nombre_encargado" class="cols-sm-2 control-label">Nombre del encargado</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="nombre_encargado" id="nombre_encargado"  value="{{ old('nombre_encargado') }}" placeholder="Nombre" required minlength="2"/>
                                    </div>
                                    @if ($errors->has('nombre_encargado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre_encargado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('apellidos_encargado') ? ' has-error' : '' }}">
                                <label for="apellidos_encargado" class="cols-sm-2 control-label">Apellidos del encargado</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="apellidos_encargado" id="apellidos_encargado" value="{{ old('apellidos_encargado') }}" placeholder="Apellidos" minlength="2" required/>
                                    </div>
                                    @if ($errors->has('apellidos_encargado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('apellidos_encargado') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                                <label for="sexo" class="cols-sm-2 control-label">Sexo del encargado</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optradio" required>Hombre
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optradio">Mujer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="cols-sm-2 control-label">Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Coloca tu Email" value="{{ old('email') }}" required/>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="cols-sm-2 control-label">contraseña</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  required/>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="cols-sm-2 control-label">Confirma contraseña</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center" class="form-group">
                                <button class="btn btn-primary"  style="background:#4C8EFB;color:white;border-style:none" type="submit" onclick="clinica()">Registrar</button>
                            </div>
                            <!--{!!Form::close()!!}	-->
                            
                        </div>                        
                        @include('alerts.errors')
                        @include('alerts.request')
                        
                    </div>
				</div>
			</div>
        </div>
    </div>

    <br>
    <br>



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
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Mont&Go Software S.A de C.V. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

  {!!Html::script('assets/js/jquery.js')!!}
  {!!Html::script('assets/js/bootstrap.min.js')!!}
  {!!Html::script('assets/js/strength.js')!!}
</body>
</html>