<!-- ========== Sidebar Area ========== -->
<div class="col-md-4">
    <div class="post-sidebar-area">

        @if(Auth::check())
            <!-- Widget Area -->
            <div class="sidebar-widget-area">
                <h5 class="title">Profile</h5>
                <div class="widget-content text-center">
                    @if(Auth::user()->avatar == null)
                    <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="rounded-circle" height="100" width="100">
                    @else
                    <img src="{{asset('images/'.Auth::user()->avatar)}}" class="rounded-circle" width="100px" height="100px">
                    @endif
                    <p><h4>{{Auth::user()->name}}</h4><p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" onclick="window.location='{{route('profile',['id'=>Auth::user()->id])}}'">Personal page</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-block" onclick="window.location='{{route('profile.edit', ['id'=>Auth::user()->id])}}'">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">New Stories</h5>
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
                <p>This is a blog for everyone who would like to share knowledge and experience</p>
            </div>
        </div>
    </div>
</div>