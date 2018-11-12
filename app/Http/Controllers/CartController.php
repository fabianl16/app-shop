<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save();

    	$notification = 'Pedido registrado, te contactaremos pronto via Mail';

    	return back()->with(compact('notification'));
    }
}
