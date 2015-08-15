@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Valor Unitário</td>
                        <td class="price">Quantidade</td>
                        <td class="price">Valor Total</td>
                        <td class="price"></td>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($cart->all() as $k => $item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('productDetail', $k) }}">Imagem</a>
                            </td>

                            <td class="cart_description">
                                <h4><a href="{{ route('productDetail', $k) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>

                            <td class="cart_price">
                                R$ {{ $item['price'] }}
                            </td>

                            <td class="cart_quantity">
                                <a href="{{ route('store.cart.adjust', ['type' => 'remove', 'id' => $k, 'qtd' => $item['qtd']]) }}"><i class="fa fa-minus-square"></i></a>
                                {{ $item['qtd'] }}
                                <a href="{{ route('store.cart.adjust', ['type' => 'add', 'id' => $k, 'qtd' => $item['qtd']]) }}"><i class="fa fa-plus-square"></i></a>
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{ $item['price'] * $item['qtd'] }}</p>
                            </td>

                            <td class="cart_delete">
                                <a href="{{ route('store.cart.destroy', $k) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>

                    @empty

                        <tr colspan="5">
                            <td class="cart_product">
                                Nenhum item encontrado
                            </td>
                        </tr>

                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span class="cart_total">
                                    TOTAL: R$ {{ $cart->getTotal() }}
                                </span>

                                <a href="#" class="btn btn-success">Finalizar Carrinho</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection