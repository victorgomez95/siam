<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/vendor/datepicker/datepicker3.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet"        href="{{asset('css/_all-skins.min.css')}}">
  <link rel="apple-touch-icon"  href="{{asset('img/icono.png')}}">
  <link rel="shortcut icon"     href="{{asset('img/icono.png')}}">

  <script src="https://code.jquery.com/jquery.js"></script>
  <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
  <script src="http://code.highcharts.com/stock/highstock.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>

  <link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('fullcalendar/fullcalendar.print.css')}}" media="print">

  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,600);
    .snip1336 {
      font-family: 'Roboto', Arial, sans-serif;
      position: relative;
      float: left;
      overflow: hidden;
      margin: 0px 0%;
      min-width: 230px;
      max-width: 315px;
      width: 100%;
      color: #ffffff;
      text-align: left;
      line-height: 1.4em;
      background-color: black;
    }

    .snip1336 img {
      max-width: 100%;
      vertical-align: top;
      opacity: 0.85;
    }
    .snip1336 figcaption {
      width: 100%;
      background-color: #001453;
      padding: 15px;
      position: relative;
    }
    .snip1336 figcaption:before {
      position: absolute;
      content: '';
      bottom: 100%;
      left: 0;
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 55px 0 0 400px;
      border-color: transparent transparent transparent #001453;
    }
    
    .snip1336 .profile {
      border-radius: 50%;
      position: absolute;
      bottom: 100%;
      left: 25px;
      z-index: 1;
      max-width: 90px;
      opacity: 1;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .snip1336 h2 {
      margin: 0 0 5px;
      font-weight: 300;
    }
    .snip1336 h2 span {
      display: block;
      font-size: 0.5em;
      color: #2980b9;
    }

  </style>

</head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper"  style="background:black">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo" style="background:#001453">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="{{asset('assets/img/MONT&GO_icon.png')}}"  alt="User Image" style="width:50%"></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img src="{{asset('assets/img/MONT&GO_icon.png')}}"  alt="User Image" style="width:10%"> SIAM</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background:#001453">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">En línea</small>
                  <span class="hidden-xs">
                      {!!Auth::user()->name!!}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                  </span>
                </a>
                <ul class="dropdown-menu" style="background:black;border-style:none">

                  <figure class="snip1336">
                    <img  src=" {{ asset('assets/img/skyline_mexicoCity1.jpg') }}" alt="sample87" />
                    <figcaption>
                      
                      <img src="{{ asset('assets/img_comp/'"<?php echo Auth::user()->fotohash;?>") }}" alt="profile-sample4" class="profile" />
                       <h2>
                        {!!Auth::user()->name!!}
                        <span>
                          {!!Auth::user()->tipo_usuario!!}
                        </span>
                      </h2>  
                    </figcaption>
                  </figure>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer" style="background:black">
                    <div class="pull-right">
                      <br>
                      <a href="{!!URL::to('/logout')!!}" class="btn btn-default btn-flat"> <i class="fa fa-sign-out fa-fw"></i>Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="background:black">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          

          <div class="user-panel">
            
            <img src="{{asset('assets/img/MONT&GO.png')}}"  alt="User Image" style="width:100%">
            <br>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
            </div>
          </form>


          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style="background:black"></li>
            <li class="header">Navegación Principal</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i>Menú principal</a></li>               
                <li><a href="{{url('users/mi_cuenta')}}"><i class="fa fa-circle-o"></i>Mi cuenta</a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i>Acerca de</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i>
                <span>Clínica</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('company')}}"><i class="fa fa-circle-o"></i> Información </a></li>
                <li><a href="{{url('users/menu')}}"><i class="fa fa-circle-o"></i> Colaboradores</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Calendario</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i> Próximos eventos</a></li>
                <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Agendar evento</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Tareas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Provedoores de insumos</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Expedientes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('pacient/')}}"><i class="fa fa-circle-o"></i>Pacientes</a></li>
                <li><a href="{{url('nurseSheet/')}}"><i class="fa fa-circle-o"></i>Hojas de enfermería</a></li>
                <li><a href="{{url('soap/')}}"><i class="fa fa-circle-o"></i>Análisis SOAP</a></li>
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background:#E9EBEE">

        <!-- Main content -->
        <section class="content" >

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de administración médica </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 <a href="">Mont&Go Software</a>.</strong> All rights reserved.
      </footer>


      <!-- jQuery 2.1.4 -->
      <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

      
      @stack('scripts')
      <!-- Bootstrap 3.3.5 -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
      <!-- AdminLTE App  correo doctora mercedez: mercedez@jmresearch.org  miércoles a la una-->
      <script src="{{asset('js/app.min.js')}}"></script>

      <script src="{{asset('assets/vendor/datepicker/bootstrap-datepicker.js')}}"></script>

      <script src="{{asset('fullcalendar/fullcalendar.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

      {!!Html::script('js/knockout-3.4.0.js')!!}
      @yield('js')
  </body>
</html>
