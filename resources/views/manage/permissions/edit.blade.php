@extends('manage.dashboard')
@section('manage')
<h1>Edit permission</h1>
@include('layouts.errors')
<hr>
<form  method="POST" action="{{route('permissions.update',['id'=>$permission->id])}}">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group">
        <label for="display_name">Display Name</label>
        <input type="text" class="form-control" name="display_name" value="{{$permission->display_name}}" />
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" value="{{$permission->description}}"/>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary" style="margin-right: 10px">Edit</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('permissions.index')}}'">Cancel</button>
    </div>
</form>
@endsection