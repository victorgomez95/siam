@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Usuario {{ $user->nombre}} </h3>
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

<div align="right"> 
	<a href="" data-target="#modal-update-{{$user->id}}" data-toggle="modal">
		Modificar Acceso &nbsp;&nbsp;
		<i class="fa fa-unlock-alt" aria-hidden="true"></i>
	</a>
</div>

{!!Form::open(array( 'url'=>['users/mi_cuenta',$user->id],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}

<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre <font style="color:red">*</font></label>
				<input type="text" name="name" class="form-control" value="{{ $user->name}}"  required>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="anio_fundacion">apellidos <font style="color:red">*</font></label>
				<input type="text" name="apellidos" class="form-control" value="{{ $user->apellidos}}" >
			</div>
		</div>
	

		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono">Teléfono <font style="color:red">*</font></label>
            	<input type="tel" name="telefono" class="form-control" value="{{ $user->telefono }}" minlength="10" maxlength="10"  pattern="[0-9]{10}">
            </div>
		</div>
		

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono">Dirección <font style="color:red">*</font></label>
            	<input type="text" name="direccion" class="form-control" value="{{$user->direccion}}" >
            </div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Sexo <font style="color:red">*</font></label>
				<select name="sexo" class="form-control">
					@if($user->sexo == 'Hombre')
						<option value="Hombre" selected>Hombre</option>
						<option value="Mujer">Mujer</option>
					@else
						<option value="Hombre"> Hombre	</option>
						<option value="Mujer" selected>	Mujer</option>
					@endif
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group" >
				<label for="fecha_nac" >Fecha de nacimiento <font style="color:red">*</font></label>
				<input type="date" name="fecha_nac" class="form-control" value="{{$user->fecha_nac}}" data-provide="datepicker" data-date-format="yyyy-mm-dd" required>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Foto </label>
				<input type="file" name="fotohash" class="form-control">
			</div>
		</div>

		@if($user->fotohash!='N/A' && $user->fotohash!='' && $user->fotohash!='avatar.png')
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div align="center"  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_users/'.$user->fotohash)}}" width="300px" height="300px">
				</div>
				<div align="center"  class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:5%">
					<h3 class="title">Imagen seleccionada</h3>
				</div>
			</div>
		@endif
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<br>
			<div align="center" class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
	</div>

@include('users.mi_cuenta.modal_pass')
@endsection