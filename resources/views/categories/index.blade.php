@extends('app')

@section('content')
    <h1>Categories</h1>

    <br>

    <a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.destroy', ['id' => $category->id]) }}">Delete |</a>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection