@extends('front.master')

@section('content')
    <script type="text/javascript" defer>
        $(document).ready(function(){
            $('#size').change(function(){
                var size = $('#size').val();
                var proDum = $('#proDum').val();

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/selectSize') ?>',
                    data: "size=" + size + "&proDum=" + proDum,
                    success: function (response) {
                        console.log(response);
                        $('#price').html(response);
                    }
                });
            });
        });
    </script>
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
                        @foreach($products as $product)
                        <div class="product">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="thumbnail">
                                        <img src="{{ URL::asset('images/' . $product->image) }}" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <h2><?php echo ucwords($product->pro_name)?></h2>
                                            <h5>{{ $product->pro_info }}</h5>
                                            <form action="{{ route('add_item_to_cart', ['id' => $product->id]) }}">
                                            <span id="price">
                                                @if($product->spl_price == null)
                                                    <input type="hidden" value="<?php echo $product->pro_price; ?>" name="newPrice">
                                                @else
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input type="hidden" value="<?php echo $product->spl_price; ?>" name="newPrice">
                                                        <p style="text-decoration: line-through; color: #333">
                                                            ${{ $product->pro_price }}
                                                        </p>
                                                        <img src="{{ URL::asset('dist/img/shop/sale.png') }}" alt="" style="width: 60px">
                                                        <p>${{ $product->spl_price }}</p>
                                                    </div>
                                                @endif
                                            </span>
                                        </h2>

                                        <p><b>Availability: {{ $product->stock }} In Stock</b></p>
                                        <?php $sizes = DB::table('product_property')
                                            ->where('pro_id', $product->id)
                                            ->get()
                                        ?>
                                        <select name="size" id="size">
                                            @foreach($sizes as $size)
                                            <option>{{ $size->size }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        @if($product->new_arrival == 1)
                                            <img src="{{ URL::asset('dist/img/product_details/new.jpg') }}" alt="...">
                                        @endif
                                        <input type="hidden" value="<?php echo $product->id ?>" id="proDum">

                                        <button class="btn btn-default cart" id="addToCart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to Cart
                                        </button>
                                        </form>
                                        <?php
                                            $wishData = DB::table('wishlist')
                                                ->rightJoin('products', 'wishlist.pro_id', '=', 'products.id')
                                                ->where('wishlist.pro_id', '=', $product->id)->get();

                                            $count = count(\App\Models\Wishlist::where(['pro_id' => $product->id])->get())
                                        ?>

                                        <?php if($count == "0") {?>
                                        {!! Form::open(['route' => 'addToWishlist', 'method' => 'post']) !!}
                                            <input type="hidden" value="{{ $product->id }}" name="pro_id">
                                            <input type="submit" value="Add to Wishlist" class="btn btn-primary">
                                        {!! Form::close() !!}
                                        <?php } else {?>
                                            <h3 style="color:green">Already added to wishlist <br/><a href="{{ route('wishlist') }}">wishlist</a></h3>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

    @include('front.recommends')
@endsection



