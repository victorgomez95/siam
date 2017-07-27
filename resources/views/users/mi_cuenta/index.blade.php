@extends ('layouts.admin')

@section ('contenido')


<div class="row">
        <section class="content-header">
            <h1>
              Mi perfil
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li class="active">Mi cuenta</li>
            </ol>
            <br><br>
        </section>
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              @if($user->fotohash!='N/A' && $user->fotohash!='' && $user->fotohash!='avatar.png')
                <div align="center">
                  <img  class="img-rounded img-responsive" alt="Foto de perfil" src="{{asset('assets/img_users/'.$user->fotohash)}}" width="200px" height="200px">
                </div>
              @else
                <img class="profile-user-img img-responsive img-circle"  alt="Foto de perfil" src="{{asset('assets/img/avatar.png')}}" >
              @endif

              <h3 class="profile-username text-center">{{$user->name}}</h3>


              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Fecha de registro</b> <a class="pull-right"><strong>{{$user->created_at}}</strong></a>
                </li>

                <li class="list-group-item">
                  <b>Editar</b> <a class="pull-right">
                    <div align="right">
                        <a href="{{URL::action('userLogController@edit',$user->id)}}"><button class="btn btn-info">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;Editar&nbsp;&nbsp;</button></a>
                    </div>
                  </a>
                </li>

                <li class="list-group-item">
                  <b>Eliminar</b> <a class="pull-right">
                    <div align="right">
                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-pencil"></i>&nbsp;Eliminar</button></a>
                    </div>
                  </a>
                </li>

              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Información específica</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 
              <strong><i class="fa fa-circle margin-r-5"></i> Nombre</strong>
              <p class="text-muted">{{$user->name}}</p>
              <hr>

              <strong><i class="fa fa-circle margin-r-5"></i> Apellidos</strong>
              <p class="text-muted">{{$user->apellidos}}</p>
              <hr>

              <strong><i class="fa fa-circle margin-r-5"></i> Sexo</strong>
              <p class="text-muted">{{$user->sexo}}</p>
              <hr>

              <strong><i class="fa fa-circle margin-r-5"></i> Fecha de nacimiento</strong>
              <p class="text-muted">{{$user->fecha_nac}}</p>
              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
              <p class="text-muted">{{$user->telefono}}</p>
              <hr>

              <strong><i class="fa fa-circle margin-r-5"></i> Dirección</strong>
              <p class="text-muted">{{$user->direccion}}</p>
              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
              <p class="text-muted">{{$user->email}}</p>
              <hr>

              <strong><i class="fa fa-circle margin-r-5"></i> Tipo de usuario</strong>
              <p class="text-muted">Administrador</p>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>



    @include('users.mi_cuenta.modal')


        
@endsection