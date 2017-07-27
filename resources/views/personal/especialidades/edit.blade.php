@extends ('layouts.admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar especialidad médica</h3>
		
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


@include('alerts.errors')
@include('alerts.request')

{!!Form::open(array( 'url'=>['users/menu',$employee->id],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
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
					<label>Sexo <font style="color:red">*</font></label>
					<select name="sexo" class="form-control">
						@if($especialidad->tipo == 'clinicas')
							<option value="clinicas"			selected> 	Especialidades clínicas 					 </option>
							<option value="quirurgicas"					>	Especialidades quirúrgicas 					 </option>
							<option value="medico-quirurgicas" 			>	Especialidades médico-quirúrgicas 			 </option>
							<option value="diagnosticas" 				> 	Especialidades de laboratorio o diagnósticas </option>
						@elseif($especialidad->tipo == 'quirurgicas')
							<option value="clinicas"					> 	Especialidades clínicas 					 </option>
							<option value="quirurgicas"			selected>	Especialidades quirúrgicas 					 </option>
							<option value="medico-quirurgicas" 			>	Especialidades médico-quirúrgicas 			 </option>
							<option value="diagnosticas" 				> 	Especialidades de laboratorio o diagnósticas </option>
						@elseif($especialidad->tipo == 'medico-quirurgicas')
							<option value="clinicas"					> 	Especialidades clínicas 					 </option>
							<option value="quirurgicas"					>	Especialidades quirúrgicas 					 </option>
							<option value="medico-quirurgicas" 	selected>	Especialidades médico-quirúrgicas 			 </option>
							<option value="diagnosticas" 				> 	Especialidades de laboratorio o diagnósticas </option>
						@else
							<option value="clinicas"					> 	Especialidades clínicas 					 </option>
							<option value="quirurgicas"					>	Especialidades quirúrgicas 					 </option>
							<option value="medico-quirurgicas" 			>	Especialidades médico-quirúrgicas 			 </option>
							<option value="diagnosticas" 		selected> 	Especialidades de laboratorio o diagnósticas </option>
						@endif
					</select>
				</div>

                <div class="form-group">
					<label for="nombre">Nombre <font style="color:red">*</font></label>
					<input type="text" name="nombre" class="form-control" value="{{$especialidad->nombre}}" placeholder="Nombre..." required>
                </div>
                <div class="form-group">
                  	<label for="nombre">descripcion <font style="color:red">*</font></label>
					<input type="text" name="descripcion" class="form-control" value="{{$especialidad->descripcion}}" placeholder="Apellidos">
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
					<br><br><br>
					<div align="center" class="box-footer">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection