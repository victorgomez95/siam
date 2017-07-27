@extends ('layouts.admin')
@section ('contenido')

	<section class="content-header">
      <h1>
        Nuevo Enfermero (a)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Enfermero (a)</li>
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

	{!!Form::open(array('url'=>'menu/enfermera','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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

				<!--<div class="form-group">
					<label for="imagen">Foto</label>
					<input type="file" name="fotohash" class="form-control">
				</div>-->

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
				</div>

				<div class="box-header with-border">
					<h3 class="box-title">Información para inicio de sesiòn</h3>
				</div>
				<div class="box-body">
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
	</div>
	<div align="center" class="box-footer">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>

	

@endsection