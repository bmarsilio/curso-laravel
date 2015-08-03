@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @foreach($products_featured as $product_featured)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                @if(count($product_featured->images))
                                    <img src="{{ url('uploads/'.$product_featured->images->first()->id.'.'.$product_featured->images->first()->extension) }}" alt="" width="200px"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200px"/>
                                @endif


                                <h2>R$ {{ $product_featured->price }}</h2>
                                <p>{{ $product_featured->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ $product_featured->price }}</h2>
                                    <p>{{ $product_featured->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach()


        </div><!--features_items-->


        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @foreach($products_recommended as $product_recommended)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                @if(count($product_recommended->images))
                                    <img src="{{ url('uploads/'.$product_recommended->images->first()->id.'.'.$product_recommended->images->first()->extension) }}" alt="" width="200px"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200px"/>
                                @endif

                                <h2>R$ {{ $product_recommended->price }}</h2>
                                <p>{{ $product_recommended->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{ $product_recommended->price }}</h2>
                                    <p>{{ $product_recommended->name }}</p>
                                    <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="http://commerce.dev:10088/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach()

        </div><!--recommended-->

    </div>
@endsection