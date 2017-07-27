@extends ('layouts.admin')
@section ('contenido')

	<section class="content-header">
      <h1>
        Nuevo Usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Colaboladores</li>
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

	{!!Form::open(array('url'=>'users/menu','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
					<input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Nombre..." required>
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

				<div class="form-group" >
					<label for="fecha_nac" >Fecha de nacimiento <font style="color:red">*</font></label>
					<input type="date" name="fecha_nac" class="form-control" value="{{old('fecha_nac')}}" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
				</div>

				<div class="form-group">
					<label for="imagen">Foto</label>
					<input type="file" name="fotohash" class="form-control">
				</div>

				<div class="form-group">
					<label for="cedula">Cédula profesional</label>
					<input type="text" name="cedula" class="form-control" value="{{old('cedula')}}" minlength="8" maxlength="8"  pattern="[0-9]{8}">
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
						<label for="telefono">Teléfono <font style="color:red">*</font></label>
						<input type="tel" name="telefono" class="form-control" value="{{old('telefono')}}" placeholder="Teléfono..." minlength="10" maxlength="10"  pattern="[0-9]{10}" required>
					</div>
					<div class="form-group">
						<label>Tipo de usuario <font style="color:red">*</font></label>
						<select name="tipo_usuario" class="form-control" required>
							<option value="Doctor"> 	   Doctor (a) 		</option>
							<option value="Enfermero">	   Enfermero (a) 	</option>
							<option value="Recepcionista"> Recepcionista 	</option>
							<option value="Administrador_emp"> Administrador 	</option>
						</select>
					</div>

					<div class="form-group">
						<label for="nombre">Especialidad</label>
						<input type="text" name="especialidad" class="form-control" value="{{old('especialidad')}}" >
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="box box-danger">
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