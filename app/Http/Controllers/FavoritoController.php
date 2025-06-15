<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FavoritoController extends Controller
{
    public function store($id)
    {
        $user = auth()->user();
        $user->favoritos()->attach($id);

        return back()->with('success', 'Produto adicionado aos favoritos.');
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $user->favoritos()->detach($id);

        return back()->with('success', 'Produto removido dos favoritos.');
    }

    public function index()
    {
        $favoritos = auth()->user()->favoritos()->with('category')->get();
        return view('favoritos.index', compact('favoritos'));
    }
}
