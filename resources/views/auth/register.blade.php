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
                        @if (count($errors->all()))
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>  
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-12 control-label label-title">Nombre</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" placeholder="Ingresá tu nombre" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="lastname" class="col-md-12 control-label label-title">Apellido</label>

                    <div class="col-md-12">
                        <input id="lastname" type="text" class="form-control" placeholder="Ingresá tu apellido" name="lastname" value="{{ old('lastname') }}" required autofocus>

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('team_name') ? ' has-error' : '' }}">
                    <label for="team_name" class="col-md-12 control-label label-title">Soy hincha de</label>

                    <div class="col-md-12">
                        <select class="form-control" id="team_name" name="team_name" required autofocus>
                            <option value="">-- Elegí tu club --</option>
                            @foreach ([
                                'Club Atlético Boca Junior',
                                'Club Atlético Independiente',
                                'Club Atlético River Plate',
                                'Racing Club',
                                'Club Atlético San Lorenzo de Almagro',
                                'Club Atlético Huracán',
                                'Club Atlético Banfield',
                                'Club Atlético Belgrano',
                                'Club Atlético Newell\'s Old Boys',
                                'Club Ferro Carril Oeste',
                                'Tigre'
                            ] as $teamName)
                                <option {{$teamName == old('team_name') ? 'selected' : ''}} value="{{$teamName}}">
                                    {{$teamName}}</option>
                            @endforeach
                        </select>
                        
                        @if ($errors->has('team_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('team_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label label-title" >E-Mail</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" placeholder="Ingresá tu e-mail" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label label-title">Contraseña</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" placeholder="Ingresá una contraseña" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-12 control-label label-title">Confirmar contraseña</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmá tu contraseña" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary register">
                            Registrarme!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
