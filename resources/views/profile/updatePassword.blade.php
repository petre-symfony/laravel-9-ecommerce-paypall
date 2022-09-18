@extends('front.master')

@section('content')
    <style>
        table td {
            padding: 10px;
        }
    </style>

    <section id="cart_items">
        <div class="container">

            @if(session('msg'))
                <div class="alert alert-info">
                    {{ session('msg') }}
                </div>
            @endif
            
            <div class="row">
                @include('profile.menu')

                <div class="col-md-8">
                    <h3>
                        <span style="color: green;">{{ ucwords(Auth()->user()->name) }}</span>
                        Update Your Password
                    </h3>

                    <div class="container">
                        {!! Form::open(['url' => route('update_password'), 'method' => 'post']) !!}
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">Current Password</label>
                                    <input type="text" class="form-control" name="oldPassword">
                                    <span style="color: red;">{{ $errors->first('oldPassword') }}</span>
                                </div>
                                <br>
                                <div class="form-group col-md-6">
                                    <label for="example-text-input">New Password</label>
                                    <input type="text" class="form-control" name="newPassword">
                                    <span style="color: red;">{{ $errors->first('newPassword') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
