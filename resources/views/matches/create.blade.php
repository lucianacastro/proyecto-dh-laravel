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

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Creá un partido</h2></div>

                @if(!empty($errors->all()))
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif

				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif

				<div class="panel-body">
					{!! Form::open(['route' => 'match.store']) !!}

							<div class="form-group">
								{!! Form::text('title', old('title'), [
										'class' => 'form-control',
										'placeholder' => 'Dale nombre a tu encuentro',
									]) !!}
							</div>
							<div class="form-group">
								{!! Form::select('field', [
										'Fenix futbol' => 'Fenix futbol',
										'Caballito Norte' => 'Caballito Norte', 
										'Grun FC' => 'Grun FC',
										'Central Fútbol - Sede Palermo' => 'Central Fútbol - Sede Palermo',
										'Fútbol Cabrera 5' => 'Fútbol Cabrera 5',
										'La Capillita' => 'La Capillita',
										'Deportes Güemes' => 'Deportes Güemes',
										'Canchas Fútbol 5 Palermo Viejo' => 'Canchas Fútbol 5 Palermo Viejo',
										'Justo Futbol 5' => 'Justo Futbol 5',
										'Ocampo Fútbol' => 'Ocampo Fútbol',
										'Futbol 5 Mario Bravo' => 'Futbol 5 Mario Bravo',
										'Fútbol Noble' => 'Fútbol Noble',
										'Doble 5 Sportainment' => 'Doble 5 Sportainment',
										'Claudio Marangoni' => 'Claudio Marangoni',
									], old('field'), [
										'placeholder' => 'Elegí una cancha'
									]) !!}
							</div>
							<div class="form-group">
								{!! Form::number('number_of_players', old('number_of_players'), ["class" => "form-control", "placeholder" => "Ingresá el total de jugadores (sumando los dos equipos!)", "min" => "0", "max" => "22"]) !!}
							</div>
							<div class="form-group">
								{!! Form::datetimeLocal('date', old('date'), ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Crear partido', ["class" => "btn btn-success btn-block"]) !!}
							</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection