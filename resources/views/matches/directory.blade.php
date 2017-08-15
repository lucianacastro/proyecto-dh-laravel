@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<h1><small>Listar todo</small><br>Próximos Partidos</h1>
						</div>
						<div class="col-md-6">
							<a href="{{ url('/match') }}" class="btn btn-primary btn-lg pull-right btn-join">Crear Partido!</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-10">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th> <th>Nombre del encuentro</th> <th>Lugar</th> <th>Fecha</th> <th>Organizador</th> <th>Cupos</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($matches as $i => $match)
									<tr>
										<th scope="row">{{$i+1}}</th>
										<td><a href="/match/{{$match->id}}">{{$match->title}}</a></td>
										<td>{{$match->field}}</td>
										<td>{{ date('Y / m / d', strtotime($match->date)) }}</td>
										<td>{{ $match->creator->name }} {{ $match->creator->lastname }}</td>
										<td><span class="label label-success">quedan {{ $match->number_of_players - count($match->players) }} lugares</span></td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					{{ $matches->links() }}
					<div class="img-footer"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection