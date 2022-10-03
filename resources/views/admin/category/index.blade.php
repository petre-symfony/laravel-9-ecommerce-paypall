@extends('admin.master')
@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <div class="row">
            <br><br><br>
            <div class="col-md-6">
                <h3>Categories</h3>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td><a href="{{route('category.show', $category->id)}}">{{ $category->name }}</a></td>
                            <td>
                                @if($category->status == '0')
                                    Enable
                                @else
                                    Disable
                                @endif
                            </td>
                            {!! Form::open(['method' => 'DELETE', 'action' => [
	                            'App\Http\Controllers\CategoriesController@destroy', $category->id
                            ]]) !!}
                            <td>{!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}</td>
                            {!! Form::close() !!}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <div class="card card-body bg-success text-white py-5">
                    <h2>Create Category</h2>
                    <p class="lead">Lorem Ipsum has been the industry standard</p>
                    {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Title') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </main>
    {{--products--}}
    @if(isset($products))
        <h3>Products</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                </tr>
                @empty
                <tr>
                    <td>No data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    @endif
@endsection
