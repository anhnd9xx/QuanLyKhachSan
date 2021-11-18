<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $categories = Cache::remember('categories', 10, function() {
            return Category::get();
        });
    	$products = Product::get();
        $cart = Cart::count();
        $products_featured = Product::all()->take(14);
        $products_sale = Product::where('id', '>=', 79)->limit(9)->get();
        $products_selling = Product::orderBy('id', 'desc')->take(10)->get();
        return view('frontend.index')->with([
            'products' => $products,
            'categories' => $categories,
            'products_featured' => $products_featured,
            'products_sale' => $products_sale,
            'products_selling' => $products_selling,
            'cart' => $cart
        ]);
    }

}
