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

    $total = $produtos->sum(function ($produto) {
        return $produto->price * $produto->pivot->quantity;
    });

    return view('carrinho.index', compact('produtos', 'total'));
}


    public function destroy($id)
    {
        auth()->user()->carrinho()->detach($id);
        return back()->with('success', 'Produto removido do carrinho.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:99',
    ]);

    auth()->user()->carrinho()->updateExistingPivot($id, ['quantity' => $request->quantity]);

    return back()->with('success', 'Quantidade atualizada.');
}

}

