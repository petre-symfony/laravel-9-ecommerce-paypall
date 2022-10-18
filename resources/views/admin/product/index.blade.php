@extends('admin.master')

@section('content')
    <script type="text/javascript" defer>
        $(document).ready(function(){
            $('#amountDiv').hide();
            $('#checkSale').show();
            $('#onSale').click(function (){
                $('#amountDiv').show();
                $('#checkSale').hide();

                $('#saveAmount').click(function(){
                    var spl_price = $('#spl_price').val();
                    var pro_id = $('#pro_id').val();
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/admin/addSale'); ?>',
                        data: "salePrice=" + spl_price + "&pro_id=" + pro_id,
                        success: function (response) {
                            console.log(response);
                        }
                    });
                })
            });
            $('#noSale').click(function() {
                $('#amountDiv').hide();
                $('#checkSale').show();
            });
        });
    </script>
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Products</h1>

        <!-- Inverse dark table -->
        <table class="table table-dark">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Price</th>
                <th>Category Id</th>
                <th>On Sale</th>
                <th>Update</th>
                <th>Delete</th>
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
                    <td>
                        <div id="checkSale">
                            <input type="checkbox" id="onSale">Yes
                        </div>
                        <div id="amountDiv">
                            <input type="hidden" id="pro_id" value="{{$product->id}}"/>
                            <input type="checkbox" id="noSale">No <br>
                            <input type="text" id="spl_price" size="12" placeholder="Sale Price"> <br>
                            <button type="submit" id="saveAmount" class="btn btn-success">Save Amount</button>
                        </div>
                    </td>
                    <td><a href="{{ route(
	                          'ProductEditForm',
                              ['id' => $product->id]
                           ) }}"
                           class="btn btn-success btn-small"
                        >
                        Edit
                    </a></td>
                    {!! Form::open(['method' => 'DELETE', 'action' => [
                        'App\Http\Controllers\ProductsController@destroy', $product->id
                    ]]) !!}
                    <td>{!! Form::submit('Delete Product', ['class' => 'btn btn-danger col-sm-6']) !!}</td>
                    {!! Form::close() !!}
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>
@endsection
