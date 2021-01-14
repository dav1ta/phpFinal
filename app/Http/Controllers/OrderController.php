<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function create(){
        $user = User::Find(Auth::id());
        $cart=$user->carts()->first();
        $products=$cart->products;
        $total=5;
        $names="";
        foreach ($products as $product){
            $total+=$product->price;
            $names = $names . $product->name . " ";
        }

        return view('checkout.checkout', compact('total','names','user'));
    }


    public function buy(){

        $user = User::Find(Auth::id());
        $cart=$user->carts()->first();
        $products=$cart->products;
        $total=5;
        $names="";
        foreach ($products as $product){
            $total+=$product->price;
            $names = $names . $product->name . " ";
        }

        $order = new Order(['user_id'=>$user->id,'product_names'=>$names,'total'=>$total,'address'=>$user->address]);
        $order ->save();
        $user->cash = $user->cash-$total;
        $user->save();

        Mail::raw('You bought  ' . $names . 'total ' . $total, function ($message) use ($user) {
            $message -> to($user->email)
                ->subject('New buy');
        });


        $details = [
            'subject' => 'order',
            'body' => 'your order confirmed '. $names,
            'price' => $total,
        ];

        $order->notify(new OrderConfirmed($details));

        return view('buy.buy');
    }

    public function orders()
    {

        $user = User::Find(Auth::id());
        $orders = $user->orders;
        return view('orders.orders', compact('orders','user'));

    }


}
