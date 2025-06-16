<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\CarrinhoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ProdutoController::class, 'dashboard'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produtos', [HomeController::class, 'produtos'])->name('produtos');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos/store', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::get('/produtos/categoria/{slug}', [HomeController::class, 'produtosPorCategoria'])->name('produtos.categoria');
    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::get('/mensagens', [MensagemController::class, 'index'])->name('mensagens.index');
    Route::delete('/mensagens/{id}', [MensagemController::class, 'destroy'])->name('mensagens.destroy');
    Route::get('/contato', [HomeController::class, 'contato'])->name('contato');
    Route::post('/contato', [HomeController::class, 'enviarContato'])->name('contato.enviar');
    Route::post('/produtos/{id}/favoritar', [FavoritoController::class, 'store'])->name('favoritos.store');
    Route::delete('/produtos/{id}/desfavoritar', [FavoritoController::class, 'destroy'])->name('favoritos.destroy');
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
    Route::post('/carrinho/adicionar/{id}', [CarrinhoController::class, 'store'])->name('carrinho.store');
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::delete('/carrinho/remover/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');


});

require __DIR__.'/auth.php';
