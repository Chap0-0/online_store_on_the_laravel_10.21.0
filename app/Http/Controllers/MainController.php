<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::join('product_prices', 'products.id', '=', 'product_prices.product_id')
            ->join('product_colors', 'product_prices.color_id', '=', 'product_colors.id')
            ->select('products.*', 'product_prices.price', 'product_colors.name_color', 'product_colors.image_url')
            ->get();
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