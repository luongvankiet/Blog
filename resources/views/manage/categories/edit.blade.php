@extends('manage.dashboard')
@section('manage')
<h1>Edit category</h1>
@include('layouts.errors')
<hr>
<form id="editForm" method="POST" action="{{route('categories.update',['id'=>$category->id])}}">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group">
        <label for="category_name">Name</label>
        <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}"  />
    </div>
    
    <div class="form-group">
        <label for="category_slug">Slug</label>
        <input class="form-control" name="category_slug" value="{{$category->category_slug}}"/> 
    </div>
</form>

    <div class="form-group d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" style="margin-right: 5px;" onclick="document.getElementById('editForm').submit()">Save</button>
        <form action="{{route('categories.destroy', ['id'=>$category->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger mr-10" style="margin-right: 5px;">Delete</button>
        </form>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('categories.index')}}'">Cancel</button>
    </div>
@endsection