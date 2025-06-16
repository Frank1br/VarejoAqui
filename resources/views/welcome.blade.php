<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>VarejoAqui - Produtos Locais com Facilidade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts + Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f8fafc, #e2e8f0);
            color: #1a202c;
        }

        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
        }

        .hero p {
            font-size: 1.2rem;
            color: #4a5568;
            max-width: 600px;
            margin: 1rem auto;
        }

        .btn-custom {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        footer {
            text-align: center;
            font-size: 0.85rem;
            padding: 1rem 0;
            color: #718096;
        }
    </style>
</head>
<body>

    <div class="hero container">
        <div>
            <h1>Bem-vindo ao <span class="text-primary">VarejoAqui</span></h1>
            <p>Conectando você aos melhores produtos de microempreendedores locais. Compre fácil, rápido e com confiança.</p>

            <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                <a href="{{ route('produtos') }}" class="btn btn-primary btn-custom">Ver Produtos</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark btn-custom">Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark btn-custom">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-custom">Registrar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} VarejoAqui. Desenvolvido com Laravel ❤️
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
