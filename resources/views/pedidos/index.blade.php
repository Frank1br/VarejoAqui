@extends('layouts.main')

@section('content')
<br><br>
    <h2>Meus Pedidos</h2>

    @if($pedidos->isEmpty())
        <p class="text-muted">Você ainda não fez nenhum pedido.</p>
    @else
        @foreach($pedidos as $pedido)
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <strong>Pedido #{{ $pedido->id }}</strong>
                    <span class="text-muted float-end">{{ $pedido->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush mb-3">
                        @foreach($pedido->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->title ?? 'Produto removido' }}</strong><br>
                                    Quantidade: {{ $item->quantity }}
                                </div>
                                <span>R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-end">
                        <strong>Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</strong>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
