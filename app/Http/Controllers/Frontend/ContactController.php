<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $categories = Cache::remember('categories', 10, function() {
            return DB::table('categories')->get();
        });
        $cart = Cart::count();
        return view('frontend.contact')->with([
            'categories' => $categories,
            'cart' => $cart]);
    }
}
