<!-- Preloader Start -->
<!-- <div id="preloader">
    <div class="preload-content">
        <div id="world-load"></div>
    </div>
</div> -->
<!-- Preloader End -->
<!-- ***** Header Area Start ***** -->
<header class="header-area sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{route('posts.index')}}"><img src="{{asset('img/core-img/logo2.png')}}" alt="Logo" width="150px" height="55px"></a>
                    <!-- Navbar Toggler -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <!-- Navbar -->
                    <div class="collapse navbar-collapse" id="worldNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('posts.index')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Categories
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($categories_navbar as $category)
                                        <a class="dropdown-item" href="{{route('posts.category', ['slug'=>$category->category_slug, 'id'=>$category->id])}}">{{$category->category_name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            @guest
                            @else
                                @foreach(Auth::user()->roles as $role)
                                    @if($role->name == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('manage.dashboard')}}">Manage</a>
                                    </li>
                                    @endif
                                @endforeach
                            @endguest

                            @guest
                            <!-- login nav -->
                            <li class="dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Login
                                </a>
                                <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-center">Login</h5>
                                                <hr>
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
                                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            <!-- Register nav -->
                            <li class="dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Register
                                </a>
                                <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-center">Register</h5>
                                                <hr>
                                                <form method="post" action="{{route('register')}}" id="login-nav" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Name</label>
                                                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}"
                                                        id="exampleInputEmail2" placeholder="Name" required>
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Email address</label>
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
                                                        <label for="exampleInputPassword2">Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('profile', ['email'=>Auth::user()->id])}}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('posts.create')}}">
                                        {{ __('Create post') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                        <!-- Search Form  -->
                        <div id="search-wrapper">
                            <form action="{{route('search')}}" method="GET">
                                <input type="text" id="search" placeholder="Search something..." name="search">
                                <div id="close-icon"></div>
                                <input class="d-none" type="submit" value="">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
