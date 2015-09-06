@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">

        <!--products_by_category-->
        <div class="features_items">
            <h2 class="title text-center">Produtos da Tag {{ $product_tag->name }}</h2>

            @foreach($products as $product)
                @include('store.partial.product', ['products' => $product])
            @endforeach()

        </div>
        <!--products_by_category-->

    </div>

@endsection