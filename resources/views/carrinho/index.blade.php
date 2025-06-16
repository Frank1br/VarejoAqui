@extends('layouts.main')

@section('content')
    <h2>Meu Carrinho</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif


    @if($produtos->isEmpty())
        <p class="text-muted">Seu carrinho está vazio.</p>
    @else
        <div class="row">
            @foreach($produtos as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        @if($produto->image_path)
                            <img src="{{ asset('storage/' . $produto->image_path) }}"
                                 class="card-img-top object-fit-cover"
                                 style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $produto->title }}</h5>
                            <p><strong>Preço:</strong> R$ {{ number_format($produto->price, 2, ',', '.') }}</p>

                            <!-- Form de quantidade -->
                            <form action="{{ route('carrinho.update', $produto->id) }}" method="POST" class="d-flex align-items-center mb-2 gap-2">
                                @csrf @method('PATCH')
                                <input type="number" name="quantity" value="{{ $produto->pivot->quantity }}" class="form-control form-control-sm" style="width: 70px;" min="1" max="99">
                                <button class="btn btn-sm btn-outline-primary">Atualizar</button>
                            </form>

                            <!-- Form de remoção -->
                            <form action="{{ route('carrinho.destroy', $produto->id) }}" method="POST" class="mt-auto">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Remover 🗑️</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Total e botão de checkout -->
        <div class="mt-4">
            <h4>Total: <strong>R$ {{ number_format($total, 2, ',', '.') }}</strong></h4>

           <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <button class="btn btn-success mt-2">Finalizar Compra ✅</button>
            </form>


        </div>
    @endif
@endsection
