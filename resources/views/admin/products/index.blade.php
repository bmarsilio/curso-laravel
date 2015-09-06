@extends('app')

@section('content')
    <h1>Products</h1>

    <br>

    <a href="{{ route('admin.products.create') }}" class="btn btn-default">New Product</a>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->featured }}</td>
                    <td>{{ $product->recommend }}</td>
                    <td>
                        <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}">Delete</a>
                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">| Edit</a>
                        <a href="{{ route('admin.products.images', ['id' => $product->id]) }}">| Images</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render() !!}

    </div>

@endsection