@extends ('layouts.admin')

@section ('contenido')

<style>

.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
    max-height:200px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%;
    max-width:200px;
}

@media (max-width:768px)
{
        
    .fb-profile-text>h1{
        font-weight: 700;
        font-size:16px;
    }

    .fb-image-profile
    {
        margin: -45px 10px 0px 25px;
        z-index: 9;
        width: 20%; 
    }
}
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


@if($resCompany==false)
<div class="banner1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-sm-6 col-xs-12">
                <h2 align="center" style="padding-bottom:10%">Registra tu Clínica</h2>
            </div>
            <div class="col-lg-6  col-sm-6 col-xs-12" align="center">
                <a href="company/create">
                    <button type="button" class="btn btn-primary btn-circle btn-xl button"><span><i class="fa fa-plus"></i></span></button>
                </a>
            </div>
            </div>
    </div>
</div>
@endif
@if($resCompany==true)
<div class="row">
    <div class="col-md-8">
        <div class="fb-profile">

            <div style="position:absolute;top:10px;right:20px">
                <a href="{{URL::action('CompanyController@edit',$company->id_company)}}"><button class="btn btn-info">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;Editar&nbsp;&nbsp;</button></a>
                <a href="" data-target="#modal-delete-{{$company->id_company}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-pencil"></i>&nbsp;Eliminar</button></a>
            </div>

            <img align="left" class="fb-image-lg" src="{{asset('assets/img/geometric.jpg')}}" alt="Profile image example"/>

            @if($company->fotohash!='N/A' && $company->fotohash!='')
                <img align="left" class="fb-image-profile thumbnail" id="myImg" alt="Clínica: {{$company->nombre}}" src="{{asset('assets/img_comp/'.$company->fotohash)}}" style="width:200px">
            @else
                <img align="left" class="fb-image-profile thumbnail" alt="User profile picture" src="{{asset('assets/img_predeterminadas/clinica.jpg')}}" >
            @endif

            <div class="fb-profile-text">
                <h3 class="profile-username">{{$company->nombre}}</h3>
                <b>Director Ejecutivo</b> <a class="pull-right"><strong>{{$company->encargado}}</strong></a><br>
                <b>Fundación</b> <a class="pull-right">{{$company->anio_fundacion}}</a><br>
                
                    <br><br> 
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Información específica</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
                            <p class="text-muted">{{$company->ubicacion}}</p>
                            <hr>

                            <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
                            <p class="text-muted">{{$company->telefono}}</p>
                            <hr>

                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                            <p class="text-muted">{{$company->email}}</p>
                            <hr>

                            <strong><i class="fa fa-circle margin-r-5"></i> Misión</strong>
                            <p class="text-muted">{{$company->mision}}</p>
                            <hr>

                            <strong><i class="fa fa-circle margin-r-5"></i> Visión</strong>
                            <p class="text-muted">{{$company->vision}}</p>
                            
                        </div>
                        <!-- /.box-body -->
                    </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                <img class="img-circle" src="{{ asset('assets/img/avatar.png') }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{!!Auth::user()->nombre!!}</h3>
                <h5 class="widget-user-desc">Administrador</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">Colaboladores <span class="pull-right badge bg-blue">10</span></a></li>
                    <li><a href="#">Médicos <span class="pull-right badge bg-aqua">15</span></a></li>
                    <li><a href="#">Consultas <span class="pull-right badge bg-green">124</span></a></li>
                </ul>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Uploads</span>
                <span class="info-box-number">13,648</span>
            </div>
        </div>

    </div>
</div>
@include('company.modal')   

@endif

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




    <style>
        .banner1 {
            padding: 100px 0;
            color: #f8f8f8;
            background: url("{{ asset('assets/img/office.jpg') }}") no-repeat center center;
            background-size: cover;
        }

        .banner1 h2 {
            margin: 0;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.6);
            font-size: 3em;
        }


        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            background:black;
            color:white;
            border-style:none;
            padding: auto;
            font-size: 20px;
            border-radius: 100%;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }  

    </style>

    


        
@endsection