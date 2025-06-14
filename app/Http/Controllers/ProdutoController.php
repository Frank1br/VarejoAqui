<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProdutoController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $produtos = $user->products()->latest()->get();

        return view('dashboard', compact('produtos'));
    }

    public function create()
{
    $categorias = Category::all();
    return view('produtos.create', compact('categorias'));
}

    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric',
        'image_path'  => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id',

    ]);

    $data = $request->only(['title', 'description', 'price', 'category_id']);
    $data['user_id'] = auth()->id();

    if ($request->hasFile('image_path')) {
        $data['image_path'] = $request->file('image_path')->store('produtos', 'public');
    }

    Product::create($data);

    return redirect()->route('dashboard')->with('success', 'Produto cadastrado com sucesso!');
}

public function edit($id)
{
    $produto = Product::where('user_id', auth()->id())->findOrFail($id);
    $categorias = Category::all();
    return view('produtos.edit', compact('produto', 'categorias'));
}


public function update(Request $request, $id)
{
    $produto = Product::where('user_id', auth()->id())->findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image_path' => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id',

    ]);

   $data = $request->only(['title', 'description', 'price', 'category_id']);


    if ($request->hasFile('image_path')) {
        $data['image_path'] = $request->file('image_path')->store('produtos', 'public');
    }

    $produto->update($data);
    
    return redirect()->route('dashboard')->with('success', 'Produto atualizado com sucesso!');
}

public function destroy($id)
{
    $produto = Product::where('user_id', auth()->id())->findOrFail($id);
    $produto->delete();

    return redirect()->route('dashboard')->with('success', 'Produto excluído com sucesso!');
}


    // Outras funções virão depois (store, edit, delete)
}
