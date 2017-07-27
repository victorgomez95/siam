@extends ('layouts.admin')
@section('barra')
	@include('nurseSheets.forms.barra')
@endsection
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Pacientes</h3>
            @include('pacients.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
												<th>Segundo apellido</th>
												<th>CURP</th>
                        <th>Acción</th>
                    </thead>
                    @foreach ($pacientes as $usu)
                        <tr>
                            <td>{{ $usu->nombre}}</td>
                            <td>{{ $usu->apaterno}}</td>
														<td>{{ $usu->amaterno}}</td>
														<td>{{ $usu->curp}}</td>
                            <td>
															{!!link_to_route('asignar_hde', $title = 'HDE', $parameters = $usu->id,
          											$attributes = ['class'=>'btn btn-success','style'=>"color:#FFFFFF"])!!}
                            </td>
                        </tr>
                    @include('nurseSheets.modal')
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
        </div>
    </div>
@endsection
