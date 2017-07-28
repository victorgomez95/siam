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
                    <h2>Sin acceso</h2>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.banner -->
    
    
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
        <div align="center" class="error-page">
            <h2 class="headline text-yellow"> <i class="fa fa-warning text-yellow"></i></h2>

            <div class="error-content">
            <h3> Oops! Página sin acceso.</h3>
            <p>
                Ten en cuenta que para agregar información a este menu, debes tener registrados a tus <strong>Doctores</strong> y posteriormente ir a esta página.
                Mientras tanto, puedes volver a <a href="{{url('/doctor/clinica')}}"> Doctores </a>.
            </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
        </section>
        <!-- /.content -->
    

@endsection