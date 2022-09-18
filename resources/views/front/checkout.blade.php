@extends('front.master')

@section('content')
    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <h1>Checkout</h1>
                    <p class="lead text-muted">
                        You currently have 3 item(s) in your basket
                    </p>
                </div>
                <ul class="breadcrumb d-flex justify-content-start
                    justfy-content-lg-center col-lg-3 text-right-order-1 order-lg-2"
                >
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart-menu">
                    <td class="image">Item</td>
                    <td class="description">Description</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                </tr>
                <?php $count = 1; ?>
                @foreach($cartItems as $cartItem)
                <tbody>
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('product_details', ['id' => $cartItem->id]) }}">
                                <img src="{{ $cartItem->options->img }}" alt="" width="200px">
                            </a>
                        </td>

                        {!! Form::open([
                          'url' => route('update_cart', [
                            'id' => $cartItem->rowId
                          ]),
                          'method' => 'PUT'
                        ]) !!}

                            <td class="cart_description">
                                <h4>
                                    <a
                                        href="{{ route('product_details', [
                                                              'id' => $cartItem->id
                                                            ]) }}"
                                        style="color: blue;"
                                    >{{ $cartItem->name }}</a>
                                </h4>
                                <p>Product ID: {{ $cartItem->id }}</p>
                                <p>Only {{ $cartItem->options->stock }} left</p>
                            </td>

                            <td class="cart_price">
                                <p>${{ $cartItem->price }}</p>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input type="hidden" id="rowId<?php echo $count?>" value="{{ $cartItem->rowId }}">
                                    <input type="hidden" id="proId<?php echo $count?>" value="{{ $cartItem->id }}">

                                    <input type="number" size="2"
                                           value="{{ $cartItem->qty }}"
                                           name="qty" id="upCart<?php echo $count?>"
                                           autocomplete="off"
                                           style="text-align: center; max-width: 50px"
                                           min="1" max="30"
                                    >

                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Update"
                                        style="margin: 5px"
                                    >
                                </div>
                            </td>
                        {!! Form::close() !!}

                        <td class="cart_total">
                            <p class="cart_total_price">${{ $cartItem->subtotal }}</p>
                        </td>

                        <td class="cart_delete">
                            <a href="{{ route('remove_item_from_cart', ['id' => $cartItem->rowId]) }}"
                               class="cart_quantity_delete"
                               style="background-color: red"
                            ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php $count++; ?>
                </tbody>
                @endforeach
            </thead>
        </table>
    </div>

    <!-- Checkout Forms -->
    <?php //form start here ?>
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a href="checkout1.html" class="nav-link active">Address</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">Delivery Method</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">Payment Method</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link disabled">Order Review</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="address" class="active tab-block">
                            <h1>Shopper Information</h1>
                            <form action="{{ route('checkout_validate') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <label for="fullname" class="form-label">Display Name</label>
                                       <input type="text" name="fullname" class="form-control"
                                          value="{{ old('fullname') }}" placeholder="Display Name"
                                       >
                                       <br />
                                       <span style="color:red;">{{ $errors->first('fullname') }}</span>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="state" class="form-label">State Name</label>
                                       <input type="text" name="state" class="form-control"
                                          value="{{ old('state') }}" placeholder="State"
                                       >
                                       <br />
                                       <span style="color:red;">{{ $errors->first('state') }}</span>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="pincode" class="form-label">Pincode</label>
                                       <input type="text" name="pincode" class="form-control"
                                          value="{{ old('pincode') }}" placeholder="Pincode"
                                       >
                                       <br />
                                       <span style="color:red;">{{ $errors->first('pincode') }}</span>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="city" class="form-label">City</label>
                                       <input type="text" name="city" class="form-control"
                                          value="{{ old('city') }}" placeholder="City"
                                       >
                                       <br />
                                       <span style="color:red;">{{ $errors->first('city') }}</span>
                                   </div>
                                   <select name="country" class="form-control">
                                       <option value="{{ old('country') }}" selected="selected">Select Country</option>
                                       <option value="United States">United States</option>
                                       <option value="Bangladesh">Bangladesh</option>
                                       <option value="UK">UK</option>
                                       <option value="India">India</option>
                                       <option value="Pakistan">Pakistan</option>
                                       <option value="Ucraine">Ucraine</option>
                                       <option value="Canada">Canada</option>
                                       <option value="Dubai">Dubai</option>
                                   </select>
                                   <span style="color: red;">{{ $errors->first('country') }}</span>

                                   <span>
                                       <input type="radio" name="pay" value="COD" checked="checked">COD
                                   </span>

                                   <span>
                                       <input type="radio" name="pay" value="paypal" checked="checked">PAYPAL
                                   </span>

                                   <input type="submit" value="Continue" class="btn btn-primary">
                               </div>
                            </form>
                            <div class="CTAs d-flex justify-content-between flex-column flex-lg-row">
                                <a href="cart.html" class="btn btn-template-outlined wide prev">
                                    <i class="fa fa-angle-left"></i>
                                    Back to basket
                                </a>
                                <a href="checkout2.html" class="btn btn-template wide next">
                                    Choose delivery method
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block-body order-summary">
                        <h6 class="text-uppercase">Order Summary</h6>
                        <p>Shipping and additional costs are calculated based on values you have entered</p>
                        <ul class="menu-list list-unstyled">
                            <li class="d-flex justify-content-between">
                                <span>Order Subtotal</span><strong>${{ Cart::subtotal() }}</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Shipping and handling</span><strong>$10.00</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Tax</span><strong>${{ Cart::tax() }}</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Total</span><strong class="text-primary price-total">${{ Cart::total() }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
