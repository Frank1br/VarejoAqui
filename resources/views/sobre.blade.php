@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Sobre o VarejoAqui</h1>
        <p class="lead text-muted">Conectando consumidores a microempreendedores locais.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <h4 class="text-secondary">🌟 O que é o VarejoAqui?</h4>
            <p>O <strong>VarejoAqui</strong> é uma plataforma criada para facilitar a compra e venda de produtos oferecidos por pequenos empreendedores da sua região. Queremos aproximar quem produz de quem precisa — de forma simples, acessível e digital.</p>
        </div>

        <div class="col-md-6">
            <h4 class="text-secondary">🧩 Problema que resolvemos</h4>
            <p>Muitos microempreendedores não têm acesso a plataformas acessíveis para divulgar seus produtos. O VarejoAqui permite que seus produtos sejam encontrados, visualizados, favoritados e comprados com facilidade.</p>
        </div>

        <div class="col-md-6">
            <h4 class="text-secondary">🚀 Funcionalidades</h4>
            <ul>
                <li>Catálogo de produtos com categorias</li>
                <li>Busca por nome e filtro por categoria</li>
                <li>Favoritos, Carrinho e Checkout</li>
                <li>Sistema de mensagens e pedidos</li>
            </ul>
        </div>

        <div class="col-md-6">
            <h4 class="text-secondary">👨‍💻 Quem desenvolveu?</h4>
            <p>O projeto foi desenvolvido por <strong>Frank Oliveira</strong>, com foco em boas práticas de desenvolvimento web, usabilidade, e escalabilidade, utilizando Laravel + Bootstrap.</p>
        </div>

        <div class="col-12 text-center mt-4">
            <a href="{{ route('produtos') }}" class="btn btn-primary btn-lg">Explorar Produtos</a>
        </div>
    </div>
</div>
@endsection
