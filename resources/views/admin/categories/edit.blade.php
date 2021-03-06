@extends('app')

@section('content')

    <h1>Editing Category {{ $category->name }}</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['admin.categories.update', $category->id], 'method' => 'put']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
    </div>

    <hr />

    <div class="form-group">
        {!! Form::submit('Save Category', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.categories') }}" class="btn btn-default">Voltar</a>
    </div>

    {!! Form::close() !!}

@endsection