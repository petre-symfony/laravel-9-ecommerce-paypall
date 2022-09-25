<?php
    $products1 = Illuminate\Support\Facades\DB::table('recommends')
        ->leftJoin('products', 'recommends.pro_id', 'products.id')
        ->select('pro_id', 'pro_name', 'image', 'pro_price', Illuminate\Support\Facades\DB::raw('count(*) as total'))
        ->groupBy('pro_id', 'pro_name', 'image', 'pro_price')
        ->orderBy('total')
        ->take(3)
        ->get()
    ;

    if (Illuminate\Support\Facades\Auth::check()) {
        $products2 = Illuminate\Support\Facades\DB::table('recommends')
            ->leftJoin('products', 'recommends.pro_id', 'products.id')
            ->where('uid', Illuminate\Support\Facades\Auth::user()->id)
            ->inRandomOrder()
            ->take(3)
            ->get()
        ;
    } else {
        $products2 = Illuminate\Support\Facades\DB::table('recommends')
            ->leftJoin('products', 'recommends.pro_id', 'products.id')
            ->inRandomOrder()
            ->take(3)
            ->get()
        ;
    }
?>

<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    Recommended Items
    <div class="carousel-inner">
        <div class="item active">
            @foreach($products1 as $p)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="product-info text-center">
                                <a href="{{ route('product_details', ['id' => $p->pro_id]) }}">
                                    <img src="{{ URL::asset('images/' . $p->image) }}" alt="">
                                </a>
                                <h2>${{ $p->pro_price }}</h2>
                                <p>
                                    <a href="{{ route('product_details', ['id' => $p->pro_id]) }}">
                                        {{ $p->pro_name }}
                                    </a>
                                </p>
                                <a href="{{ route('add_item_to_cart', ['id' => $p->pro_id])}}">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="item">
            @foreach($products2 as $p)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="product-info text-center">
                            <a href="{{ route('product_details', ['id' => $p->pro_id]) }}">
                                <img src="{{ URL::asset('images/' . $p->image) }}" alt="">
                            </a>
                            <h2>${{ $p->pro_price }}</h2>
                            <p>
                                <a href="{{ route('product_details', ['id' => $p->pro_id]) }}">
                                    {{ $p->pro_name }}
                                </a>
                            </p>
                            <a href="{{ route('add_item_to_cart', ['id' => $p->pro_id])}}">
                                <i class="fa fa-shopping-cart"></i>Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a href="#recommended-item-carousel" class="right recommended-item-control" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>
