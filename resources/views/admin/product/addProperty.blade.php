@extends('admin.master')

@section('content')
    <section id="container" class="col-lg-9">
        <div id="main-content">
            <div class="wrapper">
                <div class="content-box-large">
                    {!! Form::model(
	                    $products,
	                    [
                            'method' => 'put',
                            'route' => ['submit_property', $products->id],
                            'files' => true
                        ]
                    ) !!}
                    <div class="panel-heading col-md-8">
                        <div class="panel-title">Add Property
                            <input type="submit" class="btn btn-success pull-right"
                                   value="Submit Property"
                                   style="margin: -4px"
                            >
                        </div>
                    </div>

                    <div class="col-md-5">
                        <b>Product Name:</b>
                        <select name="pro_id" class="form-control">
                            <option value="{{ $products->id }}">{{ $products->pro_name }}</option>
                        </select>
                        <br>
                        Size: <select name="size" class="form-control">
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        <br>
                        Size: <select name="color" class="form-control">
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="black">Black</option>
                        </select>
                        <br>
                        Price: <input type="text" name="p_price" class="form-control">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
