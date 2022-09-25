@extends('front.master')

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="{{ URL::asset('/dist/img/shop/advertisement.jpg') }}" alt="">
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!-- category products -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#sportswear" data-toggle="collapse" data-parent="#accordian">
                                            <span class="badge pull-right"></span><i class="fa fa-plus"></i>
                                            Sportswear
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="">Nike</a></li>
                                            <li><a href="">Under Armour</a></li>
                                            <li><a href="">Adidas</a></li>
                                            <li><a href="">Puma</a></li>
                                            <li><a href="">ASICS</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#mens" data-toggle="collapse" data-parent="#accordian">
                                            <span class="badge pull-right"></span><i class="fa fa-plus"></i>
                                            Mens
                                        </a>
                                    </h4>
                                </div>
                                <div id="mens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="">Fendi</a></li>
                                            <li><a href="">Guess</a></li>
                                            <li><a href="">Valentino</a></li>
                                            <li><a href="">Dior</a></li>
                                            <li><a href="">Versace</a></li>
                                            <li><a href="">Armani</a></li>
                                            <li><a href="">Prada</a></li>
                                            <li><a href="">Dolce and Gabbana</a></li>
                                            <li><a href="">Chanel</a></li>
                                            <li><a href="">Gucci</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#womens" data-toggle="collapse" data-parent="#accordian">
                                            <span class="badge pull-right"></span><i class="fa fa-plus"></i>
                                            Womens
                                        </a>
                                    </h4>
                                </div>
                                <div id="womens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="">Fendi</a></li>
                                            <li><a href="">Guess</a></li>
                                            <li><a href="">Valentino</a></li>
                                            <li><a href="">Dior</a></li>
                                            <li><a href="">Versace</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Kids</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Fashion</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Households</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Interiors</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Clothing</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Bags</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">Shoes</a></h4>
                                </div>
                            </div>
                        </div><!-- category products -->

                        <div class="brands_products">
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href=""><span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href=""><span class="pull-right">(56)</span>Grune Erde</a></li>
                                    <li><a href=""><span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href=""><span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href=""><span class="pull-right">(5)</span>Oddomolly</a></li>
                                    <li><a href=""><span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href=""><span class="pull-right">(9)</span>Rosch Creative Culture</a></li>
                                </ul>
                            </div>
                        </div><!-- brands product -->

                        <div class="price_range">
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250. 450]" id="s12"><br>
                                <b>$ 0</b> <b class="pull-right">0 600</b>
                            </div>
                        </div><!-- price range -->
                        <div class="shipping text-center">
                            <img src="{{ URL::asset('/dist/img/home/shipping.jpg') }}" alt="">
                        </div>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">
                            <?php if (isset($msg)) {
                                echo $msg;
                            } else { ?> WishList Item
                            <?php } ?>
                        </h2>

                        <?php if($products->isEmpty()) { ?>
                            Sorry, products not found
                        <?php } else { ?>
                            @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="product-info text-center">
                                            <a href="{{ route('product_details',['id' => $product->id]) }}">
                                                <img src="{{ URL::asset('images/' . $product->image) }}" alt="">
                                            </a>
                                            <h2>$<?php echo $product->pro_price; ?></h2>
                                            <p>
                                                <a href="{{ route('product_details',['id' => $product->id]) }}">
                                                    <?php echo $product->pro_name ?>
                                                </a>
                                            </p>
                                            <a
                                                href="{{ route('add_item_to_cart',
												    ['id' => $product->id])
                                                }}"
	                                            class="btn btn-default add-to-cart"
                                            >
                                                <i class="fa fa-shopping-cart">Move to cart</i>
                                            </a>
                                        </div>
                                        <a href="{{ route('product_details',['id' => $product->id]) }}">
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>$<?php echo $product->pro_price ?></h2>
                                                    <p><?php echo $product->pro_name ?></p>
                                                    <a
                                                        href="{{ route('add_item_to_cart',
												          ['id' => $product->id])
                                                        }}"
                                                        class="btn btn-default add-to-cart"
                                                    >
                                                        <i class="fa fa-shopping-cart">Move to cart</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a href="{{
	                                                  route('removeWishlist',
	                                                  ['id' => $product->id])
	                                                }}"
                                                    style="color:red;"
                                                >
                                                    <i class="fa fa-minus-square">Remove from wishlist</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="{{ route('removeWishlist', ['id' => $product->id]) }}"
                                       style="color:red;"
                                       class="btn btn-default btn-block"
                                    >
                                        <i class="fa fa-minus-square">Remove from wishlist</i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        <?php } ?>
                    <ul class="pagination">{{ $products }}</ul>
                    </div><!-- features_items -->
                </div>
            </div>
        </div>
    </section>
@endsection
