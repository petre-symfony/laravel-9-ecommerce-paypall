<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a href="{{ url('/') }}" class="navbar-brand">
        <img src="{{ URL::asset('dist/img/ecom.png') }}" alt=""/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('store') }}">Shop</a>
            </li>
            <li class="nav-item dropdown">
                <a
                    href="" id="navbarDropdownMenuLink" class="nav-link"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                >
                    Categories<i class="fa fa-angle-down"></i>
                </a>
                <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                    <?php $cats = \Illuminate\Support\Facades\DB::table('categories')->get(); ?>
                    @foreach ($cats as $cat)
                        <li>
                            <a
                                href="{{ url('/') }}/products/{{ $cat->name }}"
                                class="dropdown-item"
                            >{{ ucwords($cat->name) }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('wishlist') }}">
                    <i class="fa-solid fa-star"></i>Wishlist
                    <span style="color: green; font-weight: bold;">
                        {{ \App\Models\Wishlist::count() }}
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Dropdown</a>
                <?php if (Auth::check()) { ?>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                </div>
                <?php } else { ?>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                </div>
                <?php } ?>
            </li>
            <li class="nav-item dropdown">
                <a href="http://example.com" class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                >
                    <span class="badge badge-secondary badge-pill">
                        <i class="fa fa-shopping-cart">{{ Cart::count() }}</i>
                    </span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge badge-secondary badge-pill">
                            <i class="fa fa-shopping-cart">{{ Cart::count() }}</i>
                        </span>
                        <span class="text-muted">Total: ({{ Cart::total() }})</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php $cartItems = Cart::content() ?>
                        @foreach($cartItems as $cartItem)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="col-md-6">
                                <img src="{{ URL::asset('images/' . $cartItem->options->img) }}"
                                    alt="" class="dropdown-image img-responsive"
                                    style="width: 50px;"
                                >
                            </div>
                            <div class="col-md-6">
                                <h6 class="my-0">Name: {{ $cartItem->name }}</h6>
                                <span class="text-muted">Price: {{ $cartItem->price }}</span>
                                <br>
                                <small class="text-muted float-right">Qty: {{ $cartItem->qty }}</small>
                            </div>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <a class="btn btn-primary" href="{{ route('checkout') }}">Check Out</a>
                            <a class="btn btn-primary float-right" href="{{ route('cart') }}">View Cart</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <li class="list-inline-item">
            <a href="{{ route('cart') }}">
                <i class="fa fa-shopping-cart"></i>View Cart
                ({{ Cart::count() }}) {{Cart::total()}}
            </a>
        </li>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
