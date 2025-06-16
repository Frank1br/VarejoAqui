<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class MensagemController extends Controller
{
    public function index()
{
    // Marcar todas as mensagens como lidas
    Contact::where('is_read', false)->update(['is_read' => true]);

    // Buscar todas as mensagens
    $mensagens = Contact::latest()->paginate(10); // Agora retorna um objeto paginado


    return view('mensagens.index', compact('mensagens'));

}

    public function destroy($id)
    {
        $mensagem = Contact::findOrFail($id);
        $mensagem->delete();

        return redirect()->route('mensagens.index')->with('success', 'Mensagem excluída com sucesso!');
    }
}
