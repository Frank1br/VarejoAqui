<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>VarejoAqui</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')

    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', sans-serif;
    }

    .transition-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .navbar-brand span {
        font-weight: bold;
        color: #0d6efd;
    }

    .btn {
        transition: 0.2s;
    }

    .btn:hover {
        opacity: 0.9;
    }

    footer {
        font-size: 0.85rem;
        color: #6c757d;
    }

    @keyframes pulse {
    0% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.2); opacity: 1; }
    100% { transform: scale(1); opacity: 0.8; }
}

.badge.bg-danger {
    animation: pulse 1.5s infinite;
}

</style>


</head>
<body>
    <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span>VarejoAqui</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto gap-2">
                        <li class="nav-item"><a class="nav-link" href="{{ route('produtos') }}">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('favoritos.index') }}">Favoritos ❤️</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('carrinho.index') }}">Carrinho 🛒</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pedidos.index') }}">Meus Pedidos 🧾</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('sobre') }}">Sobre</a></li>
                        @php
                    $mensagensNaoLidas = \App\Models\Contact::where('is_read', false)->count();
                        @endphp

                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('mensagens.index') }}">
                                 Mensagem 📬
                                @if($mensagensNaoLidas > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $mensagensNaoLidas }}
                                    </span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('contato') }}">
                                Enviar Mensagem 📨
                                @if($mensagensNaoLidas > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $mensagensNaoLidas }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrar</a></li>
                    @endguest
                </ul>
            </div>
        </div>
        
    </nav>

    


    <!-- Conteúdo -->
    <main class="py-4">
        <div class="container">
            @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: '{{ session('success') }}',
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Erro',
        text: '{{ session('error') }}',
        timer: 4000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('warning'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Atenção',
        text: '{{ session('warning') }}',
        timer: 4000,
        showConfirmButton: false
    });
</script>
@endif

            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
