@extends ('layouts.admin')
@section ('contenido')

<style>
	/* Style the Image Used to Trigger the Modal */
	#myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	#myImg:hover {opacity: 0.7;}

	/* The Modal (background) */
	.modal1 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (Image) */
	.modal-content1 {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
	}

	/* Caption of Modal Image (Image Text) - Same Width as the Image */
	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}

	/* Add Animation - Zoom in the Modal */
	.modal-content1, #caption { 
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 50px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
		.modal-content {
			width: 100%;
		}
	}
</style>


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Usuario  {{ $enfermera->nombre}} {{ $enfermera->apellidos}}</h3>
		
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
	<a href="" data-target="#modal-update-{{$enfermera->id_enfermera}}" data-toggle="modal">
		Cambiar contraseña &nbsp;&nbsp;
		<i class="fa fa-unlock-alt" aria-hidden="true"></i>
	</a>
</div>



{!!Form::open(array( 'url'=>['menu/enfermera',$enfermera->id_enfermera],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
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
					<input type="text" name="nombre" class="form-control" value="{{$enfermera->nombre}}" placeholder="Nombre..." required>
                </div>
                <div class="form-group">
                  	<label for="nombre">Apellidos <font style="color:red">*</font></label>
					<input type="text" name="apellidos" class="form-control" value="{{$enfermera->apellidos}}" placeholder="Apellidos" required>
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
					<input type="text" name="direccion" class="form-control" value="{{$enfermera->direccion}}" placeholder="Direccion" required>
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
					<input type="tel" name="telefono" class="form-control" value="{{$enfermera->telefono}}" placeholder="Teléfono..." minlength="10" maxlength="10"  pattern="[0-9]{10}" required>
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
						<label for="nombre">Hora de entrada</label>
						<input type="text" name="hora_entrada" class="form-control" value="{{$enfermera->hora_entrada}}" >
					</div>
					<div class="form-group">
						<label for="nombre">Hora de salida</label>
						<input type="text" name="hora_salida" class="form-control" value="{{$enfermera->hora_salida}}" >
					</div>

					<div class="form-group" >
						<label for="fecha_nac" >Fecha de nacimiento <font style="color:red">*</font></label>
						<input type="date" name="fecha_nac" class="form-control" value="{{$enfermera->fecha_nac}}" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					</div>

					<div class="form-group">
						<label for="imagen">Foto</label>
						<input type="file" name="fotohash" class="form-control">
					</div>

				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div align="center" class="box-footer">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

		@if($enfermera->fotohash!='N/A' && $enfermera->fotohash!='')
		<div class="col-md-6">
			<div align="center"  class="col-lg-6 ">
				<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_users/'.$enfermera->fotohash)}}" width="150px" height="150px">
			</div>
			<div align="center"  class="col-lg-6 " style="margin-top:5%">
				<h3 class="title">Imagen seleccionada</h3>
			</div>
		</div>
		@endif

	</div>

	
	

	<div id="myModal" class="modal1">	
		<!-- The Close Button -->
		<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

		<!-- Modal Content (The Image) -->
		<img class="modal-content1" id="img01">

		<!-- Modal Caption (Image Text) -->
		<div id="caption"></div>
	</div>

<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementById('myImg');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function(){
		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	}

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
		modal.style.display = "none";
	}
</script>


@include('personal.enfermera.modal_pass')
@endsection