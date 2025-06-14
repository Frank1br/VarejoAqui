<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function produtos()
    {
        $produtos = Product::latest()->get();
        return view('produtos', compact('produtos'));
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
}
