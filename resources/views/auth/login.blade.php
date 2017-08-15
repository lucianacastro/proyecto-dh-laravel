@extends('layouts.app')

@section('content')
<div class="background background-home"></div>
<div class="container">

    <div class="row">
        <div class="col-sm-offset-7 col-sm-4">
            @include('auth.login-partial')
        </div>
    </div>
</div>
@endsection
