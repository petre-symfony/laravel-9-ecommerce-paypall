@extends('admin.master')

@section('content')
    <script type="text/javascript" defer>
        $(document).ready(function(){
            <?php for($i=1; $i<60; $i++) { ?>
            $('#amountDiv<?php echo $i?>').hide();
            $('#checkSale<?php echo $i?>').show();
            $('#onSale<?php echo $i?>').click(function (){
                $('#noSale<?php echo $i ?>').prop("checked", false);
                $('#amountDiv<?php echo $i?>').show();
                $('#checkSale<?php echo $i?>').hide();

                $('#saveAmount<?php echo $i?>').click(function(){
                    var spl_price = $('#spl_price<?php echo $i?>').val();
                    var pro_id = $('#pro_id<?php echo $i?>').val();
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
            $('#noSale<?php echo $i?>').click(function() {
                $('#amountDiv<?php echo $i?>').hide();
                $('#checkSale<?php echo $i?>').show();
                $('#onSale<?php echo $i ?>').prop("checked", false);
            });
            <?php } ?>
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
                <?php $count = 1; ?>
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
                        <div id="checkSale<?php echo $count ?>">
                            <input type="checkbox" id="onSale<?php echo $count ?>">Yes
                        </div>
                        <div id="amountDiv<?php echo $count ?>">
                            <input type="hidden" id="pro_id<?php echo $count ?>" value="{{$product->id}}"/>
                            <input type="checkbox" id="noSale<?php echo $count ?>">No <br>
                            <input type="text" id="spl_price<?php echo $count ?>" size="12" placeholder="Sale Price"> <br>
                            <button type="submit" id="saveAmount<?php echo $count ?>" class="btn btn-success">Save Amount</button>
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
                <?php $count++; ?>
                @endforeach
            </tbody>
        </table>

    </main>
@endsection
