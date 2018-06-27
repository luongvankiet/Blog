@extends('manage.dashboard')
@section('manage')
<h1>Create new user</h1>
@include('layouts.errors')
<hr>
<form  method="POST" action="{{route('users.store')}}">
    @csrf
    <div class="form-group">
        <label for="Name">Name <span class="require">*</span></label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required />
    </div>
    
    <div class="form-group">
        <label for="title">Email <span class="require">*</span></label>
        <input type="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required/>
    </div>
    
    <div class="form-group">
        <label for="password">Password <span class="require">*</span></label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" required/>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password <span class="require">*</span></label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required/>
    </div>
    
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('users.index')}}'">Cancel</button>
    </div>
    
</form>
@endsection