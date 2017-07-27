@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Pacientes <a href="pacient/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('pacients.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Acción</th>
                    </thead>
                    @foreach ($pacientes as $usu)
                        <tr>
                            <td>{{ $usu->id}}</td>
                            <td>{{ $usu->nombre}}</td>
                            <td>{{ $usu->apaterno}}</td>
                            <td>
                                <a href="{{URL::action('PacientController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    @include('pacients.modal')
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
        </div>
    </div>
@endsection
