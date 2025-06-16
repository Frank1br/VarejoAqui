@extends('layouts.main')

@section('content')
    <h2>Meu Carrinho</h2>

    @if($produtos->isEmpty())
        <p class="text-muted">Seu carrinho está vazio.</p>
    @else
        <div class="row">
            @foreach($produtos as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($produto->image_path)
                            <img src="{{ asset('storage/' . $produto->image_path) }}"
                                 class="card-img-top object-fit-cover"
                                 style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->title }}</h5>
                            <p class="fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>

                            <form action="{{ route('carrinho.destroy', $produto->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Remover 🗑️</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
