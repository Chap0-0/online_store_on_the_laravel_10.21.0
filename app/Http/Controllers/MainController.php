<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function categories()
    {
        return view('categories');
    }
    public function category($category)
    {
        return view('category', compact('category'));
    }
    public function product($product = null)
    {
        return view('product', ['product' => $product]);
    }
}