<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-update-{{$user->id}}">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#001453;color:white">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true" style="color:white" >×</span>
                </button>
                <h4 class="modal-title">Cambiar de usuario</h4>
			</div>
			<div class="modal-body">
				Para restablecer tu nuevo usuario, introduce el nuevo Email para iniciar sesión, asi mismo introduce las nuevas contraseñas.
				<br><br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="Password">Correo</label>
							<input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" >
						</div>
					</div>

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
				<button  class="btn btn-primary" onclick="myFunction()">Confirmar</button>
			</div>
		</div>
	</div>

</div>

<script>
	console.log("entro");
	function myFunction() {
		console.log("entro1");
		var pass_user = document.getElementById("password_user").value;
		var new_pass  = document.getElementById("password").value;
		var new_pass1 = document.getElementById("password_confirmation").value;

		alert(
			"pass_user => "+pass_user+
			"new_pass => "+new_pass+
			"new_pass1 => "+new_pass1);

	}
</script>