@extends ('layouts.admin')
@section ('contenido')

	<section class="content-header">
      <h1>
        Registro de especialidades médicas
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

	{!!Form::open(array('url'=>'especialidades','method'=>'POST','autocomplete'=>'off'))!!}
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
					<label>Tipo de especialidad <font style="color:red">*</font></label>
					<select name="tipo" class="form-control" required>
						<option value="clinicas"			> 	Especialidades clínicas 					 </option>
						<option value="quirurgicas"			>	Especialidades quirúrgicas 					 </option>
						<option value="medico-quirurgicas" 	>	Especialidades médico-quirúrgicas 			 </option>
						<option value="diagnosticas" 		> 	Especialidades de laboratorio o diagnósticas </option>
					</select>
				</div>
                <div class="form-group">
                  	<label for="nombre">Nombre <font style="color:red">*</font></label>
					<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Ej. Alergología" required>
                </div>
				<div class="form-group">
					<label for="nombre">Descripción (opcional)</label>
					<input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="trata sobre el conocimiento de la patología producida por mecanismos de autoinmunidad">
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
					<div align="center">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
		{!!Form::close()!!}

	

	

@endsection