@extends('layouts.app')
@include('partials.navbar')

@section('content')
<div class="container mt-70">
  <div class="row">
    <div class="col-md-8">
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-9">
          <h2>{{$user->name}} posts</h2>
        </div>
        <div class="col-md-3 d-flex justify-content-end" style="margin-top: 10px; padding-bottom: 20px">
            @if(Auth::check())
              @if(Auth::user()->id == $user->id)
              <a class="btn btn-success btn-sm" href="{{route('posts.create')}}">Create new post</a>
              @endif
            @endif
        </div>
      </div>

      @foreach($posts as $key => $value)
          <!-- Blog Post -->
          <div class="card mb-4">
            @if(!empty($value->images[0]))
            <img class="card-img-top" data-toggle="modal" data-target="#exampleModal" src="{{asset('images/'.$value->images[0]->image)}}" width="700" height="300" alt="Card image cap">
            @else
            <img class="card-img-top" data-toggle="modal" data-target="#exampleModal" src="http://placehold.it/750x300" alt="Card image cap">
            @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-body d-flex justify-content-center">
                    @if(empty($value->images[0]))
                      <img src="http://placehold.it/750x300" alt="Card image cap">
                    @else
                      <img src="{{asset('images/'.$value->images[0]->image)}}" alt="Card image cap">
                    @endif
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-header">
              <h2>{{$value->title}}</h2>
            </div>
            <div class="card-body" id="collapse{{$value->id}}" class="collapse">
              <p>{!!str_limit($value->content, $limit = 200, $end = '...')!!}</p>
              <a href="{{route('posts.show',['slug'=>str_slug($value->title,'-'), 'id'=>$value->id])}}"  style="margin-right: 5px;">Read More</a>
            </div>
            <div class="card-footer text-muted">
              <div class="row">
                <div class="col-md-8">
                  Posted on {{$value->created_at->toFormattedDateString()}} by
                  <a href="{{route('profile',['id'=>$value->users->id])}}">{{$value->users->name}}</a>
                </div>
                <div class="col-md-4 d-flex justify-content-end" >
                  <div class="row">
                    @if(Auth::check())
                      @if(Auth::user()->id == $value->users->id)
                      <a href="{{route('posts.edit', ['id' => $value->id])}}" class="btn btn-dark btn-sm" style="margin-right: 5px;">Edit</a>
                      <form method="POST" action="{{route('posts.destroy',['id'=>$value->id])}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endforeach
    </div>

  <!-- ========== Sidebar Area ========== -->
    <div class="col-md-4">
        <div class="post-sidebar-area">
            <!-- Widget Area -->
            <div class="sidebar-widget-area">
                <h5 class="title">Profile</h5>
                <div class="widget-content text-center">
                    @if($user->avatar == null)
                    <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="rounded-circle" height="100" width="100">
                    @else
                    <img src="{{asset('images'.$user->avatar)}}" class="rounded-circle">
                    @endif
                    <p><h4>{{$user->name}}</h4></p>
                    <p>Email: {{$user->email}}</p>
                    <p>Nickname: {{$user->nickname}}</p>
                    <p>Date of birth: {{$user->date_of_birth}}</p>

                    @if(Auth::user()->id == $user->id)
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" onclick="window.location='{{route('profile',['id'=>Auth::user()->id])}}'">Personal page</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-block" onclick="window.location='{{route('profile.edit', ['id'=>Auth::user()->id])}}'">Edit</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- Widget Area -->
            <div class="sidebar-widget-area">
                <h5 class="title">Top Stories</h5>
                <div class="widget-content">
                    @foreach($top_posts as $post)
                    <!-- Single Blog Post -->
                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                        @if(!empty($post->images[0]))
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{asset('images/'.$post->images[0]->image)}}">
                        </div>
                        @else
                        <div class="post-thumbnail">
                            <img src="http://placehold.it/200x200">
                        </div>
                        @endif
                        <!-- Post Content -->
                        <div class="post-content">
                            <a href="{{route('posts.show',['slug' => $post->slug, 'id' => $post->id])}}" class="headline">
                                <h5 class="mb-0">{{str_limit($post->title, 50, '...')}}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Widget Area -->
            <div class="sidebar-widget-area">
                <h5 class="title">About Blog</h5>
                <div class="widget-content">
                    <p>This is a technical blog for everyone who would like to share knowledge and experience about new technology</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection