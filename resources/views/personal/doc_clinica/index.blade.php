@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
    <h1>Listado de doctores <a href="clinica/create"><button class="btn btn-success">Nuevo</button></a></h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Colaboladores</li>
    </ol>
    <br><br>
</section>

<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-6">
        @include('personal.doc_clinica.search')
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
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>cedula</th>
                     <th style="text-align:center">Opciones</th>
                </thead>
                @foreach ($doc_clinica as $doc) 
                    <tr>
                        <td style="text-align:center">
                            @if($doc->fotohash!='N/A' && $doc->fotohash!='')
                                <img alt="Imagen de usuario" class="img-rounded" src="{{asset('assets/img_users/'.$doc->fotohash)}}" style="width:50px">
                            @elseif ($doc->sexo=='Hombre')
                                <img alt="User Avatar" class="img-circle" src="{{asset('assets/img_predeterminadas/hombre.png')}}"   style="width:50px">
                            @else
                                <img alt="User Avatar" class="img-circle" src="{{asset('assets/img_predeterminadas/mujer.png')}}"    style="width:50px">
                            @endif
                        </td>
                        <td>{{ $doc->nombre}}          </td>
                        <td>{{ $doc->apellidos}}       </td>
                        <td>{{ $doc->telefono}}        </td>
                        <td>{{ $doc->direccion}}        </td>
                        <td>{{ $doc->cedula}}          </td>
                        <td style="text-align:center">
                            <a href="" data-target="#modal-delete-{{$doc->id_doctor}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-pencil"></i>&nbsp;Eliminar</button></a>
                            <a href="{{URL::action('doc_ClinicaController@edit',$doc->id_doctor)}}"><button class="btn btn-info">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;Editar&nbsp;&nbsp;</button></a>
                            <a href="{{URL::action('doc_ClinicaController@show',$doc->id_doctor)}}"><button class="btn btn-secondary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;Ver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                        </td>
                    </tr>
                    @include('personal.doc_clinica.modal')
                @endforeach
            </table>
            
        </div>
        {{$doc_clinica->render()}}
    </div>
</div>



@endsection