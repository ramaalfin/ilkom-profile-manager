<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'ILKOOM - Community Blog' }}</title>

    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png"> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav id="main-navbar" class="navbar navbar-expand-md navbar-dark bg-dark py-0 mb-5">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <span class="d-none">ILKOOM</span>
                <img src="{{ asset('img/ilkoom_logo.png') }}" alt="" class="main-logo d-none d-md-inline">
                <img src="{{ asset('img/ilkoom_logo.png') }}" alt="" class="small-logo d-inline d-md-none">
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Left Side Of Navbar -->
            <div class="collapse navbar-collapse id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link p-4 active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link p-4">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link p-4">Article</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link p-4">Gallery</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    {{-- Authentication Links --}}
                    @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link p-4">Login</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link p-4">Register</a>
                        </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle p-4" data-bs-toggle="dropdown">
                                {{ Auth::user()->nama }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" id="navbarDropdown">
                                <a href="{{ route('logout') }}" class="dropdown-item p-4 py-md-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form action="{{ route('logout') }}" id="logout-form" class="d-none" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer id="main-footer" class="text-white bg-dark py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center text-md-start">
                    <a href="index.html">
                        <img src="{{ asset('img/ilkoom_logo.png') }}" style="height: 60px">
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nobis magni ipsam aliquam, fugiat similique vel ea quisquam, laudantium itaque dolores placeat saepe. Distinctio aut, eum ea accusantium sit eveniet.</p>
                </div>

                <div class="col-md-3 text-center">
                    <h5>Community</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Activity</a></li>
                        <li><a href="#" class="text-white">Members</a></li>
                        <li><a href="#" class="text-white">Groups</a></li>
                        <li><a href="#" class="text-white">Forums</a></li>
                    </ul>
                </div>

                <div class="col-md-3 text-center">
                    <h5>Our Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Our mission</a></li>
                        <li><a href="#" class="text-white">Help/Contact Us</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Cookie Policy</a></li>
                        <li><a href="#" class="text-white">Terms & Conditions</a></li>
                    </ul>
                </div>

                <div class="col-md-3 text-center text-md-start">
                    <h5>Hubungi Kami</h5>
                    <div class="text-nowrap">
                        <i class="fas fa-envelope fa-fw me-3"></i>ramaalfin7@gmail.com
                    </div>
                    <div class="text-nowrap">
                        <i class="fas fa-phone fa-fw me-3"></i>0852 4687 3358
                    </div>
                </div>
            </div>

            <div class="row mt-3 mt-md-0">
                <div class="col-md-3 me-md-auto text-center text-md-start">
                    <small>&copy; ILKOOM {{ date('Y') }}</small>
                </div>

                <div class="col-md-3 text-center text-md-start">
                    <div>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-github fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
