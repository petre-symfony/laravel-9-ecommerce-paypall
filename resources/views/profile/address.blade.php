@extends('front.master')

@section('content')
    <style>
        table td {
            padding: 10px;
        }
    </style>

    <section id="cart_items">
        <div class="container">

            <div class="row">
                @include('profile.menu')

                <div class="col-md-8">
                    <h3>
                        <span style="color: green;">{{ ucwords(Auth()->user()->name) }}</span>,
                        Your Address
                    </h3>

                    <div class="container">

                        {!! Form::open(['url' => route('update_address'), 'method' => 'post']) !!}
                        @foreach($address_data as $value)
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" value="{{ $value->fullname }}">
                                    <span style="color: red;">{{ $errors->first('fullname') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $value->city }}">
                                    <span style="color: red;">{{ $errors->first('city') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">State</label>
                                    <input type="text" class="form-control" name="state" value="{{ $value->state }}">
                                    <span style="color: red;">{{ $errors->first('state') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">Pincode</label>
                                    <input type="text" class="form-control" name="pincode" value="{{ $value->pincode }}">
                                    <span style="color: red;">{{ $errors->first('pincode') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{ $value->country }}">
                                    <span style="color: red;">{{ $errors->first('country') }}</span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-primary" value="Update Address">
                            </div>
                        @endforeach
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
