<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductParameter;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'product_categories.category_id', '=', 'categories.id')
            ->join('product_prices', 'products.id', '=', 'product_prices.product_id')
            ->select('products.*', 'product_prices.price', 'product_prices.id as price_id', 'product_prices.main_image', 'categories.name as category_name')
            ->get();
        return view('index', compact('products', 'categories'));
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function product($id, $price_id)
    {
        $product = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->join('categories', 'product_categories.category_id', '=', 'categories.id')
            ->join('product_prices', 'products.id', '=', 'product_prices.product_id')
            ->select('products.*', 'product_prices.price', 'product_prices.main_image', 'categories.name as category_name')
            ->where('product_prices.id', $price_id)
            ->find($id);
        $product_parameters = ProductParameter::where('product_price_id', $price_id)->get();
        $all_alter_product_parameters = ProductParameter::join('product_prices', 'product_parameters.product_price_id', '=', 'product_prices.id')
            ->where('product_prices.product_id', $id)
            ->where('product_parameters.product_price_id', '!=', $price_id)
            ->get();
        ;
        $alter_product_parameters = collect($all_alter_product_parameters)->unique('value_parameter');
        return view('product', compact('product', 'product_parameters', 'alter_product_parameters'));
    }
    public function products_in_cart()
    {
        return view('cart');
    }

}