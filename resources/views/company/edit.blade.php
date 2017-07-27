@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
	<h1>
		Editar Clínica - {{ $company->nombre}} 
	</h1>
	<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active">Clínica</li>
	<li class="active">Editar</li>
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

{!!Form::open(array( 'url'=>['company',$company->id_company],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
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
					<label for="nombre">Nombre <font style="color:red">*</font></label>
					<input type="text" name="nombre" class="form-control" value="{{ $company->nombre}}" placeholder="Ej. Mont&Go Software S.A de C.V" required>
				</div>
				<div class="form-group">
					<label for="encargado">Director General <font style="color:red">*</font></label>
					<input type="text" name="encargado" class="form-control" value="{{ $company->encargado}}" placeholder="Ej. Juan Vivar" required>
				</div>
				<div class="form-group">
					<label for="mision">Misión <font style="color:red">*</font></label>
					<textarea class="form-control" rows="5" id="mision" name="mision" value="{{$company->mision}}" required>
						<?php echo $company->mision ?>
					</textarea >
				</div>
				<div class="form-group">
					<label for="vision">Visión <font style="color:red">*</font></label>
					<textarea class="form-control" rows="5" id="vision" name="vision" value="{{$company->vision}}" required>
						<?php echo $company->vision ?>
					</textarea>
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
					<label for="anio_fundacion">Año de fundación <font style="color:red">*</font></label>
					<input type="text" name="anio_fundacion" class="form-control" value="{{ $company->anio_fundacion}}" maxlength="4" required>
				</div>
				<div class="form-group">
					<label for="ubicacion">Ubicación <font style="color:red">*</font></label>
					<input type="text" name="ubicacion" class="form-control" value="{{ $company->ubicacion}}" required>
				</div>
				<div class="form-group">
					<label for="telefono">Teléfono <font style="color:red">*</font></label>
					<input type="tel" name="telefono" class="form-control" value="{{$company->telefono}}" minlength="10" maxlength="10"  pattern="[0-9]{10}" required>
				</div>
				<div class="form-group">
					<label for="telefono">Email <font style="color:red">*</font></label>
					<input type="email" name="email" class="form-control" value="{{$company->email}}" required>
				</div>
				<div class="form-group">
					<label for="imagen">Foto </label>
					<input type="file" name="fotohash" class="form-control">
				</div>
				@if($company->fotohash!='N/A' && $company->fotohash!='')
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div align="center"  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_comp/'.$company->fotohash)}}" width="300px" height="300px">
					</div>
					<div align="center"  class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:5%">
						<h3 class="title">Imagen seleccionada</h3>
					</div>
				</div>
				@else
					<br><br>
					<div align="center" class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				@endif
			</div>
		</div>
		
	</div>
	@if($company->fotohash!='N/A' && $company->fotohash!='')
	<div align="center" class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>
	@endif
</div>


@endsection