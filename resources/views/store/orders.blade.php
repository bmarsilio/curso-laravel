@extends('store.store')

@section('content')

    <div class="col-sm-9 padding-right">
        <h3>Meus Pedidos</h3>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{ $item->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->total }}</td>
                    <td>
                        @if($order->status == 0)
                            Aguardando Pagamento
                        @elseif($order->status == 1)
                            Pagamento Confirmado
                        @elseif($order->status  == 2)
                            Em Trânsito
                        @elseif($order->status  == 3)
                            Entregue
                        @elseif($order->status == 4)
                            Cancelado
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection