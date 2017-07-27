<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-update-{{$medico->id_doctor}}">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#001453;color:white">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" style="color:white" >×</span>
                </button>
                <h4 class="modal-title">¿Has olvidado tu contraseña?</h4>
			</div>
			<div class="modal-body">
				Para restablecer la contraseña, introduce una nueva contraseña y una confirmación. <br> <font style="font-size:12px">(6 caracteres mínimo)</font>
				<br><br>
				<div class="row">	
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label for="Password">Nueva contraseña</label>
							<input type="password" name="password" class="form-control" value="{{old('password')}}" id="password" >
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label for="Password_confirm">Confirmar nueva contraseña</label>
							<input type="password" class="form-control" value="{{old('password_confirmation')}}" name="password_confirmation" id="password_confirmation" >
						</div>
					</div>
				</div>	

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<a  class="btn btn-primary" onclick="myFunction()">Confirmar</a>
			</div>
		</div>
	</div>
	<meta name="_token" content="{!! csrf_token() !!}" />
</div>

<script>
	var $_token=$("#_token").val();
	var dir=window.location.pathname;
	dir=dir.split("/");
	var urli="";
	for (var i = 0; i <dir.length-4; i++) {
		urli+=dir[i]+'/';
	}
		console.log(dir);
		console.log(urli);

		urli=urli+"contra";
	function myFunction() {
		var new_pass  = document.getElementById("password").value;
		var new_pass1 = document.getElementById("password_confirmation").value;
		var id_user	  = {{$medico->id_doctor}};

		if(new_pass.length < 6 ||  new_pass1.length < 6){
			alert("Debe ser minimo 6 caracteres");
		}else{
			var formData={
				"_token": "{{ csrf_token() }}",
				new_pass:new_pass,
				new_pass1:new_pass1,
				id_user:id_user
			};
			console.log(formData);
			$.ajax({
				type: "POST",
				cache:false,
				url: urli,
				data: formData,
				success: function (data) {
					$("#modal-update-"+{{$medico->id_doctor}}).modal("hide");
					alert(data);
				},
				error:function (data) {
					alert("Hubo un error... Inténtalo de nuevo");
					console.log(data.responseText);
				}
			});
		}

		

	}
</script>