@extends('layouts.main')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="max-width: 450px; width: 100%;">
        <h4 class="mb-3 text-center">Criar Conta no <span class="text-primary">VarejoAqui</span></h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input id="name" type="text" class="form-control" name="name" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input id="email" type="email" class="form-control" name="email" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Já tem conta? Entrar</a>
        </div>
    </div>
</div>
@endsection
