<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{

    public function index(Request  $request)
    {
        $user = User::Find(Auth::id());
        if($user){
        $cart=$user->carts()->first();
        $p_count=$cart->products()->count();}
        else{
            $p_count=0;
        }
        if ($request->input('search')){
            $products = Product::where('name', 'like', '%'. $request->input('search').'%')->paginate(6);

        }

        elseif ($request->input('wireless')){
            $products = Product::where('is_wireless', 1)->paginate(6);

        }
        elseif ($request->input('wired')){
            $products = Product::where('is_wireless', 0)->paginate(6);

        }
        else {
            $products = Product::paginate(6);
        }

        return view('products.products', compact('products','p_count'));
    }

    public function create(){
        $products = Product::all();
        return view('products.create')->with('products',$products);
    }

    public function save(ProductRequest $request){


        $post = new Product($request->all());
        $post -> is_wireless = $request->input('wireless')=="on";
        $post->save();
        return $this->index($request);

    }


    public function delete(Request $request,Product $product){
        $product->delete();
        return $this->index($request);

    }






}
