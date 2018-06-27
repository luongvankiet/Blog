@extends('home')
@section('side')
<div class="col-md-8">
    <div class="post-content-area mb-100">
        <div class="card mb-4">
            <div class="card-body">
                <form id="createPost" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                	@csrf
            		<div class="form-group">
            	        <label for="title">Title</label>
            	        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('name') }}" required />
            	    </div>
                    
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control image" name="thumbnail">
                    </div>

            	    <div class="form-group mt-30">
            	        <label for="content">Content</label>
            	        <textarea name="content" class="form-control " id="editor1" placeholder="Content"></textarea>
            	    </div>

            		<div class="form-group">
                        <label>Category</label>
                        <select  name="category" class="form-control">
                            @foreach($categories_navbar as $key => $value)
                            	<option value="{{ $value->id }}">{{$value->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                </form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        	<button type="submit" class="btn btn-success btn-block" onclick="document.getElementById('createPost').submit();"> Save </button>
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