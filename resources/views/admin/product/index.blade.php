@extends('admin.master')

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Products</h1>

        <!-- Inverse dark table -->
        <table class="table table-dark">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product Id</th>
                <th>Product name</th>
                <th>Product Code</th>
                <th>Product Price</th>
                <th>Category Id</th>
                <th>Update</th>
            </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td style="width: 50px; border: 1px solid #333">
                        <img
                            class="card-img-top img-fluid"
                            src="{{ URL::asset('images/'.$product->image) }}"
                            width="50px"
                            alt="Card Image Cap"
                        >
                    </td>
                    <td style="width: 50px;">{{ $product->id }}</td>
                    <td style="width: 50px;">{{ $product->pro_name }}</td>
                    <td style="width: 50px;">{{ $product->pro_code }}</td>
                    <td style="width: 50px;">${{ $product->pro_price }}</td>
                    <td style="width: 50px;">{{ $product->category_id }}</td>
                    <td><a href="{{ route(
	                          'ProductEditForm',
                              ['id' => $product->id]
                           ) }}"
                           class="btn btn-success btn-small"
                        >
                        Edit
                    </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>
@endsection
