@extends('app')

@section('content')

    <h1>Create Category</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => 'admin.categories.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <hr />

    <div class="form-group">
        {!! Form::submit('Add Category', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.categories') }}" class="btn btn-default">Voltar</a>
    </div>

    {!! Form::close() !!}

@endsection