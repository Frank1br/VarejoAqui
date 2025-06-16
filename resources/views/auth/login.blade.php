@extends('layouts.main')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-3">
            <img src="{{ asset('images/logo.png') }}" alt="VarejoAqui" width="80">
        </div>

        <h4 class="mb-3 text-center">Entrar no <span class="text-primary">VarejoAqui</span></h4>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
        
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input id="email" type="email" class="form-control" name="email" required autofocus value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Lembrar de mim</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('register') }}">Não tem conta? Registrar</a>
        </div>
    </div>
</div>
@endsection
