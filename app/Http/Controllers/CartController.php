<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function add(Product $product){
        $user = User::Find(Auth::id());

        if (  $user){
            $cart=$user->carts()->first();
            $exists = $cart->products->contains($product);
            if ($exists){
                return redirect()->route('index');
            }
        $cart->products()->attach($product);
        $cart->save();
        return redirect()->route('index');}
        else{
            return redirect()->route('login');}



    }

    public function cart()
    {
        $user = User::Find(Auth::id());
        $cart=$user->carts()->first();
        $p_count=$cart->products()->count();
        $products=$cart->products;
        $sub_total=0;
        foreach ($products as $product){
            $sub_total+= $product->price;
        }
        $total=$sub_total+5;
        return view('cart.cart', compact('products','p_count','total','sub_total'));
    }

    public function delete($id)
    {
        $user = User::Find(Auth::id());
        $cart=$user->carts()->first();
        $cart->products()->detach($id);
        return redirect()->route('cart.index');
    }


}
