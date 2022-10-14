@extends('front.master')
@section('content')
    <script type="text/javascript" defer>
        $(document).ready(function(){
            <?php for($i=1;$i<20;$i++){ ?>
            $('#upCart<?php echo $i; ?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i; ?>').val();
                var rowId = $('#rowId<?php echo $i; ?>').val();
                var proId = $('#proId<?php echo $i; ?>').val();

                if(newqty <= 0){
                    alert('enter only valid quantity');
                } else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/update_cart)'?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function(response){
                            console.log(response);
                        }
                    });
                };
            });
            <?php } ?>
        })

    </script>
    <?php if ($cartItems->isEmpty()) { ?>
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div align="center">  <img src="{{URL::asset('dist/img/empty-cart.png')}}"/></div>
            </div>
        </section> <!--/#cart_items-->
    <?php } else { ?>
        <br>
        <br>
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}"></a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>

                <div id="updateDiv">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Image</td>
                                    <td class="description">Product</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td></td>
                                </tr>

                                @if(session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                @if(session('error'))

                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif

                            </thead>

                            <?php $count = 1;?>
                                <tbody>
                                @foreach($cartItems as $cartItem)
                                    <tr>
                                        <td class="cart_product">
                                            <p>
                                                <img
                                                    src="{{URL::asset('images/'.$cartItem->options->img)}}"
                                                    class="card-img-top bmw"
                                                >
                                            </p>
                                        </td>

                                            <td class="class-description">

                                                <img src="URL::asset('images/'. $cartItem->img)" alt="" class="card-img-top">
                                                <h4>
                                                    <a
                                                        href="{{ route('product_details', [
                                                          'id' => $cartItem->id])
                                                        }}"
                                                        style="color: blue"
                                                    ></a>
                                                </h4>
                                                <p>Product ID: {{ $cartItem->id }}</p>
                                                <p>Only {{ $cartItem->options->stock }} left</p>

                                            </td>
                                            <td class="cart_price">
                                                <p>${{$cartItem->price}}</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <input type="text" id="rowId<?php echo $count ?>" name="rowId" value="{{ $cartItem->rowId }}">
                                                <input type="text" id="proId<?php echo $count ?>" name="proId" value="{{ $cartItem->id }}">

                                                <input
                                                    type="number" size="2" name="qty"
                                                    value="{{ $cartItem->qty }}"
                                                    id="upCart<?php echo $count ?>"
                                                    autocomplete="off" style="text-align: center; max-width: 50px"
                                                    min="1" max="1000"
                                                >

                                                <input type="submit" class="btn btn-primary" value="Update" style="margin:5px">

                                            </td>

                                        <td class="cart_total">
                                            <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                                        </td>
                                        <td class="cart_delete">
                                            <button class="btn btn-primary">
                                                <a class="cart_quantity_delete" style="background-color:red"
                                                   href="{{ route('remove_item_from_cart', ['id' => $cartItem->rowId]) }}"
                                                >
                                                   <i class="fa fa-times">X</i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>

                                    <?php $count++;?>


                                @endforeach
                                </tbody>
                        </table>
                    </div>
                    <!-- End of Updatediv</div> --></div>


            </div>
        </section> <!--/#cart_items-->
        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <?php /*      <ul class="user_option">
                                <li>
                                    <label>Use Coupon Code</label>
                                </li>
                                <li>
                                    <input type="text" id="couponCode">
                                </li>
                                <li>
                                    <button id="couponBtn">Apply</button>
                                </li>
                            </ul>
                            */?>
                            <ul class="user_info">
                                <li class="single_field">
                                    <label>Country:</label>
                                    <select>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>
                                </li>
                                <li class="single_field">
                                    <label>Region / State:</label>
                                    <select>
                                        <option>Select</option>
                                        <option>Dhaka</option>
                                        <option>London</option>
                                        <option>Dillih</option>
                                        <option>Lahore</option>
                                        <option>Alaska</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>
                                </li>
                                <li class="single_field zip-field">
                                    <label>Zip Code:</label>
                                    <input type="text">
                                </li>
                            </ul>
                            <a class="btn btn-default update" href="">Get Quotes</a>
                            <a class="btn btn-default check_out" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>${{ Cart::subtotal() }}</span></li>
                                <li>Eco Tax <span>${{ Cart::tax() }}</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>${{ Cart::total() }}</span></li>
                            </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
    <?php } ?>
@endsection
