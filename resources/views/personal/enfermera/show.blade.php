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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

            @if($employee->fotohash!='N/A' && $employee->fotohash!='')
            <div align="center">
              <img class="img-rounded" id="myImg" alt="Usuario: {{$employee->name}}" src="{{asset('assets/img_users/'.$employee->fotohash)}}" style="width:223px">
            </div>
            @elseif ($employee->sexo=='Hombre')
                <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="{{asset('assets/img_predeterminadas/hombre.png')}}">
            @else
                <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="{{asset('assets/img_predeterminadas/mujer.png')}}" >
            @endif
              

              <h3 class="profile-username text-center">{{$employee->name}} {{$employee->apellidos}}</h3>

              <p class="text-muted text-center">{{$employee->tipo_usuario}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nombre</b> <a class="pull-right"><strong>{{$employee->name}} </strong></a>
                  <br>
                  <b>Apellidos</b> <a class="pull-right"><strong>{{$employee->apellidos}}</strong></a>
                </li>
                <li class="list-group-item">
                  <b>Sexo</b> <a class="pull-right">{{$employee->sexo}}</a>
                </li>
                <li class="list-group-item">
                  <b>Dirección</b> <a class="pull-right">{{$employee->direccion}}</a>
                </li>
                <li class="list-group-item">
                  <b>Fecha de nacimiento</b> <a class="pull-right">{{$employee->fecha_nac}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tipo de usuario</b> 
                  <a class="pull-right"><span class="label label-success">{{$employee->tipo_usuario}}</span></a>
                </li>
                <li class="list-group-item">
                  <b>Especialidad</b>
                  <a class="pull-right"><span class="label label-primary">{{$employee->especialidad}}</span></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Información específica</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 
              <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
              <p class="text-muted">{{$employee->direccion}}</p>
              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
              <p class="text-muted">{{$employee->telefono}}</p>
              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
              <p class="text-muted">{{$employee->email}}</p>
              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i> Fecha de nacimiento</strong>
              <p class="text-muted">{{$employee->fecha_nac}}</p>
              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i> Fecha de registro</strong>
              <p class="text-muted">{{$employee->fecha_nac}}</p>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>

<div id="myModal" class="modal1">
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
  <img class="modal-content1" id="img01">
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


@endsection