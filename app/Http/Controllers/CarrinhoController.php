<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CarrinhoController extends Controller
{
    public function store($id)
    {
        $user = auth()->user();

        // Evita duplicados
        if ($user->carrinho()->where('product_id', $id)->exists()) {
            return back()->with('warning', 'Produto já está no carrinho.');
        }

        $user->carrinho()->attach($id, ['quantity' => 1]);

        return back()->with('success', 'Produto adicionado ao carrinho.');
    }

    public function index()
    {
        $produtos = auth()->user()->carrinho()->with('category')->get();
        return view('carrinho.index', compact('produtos'));
    }

    public function destroy($id)
    {
        auth()->user()->carrinho()->detach($id);
        return back()->with('success', 'Produto removido do carrinho.');
    }
}

