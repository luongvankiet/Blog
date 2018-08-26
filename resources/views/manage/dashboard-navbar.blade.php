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
            <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
                <!-- <div class="pos-f-t"> -->

                <div class="navbar-brand js-hamburger" style="border-right: 1px solid #cccccc; width: 50px">
                  <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
                </div>
                <!-- Logo -->
                <a class="navbar-brand" href="{{route('posts.index')}}"><img src="{{asset('img/core-img/logo.png')}}" alt="Logo"></a>
                <!-- Navbar Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <!-- Navbar -->
                <div class="collapse navbar-collapse" id="worldNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('posts.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('manage.dashboard')}}">Manage</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </ul>
                    <!-- Search Form  -->
                    <div id="search-wrapper">
                        <form action="#">
                            <input type="text" id="search" placeholder="Search something...">
                            <div id="close-icon"></div>
                            <input class="d-none" type="submit" value="">
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
