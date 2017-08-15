@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if (session('error'))
	            <div class="alert alert-danger">
	                <strong>{{ session('error') }}</strong>
	            </div>
	        @endif
	        @if (session('success'))
	            <div class="alert alert-success">
	                <strong>{{ session('success') }}</strong>
	            </div>
	        @endif
	    </div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<a href="{{ url('/matches') }}"><i class="glyphicon glyphicon-chevron-left"></i> ver todos los partidos	</a>
							<h1><small>Partido</small><br>{{$match->title}}</h1>
						</div>
						<div class="col-md-6">
							<form action="{{ url('/match/'.$match->id.'/join') }}" method="post">
								{{ csrf_field() }}
								<input type="submit" class="btn btn-primary btn-lg pull-right btn-join" value="Sumarme!">
							</form>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<h2>Detalles</h2>
					<div class="row">
						<div class="col-md-6">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th scope="row">Lugar</th> <td>{{ $match->field }}</td>
									</tr>
									<tr>
										<th scope="row">Fecha</th> <td>{{ date('Y / m / d', strtotime($match->date)) }}</td>
									</tr>
									<tr>
										<th scope="row">Hora</th> <td>{{ date('H:i \H\s', strtotime($match->date)) }}</td>
									</tr>
									<tr>
										<th scope="row">Cantidad de lugares</th> <td>{{ $match->number_of_players }}</td>
									</tr>
									<tr>
										<th scope="row">Organizador</th> <td>{{ $match->creator->name }} {{ $match->creator->lastname }}</td>
									</tr>
									<tr>
										<th scope="row">Creado</th> <td>{{ date('\e\l d/m \a \l\a\s H:i \H\s', strtotime($match->created_at)) }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<h2>Jugadores anotados {{ count($match->players) }}/{{ $match->number_of_players }}</h2>
					<p>El órden de aparición no determina la formación de los equipos.</p>
					@if (count($match->players))
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($match->players as $i => $player)
							<tr>
								<th scope="row">{{$i+1}}</th> <td>{{$player->name}}</td> <td>{{$player->lastname}}</td> <td>{{$player->email}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info" role="alert">
							<h4>No se encontraron jugadores anotados para este partido.</h4>
							<p>Invitá a tus amigos compartiendo este link: <code>{{ url('/match/'.$match->id) }}</code></p>
						</div>
					@endif
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection