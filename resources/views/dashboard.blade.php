@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Meus Produtos</h2>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo Produto</a>
    </div>

    <div class="row">
        @forelse ($produtos as $produto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($produto->image_path)
                        <img src="{{ asset('storage/' . $produto->image_path) }}" class="card-img-top" alt="{{ $produto->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->title }}</h5>
                        <p class="card-text">{{ Str::limit($produto->description, 100) }}</p>
                        <p class="fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Você ainda não cadastrou nenhum produto.</p>
        @endforelse
    </div>
@endsection
