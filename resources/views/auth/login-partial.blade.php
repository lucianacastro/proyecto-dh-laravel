<form class="form-horizontal login-form-container" method="POST" action="{{ route('login') }}">
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
            
            <!-- TODO mostrar errores en alerts -->

        </div>  
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-sm-12 control-label" placeholder="Ingresá tu e-mail"></label>

        <div class="col-sm-12">
            <input id="email" type="email" class="form-control input-login" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-sm-12 control-label"></label>

        <div class="col-sm-12">
            <input id="password" type="password" class="form-control input-login" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12 pull-right">
            <button type="submit" class="btn btn-primary login">
                iniciar sesión
            </button>
        </div>

        <div class="col-sm-12 pull-right">
            <a class="btn btn-link forget" href="{{ route('password.request') }}">
                Olvidaste tu contraseña?
            </a>
            <a class="btn btn-link" href="{{ url('/register') }}">
                Crear una nueva cuenta
            </a>
        </div>
        
    </div>
</form>