@extends('app')

@section('content')

    <h1>Uploar Image</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['admin.products.images.store', $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
    </div>

    <hr />

    <div class="form-group">
        {!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection