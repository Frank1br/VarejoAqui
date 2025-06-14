<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class MensagemController extends Controller
{
    public function index()
    {
        $mensagens = Contact::latest()->paginate(10);
        return view('mensagens.index', compact('mensagens'));
    }

    public function destroy($id)
    {
        $mensagem = Contact::findOrFail($id);
        $mensagem->delete();

        return redirect()->route('mensagens.index')->with('success', 'Mensagem excluída com sucesso!');
    }
}
