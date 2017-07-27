@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
    <h1>
    Listado de especialidades médicas <a href="especialidades/create"><button class="btn btn-success">Nuevo</button></a>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Especialidades</li>
    </ol>
    <br><br>
</section>
    
<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-6">
        @include('users.menu.search')
        <h4>Criterios de busqueda: 
            <span class="label label-info">Email     </span> &nbsp;
        </h4>
        <br>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead style="background:black;color:white">
                    <th># Id</th>
                    <th>Tipo</th>
                    <th>nombre</th>
                    <th>Descripcion</th>
                    <th style="text-align:center">Opciones</th>
                </thead>
                @foreach ($especialidad as $esp) 
                    <tr>
                        <td>{{ $esp->id_especialidades }}  </td>
                        <td>{{ $esp->tipo}}       </td>
                        <td>{{ $esp->nombre}}    </td>
                        <td>{{ $esp->Descripcion}} </td>
                        <td style="text-align:center">
                            <a href="" data-target="#modal-delete-{{$esp->id_especialidades}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-pencil"></i>&nbsp;Eliminar</button></a>
                            <a href="{{URL::action('EspecialidesController@edit',$esp->id_especialidades)}}"><button class="btn btn-info">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;Editar&nbsp;&nbsp;</button></a>
                        </td>
                    </tr>
                    @include('personal.especialidades.modal')
                @endforeach
            </table>
        </div>
        {{$especialidad->render()}}
    </div>
</div>



@endsection