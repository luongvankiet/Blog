@extends('home')
@section('side')
<div class="col-md-8">
        <div class="single-blog-content">
            <!-- Post Meta -->
            <div class="post-meta">
                <div class="row ">
                    <div class="col-md-10">
                        <h1>{{$post->title}}</h1>
                    </div>
                    <div class="col-md-2 mt-40">
                        <div class="dropdown d-flex justify-content-end align-items-center" style="cursor: pointer;">
                          <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-ellipsis-v fa-lg"></span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('posts.edit',['id'=>$post->id])}}"><span class="fa fa-wrench"></span>  Edit</a>
                            <form method="POST" action="{{route('posts.destroy',['id'=>$post->id])}}">
                                {{method_field('DELETE')}}
                                @csrf
                                <button class="dropdown-item" type="submit"><span class="fa fa-trash"></span>  Delete</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
              <hr>
                  @if(!empty($post->images[0]))
                    @foreach($post->images as $images)
                        <img src="{{asset('images/'.$images->image)}}" width="900" height="300">
                    @endforeach
                  @else
                    <div class="post-thumbnail">
                        <img src="http://placehold.it/900x300" alt="">
                    </div>
                  @endif
            </div>
            <!-- Post Content -->
            <div class="post-content">
                <h6>{!!$post->content!!}</h6>
                
                <!-- Post Meta -->
                <div class="post-meta second-part">
                    <p><a href="{{route('profile', ['id'=>$post->users->id])}}" class="post-author">{{$post->users->name}}</a> on {{$post->created_at->toFormattedDateString()}}</a></p>
                </div>
            </div>
        @guest
        <!-- Login to comment btn -->
            <div class="row mb-30">
                <div class="col-12">
                    <div class="load-more-btn mt-50 text-center" >
                        <button href="#" class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#LoginModal">Login to comment</button>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal" id="LoginModal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="post" action="{{route('login')}}" id="login-nav" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail2">Email</label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"
                            id="exampleInputEmail2" placeholder="Email address" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Password</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="exampleInputPassword2"  placeholder="Password" required>
                            <small id="passwordHelpInline" class="text-muted">
                              Must be more than 6 characters long.
                            </small>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Sign in</button></div>
                                <div class="col-md-6"><button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>

        @else
        <!-- Comments Form -->
        <div class="card mt-30">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="{{route('comments.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="content" required></textarea>
                  <input type="hidden" name="post_id" value="{{$post->id}}">
                </div>
                <button type="submit" class="btn btn-primary">Post a comment</button>
              </form>
            </div>
        </div>


        <div class="comment_area clearfix mt-30">
            <ol>
                @foreach($post->comments as $comment)
                <!-- Single Comment Area -->
                <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content">
                        <!-- Comment Meta -->
                        <div class="comment-meta d-flex align-items-center justify-content-between">
                            <p><a href="{{route('profile',['id'=>$comment->users->id])}}" class="post-author">{{$comment->users->name}}</a> on <span class="post-date"></span>{{$comment->created_at->diffForHumans()}}</a></p>
                        </div>
                        <p id="Comment">{{$comment->content}}</p>
                        <form id="editForm" action="{{route('comments.update', ['id' => $comment->id])}}" method="POST">
                            {{method_field('PUT')}}
                            @csrf
                            <input type="text" class="form-control" name="content" id="commentInput" value="{{$comment->content}}" style="display: none">
                        </form>
                        <div class="d-flex justify-content-end mt-15">

                            @if(Auth::user()->id == $comment->users->id)
                            <button type="submit" id="submitBtn" class="btn btn-success btn-sm" onclick="document.getElementById('editForm').submit();" style="display: none; margin-right: 5px;">Save</button>
                            <button type="button" id="editBtn" class="btn btn-primary btn-sm" style="margin-right: 5px;" onclick="editComment()">Edit</button>
                            <button type="button" id="cancelBtn" class="btn btn-danger btn-sm" style="display: none;" onclick="cancelEditComment()">Cancel</button>
                            @endif
                            @if(Auth::user()->id == $comment->users->id || Auth::user()->id == $post->user_id)
                            <form action="{{route('comments.destroy', ['id'=>$comment->id])}}" method="POST">
                                {{method_field('DELETE')}}

                                @csrf
                                <button id="deleteBtn" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
        @endguest
        </div>
    </div>


<script>
    function editComment(){
        $( "#editBtn" ).click(function() {
            $( "#Comment" ).css('display', 'none');
            $( "#submitBtn" ).css('display', 'block');
            $( "#cancelBtn" ).css('display', 'block');
            $( "#editBtn" ).css('display', 'none');
            $( "#deleteBtn" ).css('display', 'none');
            $( "#commentInput" ).css('display', 'block');
        });
    }

    function cancelEditComment(){
        $("#cancelBtn").click(function(){
            $( "#Comment" ).css('display', 'block');
            $( "#submitBtn" ).css('display', 'none');
            $( "#cancelBtn" ).css('display', 'none');
            $( "#editBtn" ).css('display', 'block');
            $( "#deleteBtn" ).css('display', 'block');
            $( "#commentInput" ).css('display', 'none');
        });
    }
</script>

@endsection
