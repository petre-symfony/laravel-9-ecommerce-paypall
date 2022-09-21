@extends('front.master')

@section('content')
    <header>
        <div class="container align-vertical hero">
            <div class="row">
                <div class="col-md-5 text-left">

                </div>
            </div>
        </div>
    </header>

    <section id="index-amazon">
        <div class="amazon">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="thumbnail">
                                        <img src="{{ URL::asset('images/' . $products->image) }}" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <h2><?php echo ucwords($products->pro_name)?></h2>
                                            <h5>{{ $products->pro_info }}</h5>
                                            <h2>${{ $products->spl_price }}</h2>
                                        </h2>

                                        <p><b>Availability: {{ $products->stock }} In Stock</b></p>
                                        <a href="{{
                                          route('add_item_to_cart', [
                                            'id' => $products->id
                                          ]) }}"
                                           class="add-to-cart btn btn-primary btn-sm"
                                        >
                                            Add to Cart<i class="fa fa-shopping-cart"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="no-padding-top section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="" class="load-more">
                        <i class="fa fa-ellipsis-h"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection



