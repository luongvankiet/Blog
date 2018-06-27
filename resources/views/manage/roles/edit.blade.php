@extends('manage.dashboard')
@section('manage')
<h1>Edit role</h1>
@include('layouts.errors')
<hr>
<form  method="POST" action="{{route('roles.update',['id'=>$role->id])}}">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group">
        <label for="display_name">Name (display_name)</label>
        <input type="text" class="form-control" name="display_name" value="{{$role->display_name}}"  />
    </div>
    
    <div class="form-group">
        <label for="name">Name (Slug)</label>
        <input class="form-control" name="name" value="{{$role->name}}" />
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" name="description" value="{{$role->description}}" />
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('roles.index')}}'">Cancel</button>
    </div>
</form>
@endsection