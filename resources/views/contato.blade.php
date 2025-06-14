@extends('layouts.main')

@section('content')
    <h2>Fale conosco</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contato.enviar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="nome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" name="subject" class="form-control" id="assunto" required>
        </div>

        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea name="message" class="form-control" id="mensagem" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
