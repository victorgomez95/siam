@extends ('layouts.admin')
@section ('contenido')

	<section class="content-header">
      <h1>
        Nuevo asistente
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Asistente</li>
		<li class="active">Agregar</li>
      </ol>
	  <br><br>
    </section>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>


	{!!Form::open(array('url'=>'menu/asistente','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}
	<div class="row">

		<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Información General</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
					<label for="nombre">Nombre (s) <font style="color:red">*</font></label>
					<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre..." required>
                </div>
                <div class="form-group">
                  	<label for="nombre">Apellidos <font style="color:red">*</font></label>
					<input type="text" name="apellidos" class="form-control" value="{{old('apellidos')}}" placeholder="Apellidos" required>
                </div>
				<div class="form-group">
					<label>Sexo <font style="color:red">*</font></label>
					<select name="sexo" class="form-control">
						<option value="Hombre"> Hombre 	</option>
						<option value="Mujer">  Mujer 	</option>
					</select>
				</div>
				<div class="form-group">
					<label for="nombre">Dirección <font style="color:red">*</font></label>
					<input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Direccion" required>
				</div>

				<div class="form-group">
					<label for="escolaridad">Escolaridad</label>
					<select name="escolaridad" class="form-control">
						<option value="Secundaria"> 	Secundaria 	  </option>
						<option value="Preparatoria">   Preparatoria  </option>
					</select>
				</div>

				<div class="form-group">
					<label for="telefono">Teléfono <font style="color:red">*</font></label>
					<input type="tel" name="telefono" class="form-control" value="{{old('telefono')}}" placeholder="Teléfono..." minlength="10" maxlength="10"  pattern="[0-9]{10}" required>
				</div>

				<div class="form-group">
					<label for="imagen">Foto</label>
					<input type="file" name="fotohash" class="form-control">
				</div>

				@if($tipo=="false")
					<div class="form-group">
						<label for="telefono">Atiende al doctor:  <font style="color:red">*</font></label>
						<input type="hidden" name="id_doctor[]" class="form-control" value="{{$doctor_particular->id_doctor}}"> 
						<input type="text" class="form-control" value="{{$doctor_particular->nombre}} {{$doctor_particular->apellidos}}"  disabled>
					</div>
				@else
					<div class="form-group">
						<label>Atender al doctor: </label>
						<select name="pdoctor_clinica" id="pdoctor_clinica" class="form-control selectpicker" data-live-search="true">
							<@foreach($doctor_clinica as $doctor_clinica)
								<option value="{{$doctor_clinica->id_doctor}}_{{$doctor_clinica->nombre}}_{{$doctor_clinica->apellidos}}"> {{$doctor_clinica->nombre}} {{$doctor_clinica->apellidos}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
					</div>

					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#014AB6;color:white">
							<th>Eliminar</th>
							<th>Tipo</th>
							<th>Especialidad</th>
						</thead>
						<tbody>
						
						</tbody>
					</table>

					@push('scripts')
						<script>
							$(document).ready(function(){
								$('#bt_add').click(function(){
									agregar();
								});
							});

							var cont=0;
							
							function agregar(){
								datosDoctor = document.getElementById('pdoctor_clinica').value.split('_');
								var id_doctor	=  datosDoctor[0];
								var nombre 		=  datosDoctor[1];
								var apellidos	=  datosDoctor[2];

								console.log("id_doctor -> "+id_doctor);
								console.log("nombre -> "+nombre);
								console.log("apellidos -> "+apellidos);
					
								var fila = "<tr class='selected' id='fila"+cont+"'>"+
												"<td><button type='button' class='btn btn-warning' onclick='eliminar("+cont+")'>X</button></td>"+
												"<td>"+
													"<input type='hidden' name='id_doctor[]'  		value='"+id_doctor+"' >"+nombre+" </td>"+
												"<td>"+apellidos+"</td>"+
											"</tr>";
								cont = cont+1;
								$("#detalles").append(fila);	
							}

							function eliminar(index){
								$("#fila" + index).remove();
							}

						</script>
					@endpush

				@endif
				
				

              </div>
          </div>
        </div>

		

		<div class="col-md-6">
			<div class="box box-success">

				<div class="box-header with-border">
					<h3 class="box-title"></h3>
				</div>

				<div class="box-body">
					<div class="form-group">
						<label for="telefono">Fecha de nacimiento <font style="color:red">*</font></label>
						<input type="date" name="fecha_nac" class="form-control" value="{{old('fecha_nac')}}"  required>
					</div>

					<div class="form-group">
						<label for="nombre">Hora de entrada</label>
						<input type="text" name="hora_entrada" class="form-control" value="{{old('hora_entrada')}}" >
					</div>
					<div class="form-group">
						<label for="nombre">Hora de salida</label>
						<input type="text" name="hora_salida" class="form-control" value="{{old('hora_salida')}}" >
					</div>
				
				<div class="box-header with-border">
					<h3 class="box-title">Información para inicio de sesiòn</h3>
				</div>

					<div class="form-group">
						<label for="email">Email <font style="color:red">*</font></label>
						<input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email..." required>
					</div>
					<div class="row">
					
						<div class="col-lg-6 ">
							<div class="form-group">
								<label for="Password">Contraseña <font style="color:red">*</font></label>
								<input type="password" name="password" class="form-control" value="{{old('password')}}" required>
							</div>
						</div>

						<div class="col-lg-6 ">
							<div class="form-group">
								<label for="Password_confirm">Confirmar Contraseña <font style="color:red">*</font></label>
								<input type="password" class="form-control" value="{{old('password_confirmation')}}" name="password_confirmation" id="password-confirm" required>
							</div>
						</div>
					</div>
				
			</div>
		</div>
	</div>
	<div align="center" class="box-footer">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>


	<div class="container">
		<div class="row">
			<div class='col-sm-6'>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker3'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(function () {
					$('#datetimepicker3').datetimepicker({
						format: 'LT'
					});
				});
			</script>
		</div>
	</div>
	

@endsection