@extends('manage.dashboard')
@section('manage')
<h1>Edit user</h1>
@include('layouts.errors')
<form  method="POST" action="{{route('users.update',['id'=>$user->id])}}">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group">
        <label for="Name">Name <span class="require">*</span></label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}"  />
    </div>
    
    <div class="form-group">
        <label for="email">Email <span class="require">*</span></label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Edit</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{url()->previous()}}'">Cancel</button>
    </div>
</form>
@endsection