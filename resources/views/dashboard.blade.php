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
                        @if($produto->category)
    <p class="text-muted mb-0">
        <small>Categoria: {{ $produto->category->name }}</small>
    </p>
@endif

                    @endif
                    <div class="card-body">
    <h5 class="card-title">{{ $produto->title }}</h5>
    <p class="card-text">{{ Str::limit($produto->description, 100) }}</p>
    <p class="fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>

    <div class="d-flex justify-content-between">
        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>

        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Excluir</button>
        </form>
    </div>
</div>

                </div>
            </div>
        @empty
            <p class="text-muted">Você ainda não cadastrou nenhum produto.</p>
        @endforelse
    </div>
@endsection
