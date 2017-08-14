@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Partidos</h1>
			<ul>
			@foreach ($matches as $match)
				<li>
					<a href="/match/{{$match->id}}">{{$match->title}}</a>
				</li>
			@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection