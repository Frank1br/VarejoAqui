<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function store()
    {
        $user = auth()->user();
        $carrinho = $user->carrinho;

        if ($carrinho->isEmpty()) {
            return back()->with('warning', 'Seu carrinho está vazio.');
        }

        $total = $carrinho->sum(fn($p) => $p->price * $p->pivot->quantity);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $total,
            ]);

            foreach ($carrinho as $produto) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $produto->id,
                    'quantity' => $produto->pivot->quantity,
                    'price' => $produto->price,
                ]);
            }

            $user->carrinho()->detach(); // limpa o carrinho

            DB::commit();

            return redirect()->route('carrinho.index')->with('success', "Pedido #{$order->id} realizado com sucesso!");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erro ao finalizar o pedido: ' . $e->getMessage());
        }
    }
}
