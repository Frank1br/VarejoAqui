@extends('layouts.main')

@section('content')
    <h2>Editar Produto</h2>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control" value="{{ $produto->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $produto->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $produto->price }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem (opcional)</label>
            <input type="file" name="image_path" class="form-control">
            @if($produto->image_path)
                <p class="mt-2"><img src="{{ asset('storage/' . $produto->image_path) }}" height="100"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
@endsection
