@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Creá un partido</div>

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
								{!! Form::text('title', old('title'), ["class" => "form-control", "placeholder" => "Ingresá el nombre del partido"]) !!}
							</div>
							<div class="form-group">
								{!! Form::select('field', [
									'Fenix futbol',
									'Caballito Norte', 
									'Grun FC',
									], old('field'), ['placeholder' => 'Elegí una cancha']) !!}
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