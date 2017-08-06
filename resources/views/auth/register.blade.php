@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-6">
            <div class="register-img col-sm-12">
                
                <div class="icon-register-container ball">
                    <img class="register-icon ball" src="images/1_icono_pelota.png"/>
                    <div class="text-register-icon">Armá tu equipo con amigos o conocidos de tu red.</div>
                </div>
                <div class="icon-register-container field">
                    <img class="register-icon field" src="images/2_icono_cancha.png"/>
                    <div class="text-register-icon">Buscá y reservá canchas cercanas a tu casa o trabajo.</div>
                </div>
                <div class="icon-register-container trophy">
                    <img class="register-icon trophy" src="images/3_icono_trofeo.png"/>
                    <div class="text-register-icon trophy">Encontrá torneos para tu equipo, armá tu agenda y disfrutá del fútbol</div>
                </div>

            </div>
        </div>

        <div class="col-sm-6 register-container">

            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}


                <div class="form-group">
                    <div class="col-sm-12">
                    
                        
                        <!-- mostrar errores en alert -->

                    </div>  
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombre completo</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Registrarme!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
