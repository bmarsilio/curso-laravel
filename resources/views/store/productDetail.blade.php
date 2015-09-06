@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')

    <div class="col-sm-9 padding-right">
        <!--product-details-->
        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" width="200px"/>
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" width="200px"/>
                    @endif
                </div>

                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">

                            @foreach($product->images as $images)
                                <a href="#">
                                    <img src="{{ url('uploads/'.$images->id.'.'.$images->extension) }}" alt="" width="80"/>
                                </a>
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-sm-7">
                <!--/product-information-->
                <div class="product-information">

                    <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                    <p>{{ $product->description }}</p>

                    <span>
                        <span>R$ {{ number_format($product->price, 2, ",", ".") }}</span>
                        <a href="{{ route('store.cart.add', $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </span>
                </div>
                <!--/product-information-->
            </div>



            <div class="row">
                <div class="col-sm-6">
                    <br />
                    <p>Tags</p>

                    @foreach($product->tags as $product_tag)
                        <a href="{{ route('store.by.tag', $product_tag->id) }}" class="btn btn-default">{{ $product_tag->name }}</a>
                    @endforeach

                </div>
            </div>
        </div>
        <!--/product-details-->
    </div>

@endsection