<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Category;


class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function produtos(Request $request)
{
    $busca = $request->input('q');

    $query = Product::with('category')->latest();

    if ($busca) {
        $query->where(function ($q) use ($busca) {
            $q->where('title', 'like', "%{$busca}%")
              ->orWhere('description', 'like', "%{$busca}%");
        });
    }

    $produtos = $query->get();

    return view('produtos', compact('produtos', 'busca'));
}

    public function sobre()
    {
        return view('sobre');
    }

    public function contato()
    {
        return view('contato');
    }

    public function enviarContato(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }

    public function produtosPorCategoria($slug)
{
    $categoria = Category::where('slug', $slug)->firstOrFail();
    $produtos = Product::with('category')
        ->where('category_id', $categoria->id)
        ->latest()
        ->get();

    return view('produtos', compact('produtos', 'categoria'));
}
}
