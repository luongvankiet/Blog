@extends('layouts.app')
@section('content')
@include('partials.navbar')
    <div class="container mt-70">
	@include('layouts.errors')
        <div class="row">
        	@yield('side')
			@include('partials.sidebar')
        </div>
    </div>
@endsection
