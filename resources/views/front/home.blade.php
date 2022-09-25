@extends('front.master')
@section('content')

<main role="main">
    <head>
        <link rel="stylesheet" href="{{ asset('dist/css/carousel.css') }}">
    </head>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ URL::asset('dist/img/create-section1.jpg') }}" alt="First slide" class="first-slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Example headline</h1>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                            in some form, by injected humour, or randomised words which don't look even slightly believable.
                            If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                            hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
                            chunks as necessary
                        </p>
                        <p>
                            <a href="" class="btn btn-lg btn-primary" role="button">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('dist/img/explore-section1.jpg') }}" alt="second slide" class="second-slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Another headline</h1>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,
                            a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more
                            obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the
                            cites of the word in classical literature, discovered the undoubtable source.
                        </p>
                        <p>
                            <a href="" class="btn btn-lg btn-primary" role="button">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('dist/img/rollsroysemain.jpg') }}" alt="Third slide" class="third-slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>One more for good measure</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries
                        </p>
                        <p>
                            <a href="" class="btn btn-lg btn-primary" role="button">Browse gallery</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php $products = \Illuminate\Support\Facades\DB::table('products')->get(); ?>
                @forelse($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ URL::asset('images/' . $product->image) }}" style="width:100%; height: 225px"/>

                        <div class="card-body">
                            <p class="card-text">{{ $product->pro_name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary">
                                        <a href="{{ route('product_details', ['id' => $product->id]) }}" class="add-to-cart">View Product</a>
                                    </button>
                                    <button class="btn btn-primary">
                                        <a href="{{ route('add_item_to_cart', ['id' => $product->id]) }}" class="add-to-cart">
                                            Add To Cart<i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h3>No products</h3>
                @endforelse
            </div>
        </div>
    </div>

</main>

@include('front.recommends')
@endsection
