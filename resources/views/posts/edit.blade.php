@extends('home')
@section('side')
<div class="col-md-8 mt-100">
    <div class="post-content-area mb-100">
        <div class="card mb-4">
            <div class="card-body">
            	@include('layouts.errors')
                <form id="editPost" action="{{route('posts.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                	@csrf
            		<div class="form-group">
            	        <label for="title">Title</label>
            	        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $post->title }}" required />
            	    </div>
                    
                    <div class="form-group">
                        <label for="image">Thumbnail</label>
                        @foreach($post->images as $image)
                            <input type="file" class="form-control" name="thumbnail" value="{{$image->image}}">
                        @endforeach
                    </div>

            	    <div class="form-group mt-30">
            	        <label for="content">Content</label>
            	        <textarea name="content" class="form-control " id="editor1">{!!$post->content!!}</textarea>
            	    </div>

            		<div class="form-group">
                        <label>Category</label>
                        <select  name="category" class="form-control">
                            @foreach($categories_navbar as $key => $value)
                            	<option value="{{ $value->id }}" {{($post->categories->id == $value->id) ? 'selected' : ''}}>{{$value->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                </form>
                </form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-block" onclick="document.getElementById('editPost').submit();"> Save </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" onclick="window.location='{{route('posts.index')}}'"> Cancel </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection