<div class="background background-home"></div>
<div class="container">

	<div class="row">
		<div class="col-sm-offset-7 col-sm-4">

			<form class="form-horizontal login-form-container" method="post" action="/login">
				{{ csrf_field() }}

			  	<div class="form-group">
					<div class="col-sm-12">
						<div class="logo">
							<img src="images/logo_TeamUp-sm.png">
						</div>

						<div class="home-text">
							<div id="number_users"></div>
							La red social que te permite armar tu equipo, reservar canchas cerca de tu casa o simplemente hablar de lo que te apasiona: el fútbol!
						</div>
						
						
						@if (!empty($errors))
							@foreach($errors as $fieldName => $message)
							<div class="alert alert-danger" role="alert">{{$message}}</div>
							@endforeach
						@endif

					</div>	
				</div>

				<div class="form-group {{!empty($errors) ? $formLogin->getErrorCssClass(@$errors['email']) : '' }}" >
			    	<label for="inputEmail3" class="col-sm-4 control-label"></label>
			    	<div class="col-sm-12">
				   		<input type="email" class="form-control" id="inputEmail3" placeholder="E-mail" name="email" 
				   		value="{{@$_POST['email'] ?: $formLogin->getRememberedLoginEmail()}}">
			    	</div>
				</div>



			  <div class="form-group {{!empty($errors) ? $formLogin->getErrorCssClass(@$errors['password']) : '' }}" >
			    <label for="inputPassword3" class="col-sm-4 control-label"></label>
			    <div class="col-sm-12">
			      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Contraseña">
			    </div>
			  </div>


			  <div class="form-group">
			    <div class="col-sm-12">
			      <div class="checkbox">
			        <label class="color-check">
			          <input type="checkbox" name="remember_email"
				          {{$formLogin->getRememberedLoginEmail() ? 'checked="checked"' : '' }}
				          > Recordarme
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-12">
			      <button type="submit" class="btn btn-success login-button pull-right">Iniciar sesión</button>
			    </div>
			  </div>

			</form>

		    <div class="row">
		      <label class="col-sm-12">
		        <a class="links" href="">Olvidé mi contraseña</a>
		      </label>
		    </div>
	    </div>
	</div>
</div>
