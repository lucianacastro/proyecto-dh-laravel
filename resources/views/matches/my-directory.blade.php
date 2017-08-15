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
							<h1><small>Administrar</small><br>Mis Partidos</h1>
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
										<th>#</th> <th>Nombre del encuentro</th> <th>Lugar</th> <th>Fecha</th> <th>Organizador</th> <th>Cupos</th> <th></th>
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
										<td>
											<form action="{{ url('/match/'.$match->id.'/delete') }}" method="post">
												{{ csrf_field() }}
												<input type="submit" class="btn btn-danger btn-xs pull-right" value="Eliminar">
											</form>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					{{ $matches->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection