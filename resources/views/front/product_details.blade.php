@extends('front.master')

@section('content')
    details page

    <div style="width: 20rem;">
        <img src="{{ URL::asset('images/' . $products->image) }}" alt="Card Image Cap">
        <div>
            <h4>Card Title</h4>
            <p></p>
            <a href="Read More"></a>
        </div>
    </div>
    <div class="product-information">
        <h2><?php echo ucwords($products->pro_name) ?></h2>
    </div>
@endsection



