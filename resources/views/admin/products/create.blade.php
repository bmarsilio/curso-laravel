@extends('app')

@section('content')

    <h1>Create Product</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => 'admin.products.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::textarea('tags', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('featured', 'Featured:') !!}
        {!! Form::checkbox('featured', 'true') !!}
    </div>

    <div class="form-group">
        {!! Form::label('recommend', 'Recommend:') !!}
        {!! Form::checkbox('recommend', 'true') !!}
    </div>

    <hr />

    <div class="form-group">
        {!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.products') }}" class="btn btn-default">Voltar</a>
    </div>

    {!! Form::close() !!}

@endsection