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
                    <ol class="breadcrumb">
                        <li></li>
                        <table border="0" align="center">
                            <tr>
                                <td>
                                    <a href="{{ route('orders') }}" class="btn btn-success">My Orders</a>
                                </td>
                                <td>
                                    <a href="{{ route('address') }}" class="btn btn-success">My Address</a>
                                </td>
                                <td>
                                    <a href="{{ route('password') }}" class="btn btn-success">Change Password</a>
                                </td>
                            </tr>
                        </table>

                        <h3><span style="color:green">{{ ucwords(Auth()->user()->name) }}</span>, Welcome</h3>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection
