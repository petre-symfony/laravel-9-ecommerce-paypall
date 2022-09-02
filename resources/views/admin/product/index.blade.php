@extends('admin.master')

@section('content')
    @forelse($products as $product)
        <li>
            <h4>Name of product:{{ $product->pro_name }}</h4>

            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
            </form>
        </li>
    @empty
        <h3>No Products</h3>
    @endforelse

@endsection
