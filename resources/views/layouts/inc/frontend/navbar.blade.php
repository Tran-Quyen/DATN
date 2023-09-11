<div class="main-navbar shadow-sm sticky-to">
    <div class="top-navbar">
        <div class="container-fluid container">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a href="{{ route('index') }}" style="text-decoration: none">
                        <h3 class="brand-name">{{ $appSetting->website_name ?? 'QComputer' }}</h3>
                    </a>
                </div>
                <div class="col-md-5 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group my-auto overflow-hidden rounded-30">
                            <input type="search" name="search" value="{{ Request::get('search') }}" class="form-control" id="form-search" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2"
                            style="background-color: rgb(255, 255, 255); border-color: rgb(255, 255, 255);"
                            >
                            <button style="background-color: rgb(255, 255, 255); outline:none;" class="btn text-muted" id="btn-search" type="submit" id="button-addon2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cart') }}">
                                <i class="fa fa-shopping-cart position-relative" style="font-size: 1.2rem;">
                                    <span wire:ignore class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: .6rem;">
                                        <livewire:frontend.cart.cart-count/>
                                        <span class="visually-hidden">products</span>
                                    </span>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('wishlist') }}">
                                <i class="fa fa-heart position-relative" style="font-size: 1.2rem;">
                                    <span wire:ignore class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: .6rem;"
                                    >
                                        <livewire:frontend.wishlist.wishlist-count/>
                                        <span class="visually-hidden">products</span>
                                    </span>
                                </i>
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user" style="font-size: 1.2rem;"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('my-profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('orders') }}"><i class="fa fa-list"></i> My Orders</a></li>
                                    <li><a class="dropdown-item" href="{{ route('wishlist') }}"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        >
                                            <i class="fa fa-sign-out"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid container">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                {{ $appSetting->website_name ?? 'QComputer' }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mr-5" style="margin-left: -1.25rem;">
                        <a class="nav-link" style="font-weight: 500;  " href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="{{ url('/collections') }}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="{{ url('new-arrivals') }}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="{{ url('featured-products') }}">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="{{ url('news') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="#">Supports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="#">Recruiment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: 500;  " href="#">Our Subsidiaries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
