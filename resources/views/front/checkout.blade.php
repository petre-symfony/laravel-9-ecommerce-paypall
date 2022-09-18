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
                            <form action="#">
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <label for="firstName" class="form-label">First Name</label>
                                       <input type="text" id="firstName" name="first-name" class="form-control"
                                          placeholder="Enter your first name"
                                       >
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="lastName" class="form-label">Last Name</label>
                                       <input type="text" id="lastName" name="last-name" class="form-control"
                                          placeholder="Enter your last name"
                                       >
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="email" class="form-label">Email Address</label>
                                       <input type="text" id="email" name="email" class="form-control"
                                          placeholder="Enter your email address"
                                       >
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="street" class="form-label">Street</label>
                                       <input type="text" id="street" name="address" class="form-control"
                                          placeholder="Enter your street name"
                                       >
                                   </div>
                                   <div class="form-group col-md-3">
                                       <label for="city" class="form-label">City</label>
                                       <input type="text" id="city" name="city" class="form-control"
                                          placeholder="Your city"
                                       >
                                   </div>
                                   <div class="form-group col-md-3">
                                       <label for="zip" class="form-label">Zip</label>
                                       <input type="text" id="zip" name="zip" class="form-control"
                                          placeholder="ZIP code"
                                       >
                                   </div>
                                   <div class="form-group col-md-3">
                                       <label for="state" class="form-label">State</label>
                                       <input type="text" id="state" name="state" class="form-control"
                                          placeholder="Your state"
                                       >
                                   </div>
                                   <div class="form-group col-md-3">
                                       <label for="country" class="form-label">Country</label>
                                       <input type="text" id="country" name="country" class="form-control"
                                          placeholder="Your country"
                                       >
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="phone-number" class="form-label">Phone Number</label>
                                       <input type="tel" id="phone-number" name="phone-number" class="form-control"
                                          placeholder="Your phone number"
                                       >
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label for="company" class="form-label">Company</label>
                                       <input type="text" id="company" name="company" class="form-control"
                                          placeholder="Your company name"
                                       >
                                   </div>
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
                                <span>Order Subtotal</span><strong>$390.00</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Shipping and handling</span><strong>$10.00</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Tax</span><strong>$0.00</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Total</span><strong class="text-primary price-total">$400.00</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
