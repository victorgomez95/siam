@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Paciente</h3>
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

{!!Form::open(['route'=>'pacient.store', 'method'=>'POST','files' => true, 'autocomplete'=>'off'])!!}
{{Form::token()}}
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('nombre_1','Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingrese nombre de nuevo paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
			{!!Form::label('apaterno_1','Primer apellido:')!!}
			{!!Form::text('apaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido paterno de paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
			{!!Form::label('amaterno_1','Segundo apellido:')!!}
			{!!Form::text('amaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido materno de paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('sexo_1','Sexo:')!!}
			<select class=" form-control ">
				<option value="M">Masculino</option>
				<option value="F">Femenino</option>
			</select>
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('fecha_nac_1','Fecha de nacimiento:')!!}
			{!!Form::date('fecha_nac',null,['class'=>'form-control', 'placeholder'=>'Ingrese fecha de nacimiento de paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('curp_1','CURP:')!!}
			{!!Form::text('curp',null,['class'=>'form-control', 'placeholder'=>'Ingrese CURP de paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('nacionalidad_1','Nacionalidad:')!!}
			{!!Form::text('nacionalidad',null,['class'=>'form-control', 'placeholder'=>'Ingrese Nacionalidad de paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('calle_1','Calle:')!!}
			{!!Form::text('calle',null,['class'=>'form-control', 'placeholder'=>'Ingrese la calle del domicilio del paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('num_ext_1','Número exterior:')!!}
			{!!Form::number('num_ext',null,['class'=>'form-control', 'placeholder'=>'Número exterior'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('num_int_1','Número interior (opcional):')!!}
			{!!Form::number('num_int',null,['class'=>'form-control', 'placeholder'=>'Número interior'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('cp_1','Código postal (opcional):')!!}
			{!!Form::text('cp',null,['class'=>'form-control', 'placeholder'=>'Ingrese código postal'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('colonia_1','Colonia:')!!}
			{!!Form::text('colonia',null,['class'=>'form-control', 'placeholder'=>'Ingrese colonia'])!!}
		</div> 
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('localidad_1','localidad (opcional):')!!}
			{!!Form::text('localidad',null,['class'=>'form-control', 'placeholder'=>'Ingrese localidad'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('municipio_1','Municipio:')!!}
			{!!Form::text('municipio',null,['class'=>'form-control', 'placeholder'=>'Ingrese municipio'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('estado_1','Estado:')!!}

			<select class=" form-control selectpicker" data-live-search="true">
					<option value="Aguascalientes">			Aguascalientes</option>
					<option value="Baja California">		Baja California</option>
					<option value="Baja California Sur">	Baja California Sur</option>
					<option value="Campeche">				Campeche</option>
					<option value="Coahuila de Zaragoza">	Coahuila de Zaragoza</option>
					<option value="Colima">					Colima</option>
					<option value="Chiapas">				Chiapas</option>
					<option value="Chihuahua">				Chihuahua</option>
					<option value="Distrito Federal">		Distrito Federal</option>
					<option value="Durango">				Durango</option>
					<option value="Guanajuato">				Guanajuato</option>
					<option value="Guerrero">				Guerrero</option>
					<option value="Hidalgo">				Hidalgo</option>
					<option value="Jalisco">				Jalisco</option>
					<option value="CDMX">					CDMX</option>
					<option value="Michoacán de Ocampo">	Michoacán de Ocampo</option>
					<option value="Morelos">				Morelos</option>
					<option value="Nayarit">				Nayarit</option>
					<option value="Nuevo León">				Nuevo León</option>
					<option value="Oaxaca">					Oaxaca</option>
					<option value="Puebla">					Puebla</option>
					<option value="Querétaro">				Querétaro</option>
					<option value="Quintana Roo">			Quintana Roo</option>
					<option value="San Luis Potosí">		San Luis Potosí</option>
					<option value="Sinaloa">				Sinaloa</option>
					<option value="Sonora">					Sonora</option>
					<option value="Tabasco">				Tabasco</option>
					<option value="Tamaulipas">				Tamaulipas</option>
					<option value="Tlaxcala">				Tlaxcala</option>
					<option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
					<option value="Yucatán">				Yucatán</option>
					<option value="Zacatecas">				Zacatecas</option>
			</select>
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('telefono_casa_1','Telefono de casa (opcional):')!!}
			{!!Form::number('telefono_casa',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono de casa'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('telefono_celular_1','Telefono celular (opcional):')!!}
			{!!Form::number('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono celular'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('telefono_oficina_1','Telefono de oficina (opcional):')!!}
			{!!Form::number('telefono_oficina',null,['class'=>'form-control', 'placeholder'=>'Ingrese telefono de oficina'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('correo_1','Correo (opcional):')!!}
			{!!Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Ingrese correo del paciente'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::label('kilos_1','Peso:')!!}
			{!!Form::text('kilos',null,['class'=>'form-control', 'placeholder'=>'Ingrese peso de paciente en kilos ej. "64.5" '])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
			<button class="btn btn-primary " type="submit">Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="btn  btn-danger" type="reset">Cancelar</button>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection
