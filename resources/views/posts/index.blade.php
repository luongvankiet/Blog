@extends('home')
<br>
@section('side')
<!-- ============= Post Content Area Start ============= -->
<div class="col-md-8">
    <div class="post-content-area mb-100">
        <!-- Catagory Area -->
        <div class="world-catagory-area">
            @foreach($categories as $category)
            <ul class="nav nav-tabs">
                <li class="title">{{$category->category_name}}</li>
            </ul>
            @if($category->posts->count()>0)
            <div class="tab-content mb-50">
                <div class="tab-pane fade active show">
                    @foreach($posts as $key => $value)
                    @if($value->category_id == $category->id)
                    <!-- Single Blog Post -->
                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                        <!-- Post Thumbnail -->
                        @if(!empty($value->images[0]))
                        <div class="post-thumbnail d-flex align-items-center">
                                <img src="{{asset('images/'.$value->images[0]->image)}}" alt="" height="200" width="200">
                        </div>
                        @else
                        <div class="post-thumbnail">
                            <img src="http://placehold.it/200x200" alt="">
                        </div>
                        @endif
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{route('posts.show',['slug'=>$value->slug, 'id'=>$value->id])}}" class="headline">
                                <h5>{{$value->title}}</h5>
                            </a>
                            <p>{!!str_limit($value->content, 100, '...')!!}</p>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p><a href="{{route('profile',['id'=>$value->users->id])}}" class="post-author">{{$value->users->name}}</a> on {{$value->created_at->toFormattedDateString()}}</a></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            
            @else
                <p>no post</p>
            @endif

            @endforeach
        </div>
        <div class="container" style="margin-left: 300px;">
            <div class="row">
                <div class="col-12">
                    <div class="mt-50 text-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection