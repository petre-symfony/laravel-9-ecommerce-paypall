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
                    @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card" style="width:30rem height: 20rem">
                            <img src="{{ URL::asset('images/' . $product->image) }}" class="card-img" alt="Card image cap">
                            <div class="card-body">
                                <p id="price">
                                    <h4 class="card-text iphone">
                                        <a href="{{url('/product_details')}}/{{$product->id}}" style="width:30rem height: 20rem">
                                            {{$product->pro_name}}
                                        </a>
                                    </h4>
                                    @if(!isset($product->spl_price))
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text">
                                                ${{ $product->pro_price }}
                                            </p>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p style="text-decoration: line-through; color: #333">
                                                ${{ $product->pro_price }}
                                            </p>
                                            <img src="{{ URL::asset('dist/img/shop/sale.png') }}" alt="" style="width: 60px">
                                            <p>${{ $product->spl_price }}</p>
                                        </div>
                                    @endif
                                </p>
                                <button type="button" class="btn btn-primary">
                                    <a href="{{ route('add_item_to_cart', ['id' => $product->id]) }}" class="add-to-cart">
                                        Add To Cart
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3>No Products</h3>
                    @endforelse
                </div>

            </div>
        </div>

    </main>
@endsection
