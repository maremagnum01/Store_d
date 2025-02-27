<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $stocks = Store::all();
        // dd($products);
        return view('shop')->withTitle('E-Commerce Store-D | Shop')->with(['stocks' => $stocks]);
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('E-Commerce Store-D | Store')->with(['cartCollection' => $cartCollection]);
        // echo $cartCollection;

    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success', 'Item eliminado del carrito');
    }

    public function add(Request $request)
    {
        \Cart::add(array(
            'id' => $request->id,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'precio' => $request->precio,
            'color' => $request->color,
            'memoria' => $request->memoria,
            'img' => $request->img,
            'estado' => $request->estado,
            'stock' => $request->stock,
            'quantity' => $request->quantity

        ));
        // return redirect()->route('cart.index')->with('success', 'Item agregado a tu carrito!');
        return redirect()->back()->with('success', 'Item agregado a tu carrito!');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id,
        array(
            'stock' => $request->stock,
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
             )
        ));
        return redirect()->back()->with('success', 'Carrito actualizado!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->back()->with('success', 'Se vacio el carrito.');
    }
}
