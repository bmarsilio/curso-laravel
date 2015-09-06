@extends('app')

@section('content')
    <h1>Images of {{ $product->name }}</h1>

    <br>

    <a href="{{ route('admin.products.images.create', ['id' => $product->id]) }}" class="btn btn-default">New Image</a>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80px">
                    </td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{ route('admin.products.images.destroy', ['id' => $image->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.products') }}" class="btn btn-default">Voltar</a>

    </div>

@endsection