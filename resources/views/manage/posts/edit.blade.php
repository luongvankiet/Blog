@extends('manage.dashboard')
@section('manage')
<h1>Edit post</h1>
@include('layouts.errors')
<hr>
<form  method="POST" action="{{route('manage_posts.update',['id'=>$post->id])}}">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{$post->title}}"  />
    </div>
    
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="editor1" name="content">{{$post->content}}</textarea> 
    </div>

    <div class="form-group">
        <label>Category</label>
        <select  name="category" class="form-control">
            @foreach($categories_navbar as $key => $value)
                <option value="{{ $value->id }}" {{($post->category_id == $value->id) ? 'selected' : ''}}>{{$value->category_name}}</option>
            @endforeach

        </select>
    </div> 

    <div class="form-group">
        <label class="radio">
            <input type="radio" name="status[]" value="true" {{($post->active == 1) ? 'checked' : ''}}/> Activate
            <span class="checkmark"></span>
        </label>

        <label class="radio">
            <input type="radio" name="status[]" value="false" {{($post->active == 0) ? 'checked' : ''}}/> Deactivate
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('manage_posts.index')}}'">Cancel</button>
    </div>
</form>
@endsection