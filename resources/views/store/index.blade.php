@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">

        <!--featured_items-->
        <div class="features_items">
            <h2 class="title text-center">Em destaque</h2>

            @foreach($products_featured as $product_featured)
                @include('store.partial.product', ['products' => $product_featured])
            @endforeach()

        </div>
        <!--features_items-->

        <!--recommended_items-->
        <div class="features_items">
            <h2 class="title text-center">Recomendados</h2>

            @foreach($products_recommended as $product_recommended)
                @include('store.partial.product', ['products' => $product_recommended])
            @endforeach()

        </div>
        <!--recommended_items-->

    </div>
@endsection