@extends('admin.master')

@section('content')
    <main class="col-sm-9 col-lg-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>Products</h1>

        <div class="row">
            <div class="col-md-4">
                {!! Form::model(
                    $products,
                    [
                      'method' => 'put',
                      'route' => ['products.update', $products->id],
                      'files' => true
                    ]
                ) !!}

                    <?php $cat_data = \Illuminate\Support\Facades\DB::table('categories')->get(); ?>
                    <select name="category_id" class="form-control">
                        @foreach($cat_data as $cat)
                        Category: <option value="{{ $cat->id }}"
                            <?php if($products->category_id == $cat->id) { ?>
                            selected="selected" <?php } ?>
                        >
                            {{ ucwords($cat->name) }}
                        </option>
                        @endforeach
                    </select>
                    <br>
                    <div class="form-group">
                        {!! Form::label('pro_name', 'Name:') !!}
                        {!! Form::text('pro_name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pro_price', 'Price:') !!}
                        {!! Form::text('pro_price', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pro_code', 'Code:') !!}
                        {!! Form::text('pro_code', null, ['class' => 'form-control']) !!}
                    </div>

                    <img src="{{ URL::asset('images/'.$products->image) }}" style="width: 50px;" alt="" class="card-img-top img-fluid">

                    <div class="form-group">
                        {!! Form::label('spl_price', 'Spl Price:') !!}
                        {!! Form::text('spl_price', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pro_info', 'Info:') !!}
                        {!! Form::text('pro_info', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        New Arrival: <p class="pull-right">
                            <input type="checkbox" name="new_arrival" value="1">
                        </p>
                    </div>

                    {{ Form::submit('Update', ['class' => 'btn btn-default']) }}
                {!! Form::close() !!}
            </div>

            <!-- Update attributes -->

                <?php
                    $prots = DB::table('product_property')
                        ->where('pro_id', $products->id)
                        ->get();
                    if(count($prots) == 0){

                    } else { ?>
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Update Properties
                                    <a href="" class="btn btn-info pull-right" style="margin: -6px; color: #fff">Add more</a>
                                </div>
                            </div>

                            <table class="table table-responsive">
                                <tr>
                                    <td>Size</td>
                                    <td>Color</td>
                                    <td>Price</td>
                                    <td>Update</td>
                                </tr>
                                @foreach($prots as $prot)
                                {!! Form::open(['url' => 'admin/editProperty', 'method' => 'POST']) !!}
                                <tr>
                                    <input type="hidden" name="pro_id" value="{{ $prot->pro_id }}" size="6">
                                    <input type="hidden" name="id" value="{{ $prot->id }}" size="6">
                                    <td><input type="text" name="size" value="{{ $prot->size }}" size="6"></td>
                                    <td><input type="text" name="color" value="{{ $prot->color }}" size="15"></td>
                                    <td><input type="text" name="pro_price" value="{{ $prot->pro_price }}" size="6"></td>
                                    <td colspan="3" align="right">
                                        <input type="submit" class="btn btn-success" value="Save" style="margin: -6px; color: #fff">
                                    </td>
                                </tr>
                                {!! Form::close() !!}
                                @endforeach
                            </table>
                        </div>
                    <?php } ?>
            <!-- end update attributes -->
            <div class="col-md-3">
                <div align="center">
                    <a href="{{ route('add_property', $products->id) }}" class="btn btn-sm btn-info" style="margin: 5px;">
                        Add Property
                    </a>
                </div>
                <h1>Change Image</h1>
                <img
                    src="{{ URL::asset('images/'.$products->image) }}"
                    alt="Card Image Cap" class="card-img-top img-fluid"
                    style="width: 200px;"
                >

                <p><a class="btn btn-info" href="{{ route('edit_image_product_form', ['id' => $products->id]) }}">Change Image</a></p>
            </div>
        </div>
    </main>
@endsection
