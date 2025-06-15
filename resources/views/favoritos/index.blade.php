@extends('layouts.main')
<style>
    .transition-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
</style>

@section('content')
    <h2>Meus Favoritos</h2>

    <div class="row">
    @forelse($favoritos as $produto)
        <div class="col-md-4 mb-4 d-flex">
            <div class="card w-100 h-100 d-flex flex-column shadow-sm border-0 transition-card">
                @if($produto->image_path)
                    <img src="{{ asset('storage/' . $produto->image_path) }}"
                         class="card-img-top object-fit-cover"
                         style="height: 200px; object-fit: cover;"
                         alt="{{ $produto->title }}">
                @endif

                <div class="card-body flex-grow-1 d-flex flex-column">
                    <h5 class="card-title">{{ $produto->title }}</h5>
                    <p class="text-muted"><small>{{ $produto->category->name ?? 'Sem categoria' }}</small></p>
                    <p class="card-text flex-grow-1">{{ Str::limit($produto->description, 80) }}</p>
                    <p class="fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>

                    <form action="{{ route('favoritos.destroy', $produto->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger mt-auto">Remover dos Favoritos ❤️</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Você ainda não favoritou nenhum produto.</p>
    @endforelse
</div>

@endsection
