<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = auth()->user()->orders()->with('items.product')->latest()->get();
        return view('pedidos.index', compact('pedidos'));
    }
}
