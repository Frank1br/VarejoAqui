@extends('layouts.main')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<br><br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Meus Produtos</h2>
        
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo Produto</a>
    </div>

    <div class="row">
        @forelse ($produtos as $produto)
            <div class="col-md-4 mb-4">
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

        <div class="d-flex justify-content-between mt-auto">
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
