<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Cache::remember('categories', 10, function() {
            return DB::table('categories')->get();
        });
        $products = Product::get();
        $cart = Cart::count();

        return view('frontend.shop')->with([
            'categories' => $categories,
            'products' => $products,
            'cart' => $cart]);
    }

    public function show($category_id)
    {
        $categories = Cache::remember('categories', 10, function() {
            return Category::get();
        });
        $product_category = Category::with('products')->find($category_id);
        $products = $product_category->products;
        $cart = Cart::count();

        return view('frontend.shop')->with([
            'categories' => $categories,
            'products' => $products,
            'cart' => $cart]);

    }

        public function showProduct($id){
            $categories = Cache::remember('categories', 10, function() {
                return Category::get();
            });
            $product = Product::find($id);
            $category = Category::find($product->category_id);

            $cart = Cart::count();
            $product_iamges = Product::with('images')->find($id);
            $path = $product_iamges->images;

            return view('frontend.product')->with([
                'categories' => $categories,
                'cart' => $cart,
                'category' => $category,
                'product' => $product,
                'path'=>$path]);
        }
}
