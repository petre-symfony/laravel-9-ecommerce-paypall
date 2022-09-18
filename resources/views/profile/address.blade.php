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
                            <input type="text" name="fullname">
                            <input type="submit" value="Update" class="btn btn-primary">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
