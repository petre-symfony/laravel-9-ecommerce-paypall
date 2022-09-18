@extends('front.master')

@section('content')
    <style>
        table td {
            padding: 10px;
        }
    </style>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li></li>
                    <li class="active">Dashboard</li>
                    <h3><span style="color: green;">
                        {{ ucwords(Auth()->user()->name) }}
                    </span>, Welcome</h3>
                </ol>
            </div>

            <div class="row"></div>
        </div>
    </section>
@endsection
