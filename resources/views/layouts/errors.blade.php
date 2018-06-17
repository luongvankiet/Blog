@if(count($errors))
	<div class="form-group">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif

@if(Session::has('success'))
	<div class="form-group">
		<div class="alert alert-success">
			<strong>Success: </strong>{{Session::get('success')}}
		</div>
	</div>
@endif


@if(Session::has('danger'))
	<div class="form-group">
		<div class="alert alert-success">
			<strong>Success: </strong>{{Session::get('danger')}}
		</div>
	</div>
@endif