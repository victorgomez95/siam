@extends('layouts.admin')
@section('barra')
	@include('nurseSheets.forms.barra')
@endsection
@section('contenido')
	@include('alerts.errors')
  @include('alerts.request')
  <?php $message=Session::get('message')?>
  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
  @endif
	<div class="panel-body">
		 {!! Form::open(['route'=>'fecha_nursesheet',
			 'method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
			 <div class="form-group">
				 {!!Form::label('fecha_1','Buscar hojas de enfermería por fecha de creación:')!!}
				 {!! Form::date('fecha1',null, ['class'=>'form-control']) !!}
			 </div>
			 <button type="submit" class="btn btn-success">Buscar</button>
		 {!! Form::close() !!}
 </div>
 <div>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Fecha HDE</th>
        <th>Paciente</th>
				<th>Somatomería</th>
				<th>Hábitus exterior</th>
        <th>Medicamentos</th>
        <th>Medicamentos actuales</th>
			</thead>
			@foreach($nursesheets as $nursesheet)
        <?php
          $mysqli = new mysqli("localhost", "root", "", "siam");
          if ($mysqli->connect_errno) {
              echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          }
          $acentos = $mysqli->query("SET NAMES 'utf8'");
          //obtenemos el id de la cita
          $id_paciente=$nursesheet->id_paciente;
          //se obtienen los datos de esa cita, interesa el nombre del paciente y el doctor que lo está atendiendo
          $query = $mysqli->query("select * from pacients where id='$id_paciente'");
          $fila = $query->fetch_assoc();
          $pac = $fila['nombre'].' '.$fila['apaterno'].' '.$fila['amaterno'];
        ?>
			<tbody>
        <tr>
          <td>{{$nursesheet->fecha}}</td>
          <td><?php echo $pac; ?></td>
          <td>Somatometría</td>
  				<td>Hábitus exterior</td>
  				<td>Medicamentos</td>
          <td>Medicamentos actuales</td>
        </tr>
      </tbody>
		@endforeach
		</table>
    {!!$nursesheets->render()!!}
	</div>
@stop
