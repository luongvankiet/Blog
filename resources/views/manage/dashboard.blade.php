@extends('layouts.app')
@section('content')
	@include('manage.dashboard-navbar')
	@include('manage.dashboard-sidebar')
	<main class="l-main">
	  	<div class="content-wrapper content-wrapper--with-bg">	    
	        <div class="list-group">
				@yield('manage')
			</div>
		</div>
	</main>
@endsection