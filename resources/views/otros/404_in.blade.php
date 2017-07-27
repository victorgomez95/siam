@extends ('layouts.admin')

@section ('contenido')

  {!! Html::style('assets/css/bootstrap.min.css') !!}
  {!! Html::style('assets/css/landing-page.css') !!}
  {!! Html::style('assets/css/bootstrap.css') !!}
  {!! Html::style('assets/css/miStyle.css') !!}
  <!-- Custom Fonts -->
  {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}
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
                Mientras tanto, puedes volver a <a href="{{url('/company')}}">la página principal</a>.
            </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
        </section>
        <!-- /.content -->
    

@endsection