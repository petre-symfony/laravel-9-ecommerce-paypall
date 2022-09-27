@extends('admin.master')

@section('content')
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="content-box-large">
                    <h1>Add Category</h1>
                    <div class="col-md-5 col-lg-10">
                        {!! Form::open(['route' => 'editProImage', 'method' => 'POST', 'files' => true]) !!}
                            <input type="hidden" name="id" class="form-control" value="{{ $product->id }}">
                            <input type="text" class="form-control" value="{{ $product->pro_name }}" readonly="readonly">
                            <br>
                            <img
                                class="card-img-top img-fluid"
                                src="{{ URL::asset('images/' . $product->image) }}"
                                width="150px"
                                alt="Card image cap"
                            />

                            <br>
                            Select Image:
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('image', array('class' => 'from-control')) }}
                            <br>

                            <input type="submit" value="Upload Image" class="btn btn-success pull-right">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </section>
    </section>
@endsection
