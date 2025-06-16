@extends('layouts.main')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
        @forelse($produtos as $produto)
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

                        @if($produto->category)
                            <p class="text-muted mb-1">
                                <small>Categoria: {{ $produto->category->name }}</small>
                            </p>
                        @endif

                        <p class="card-text flex-grow-1">{{ Str::limit($produto->description, 80) }}</p>
                        <!-- Botão que abre o modal -->
                        <button type="button" class="btn btn-sm btn-outline-secondary mt-2" data-bs-toggle="modal" data-bs-target="#modalProduto{{ $produto->id }}">
                            Ver detalhes
                        </button>

                        <p class="fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>

                        @auth
                            <form action="{{ auth()->user()->favoritos->contains($produto->id) 
                                ? route('favoritos.destroy', $produto->id) 
                                : route('favoritos.store', $produto->id) }}" method="POST" class="mt-2">
                                @csrf
                                @if(auth()->user()->favoritos->contains($produto->id))
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger mt-auto">Desfavoritar ❤️</button>
                                @else
                                    <button class="btn btn-sm btn-outline-primary mt-auto">Favoritar 🤍</button>
                                @endif
                            </form>
                        @endauth
                    </div>
                </div>
                <!-- Modal de Detalhes -->
<div class="modal fade" id="modalProduto{{ $produto->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $produto->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel{{ $produto->id }}">{{ $produto->title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body d-flex flex-column flex-md-row gap-4">
        @if($produto->image_path)
            <img src="{{ asset('storage/' . $produto->image_path) }}" class="img-fluid rounded shadow" style="max-width: 300px;">
        @endif

        <div>
            @if($produto->category)
                <p><strong>Categoria:</strong> {{ $produto->category->name }}</p>
            @endif

            <p><strong>Descrição:</strong> {{ $produto->description }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($produto->price, 2, ',', '.') }}</p>

            @auth
                <form action="{{ auth()->user()->favoritos->contains($produto->id) 
                    ? route('favoritos.destroy', $produto->id) 
                    : route('favoritos.store', $produto->id) }}" method="POST">
                    @csrf
                    @if(auth()->user()->favoritos->contains($produto->id))
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Desfavoritar ❤️</button>
                    @else
                        <button class="btn btn-outline-primary">Favoritar 🤍</button>
                    @endif
                </form>
            @endauth
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

            </div>
        @empty
            <p class="text-muted">Nenhum produto encontrado.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $produtos->links() }}
    </div>
@endsection
