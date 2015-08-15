<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">

            <div class="productinfo text-center">

                @if(count($products->images))
                    <img src="{{ url('uploads/'.$products->images->first()->id.'.'.$products->images->first()->extension) }}" alt="" width="200px"/>
                @else
                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200px"/>
                @endif

                <h2>R$ {{ $products->price }}</h2>
                <p>{{ $products->name }}</p>
                <a href="{{ route('productDetail', $products->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                <a href="{{ route('store.cart.add', $products->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
            </div>

            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>R$ {{ $products->price }}</h2>
                    <p>{{ $products->name }}</p>
                    <a href="{{ route('productDetail', $products->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="{{ route('store.cart.add', $products->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
            </div>

        </div>
    </div>
</div>