@extends('app')

@section('content')
    <h1>Orders</h1>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Total</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user()->first()->name }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        @if($order->status == 0)
                            Aguardando Pagamento
                        @elseif($order->status == 1)
                            Pagamento Confirmado
                        @elseif($order->status == 2)
                            Em Trânsito
                        @elseif($order->status == 3)
                            Entregue
                        @elseif($order->status == 4)
                            Cancelado
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.status',['id' => $order->id, 'status' => 1]) }}" class="btn btn-success">Confirmar Pagamento</a>
                        <a href="{{ route('admin.orders.status',['id' => $order->id, 'status' => 2]) }}" class="btn btn-info">Entregar</a>
                        <a href="{{ route('admin.orders.status',['id' => $order->id, 'status' => 3]) }}" class="btn btn-warning">Confirmar Entrega</a>
                        <a href="{{ route('admin.orders.status',['id' => $order->id, 'status' => 4]) }}" class="btn btn-danger">Cancelar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $orders->render() !!}

    </div>

@endsection