@extends('front.master')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

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
@endsection
