@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Produtos</h2>
    


    @php
        $todasCategorias = \App\Models\Category::all();
    @endphp

    <form action="{{ route('produtos') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Buscar produtos..." value="{{ $busca ?? '' }}">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>


    <div class="mb-4">
        
        <h4 class="mb-2">Filtrar por categoria:</h4>
        <div class="d-flex flex-wrap gap-2">
            @foreach($todasCategorias as $cat)
                <a href="{{ route('produtos.categoria', $cat->slug) }}" class="btn btn-outline-secondary btn-sm {{ isset($categoria) && $categoria->id === $cat->id ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>

    <h2 class="mb-4">
    Produtos {{ isset($categoria) ? 'em ' . $categoria->name : '' }}
</h2>

    <div class="row">
        {{-- Loop para exibir os produtos --}}
        @forelse($produtos as $produto)
        
         @if($produto->category)
            <p class="text-muted mb-1">
                <small>Categoria: {{ $produto->category->name }}</small>
            </p>
        @endif


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
