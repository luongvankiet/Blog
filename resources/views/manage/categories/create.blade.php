@extends('manage.dashboard')
@section('manage')
<h1>Create new category</h1>
@include('layouts.errors')
<hr>
<form  method="POST" action="{{route('categories.store')}}">
    @csrf
    <div class="form-group">
        <label for="category_name">Name</label>
        <input type="text" class="form-control" name="category_name" placeholder="Name" value="{{ old('category_name') }}" required autofocus />
    </div>   
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('categories.index')}}'">Cancel</button>
    </div>
    
</form>
@endsection