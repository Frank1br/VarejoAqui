@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Produtos</h2>

    <div class="row">
        {{-- Loop para exibir os produtos --}}
        @forelse($produtos as $produto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($produto->image_path)
                        <img src="{{ asset('storage/' . $produto->image_path) }}" class="card-img-top" alt="{{ $produto->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->title }}</h5>
                        <p class="card-text">{{ Str::limit($produto->description, 100) }}</p>
                        <p><strong>R$ {{ number_format($produto->price, 2, ',', '.') }}</strong></p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Nenhum produto encontrado.</p>
        @endforelse
    </div>
@endsection
