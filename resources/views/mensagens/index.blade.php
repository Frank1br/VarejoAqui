@extends('layouts.main')

@section('content')
<br><br>
    <h2>Mensagens Recebidas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse ($mensagens as $mensagem)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $mensagem->subject }}</strong>
                <form action="{{ route('mensagens.destroy', $mensagem->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta mensagem?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
            <div class="card-body">
                <p><strong>De:</strong> {{ $mensagem->name }} ({{ $mensagem->email }})</p>
                <p>{{ $mensagem->message }}</p>
                <a href="mailto:{{ $mensagem->email }}" class="btn btn-sm btn-outline-primary">Responder</a>
            </div>
            <div class="card-footer text-muted text-end">
                Recebida em {{ $mensagem->created_at->format('d/m/Y H:i') }}
            </div>
        </div>
    @empty
        <p class="text-muted">Nenhuma mensagem recebida ainda.</p>
    @endforelse

    {{ $mensagens->links() }}
@endsection
