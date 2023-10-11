<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPropertyValue;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::join('product_types', 'products.id', '=', 'product_types.product_id')
            ->select('products.*', 'product_types.name_type', 'product_types.price', 'product_types.main_image', 'product_types.id as type_id')
            ->get();
        return view('index', compact('products'));
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function product($id)
    {
        $product = ProductType::find($id)
            ->join('products', 'product_types.product_id', '=', 'products.id')
            ->select('products.id as prod_id', 'products.name')
            ->first();

        if ($product) {
            $prod_id = $product->prod_id;
        };
        $productType = ProductType::find($id);

        $selectProperties = ProductPropertyValue::where('product_type_id', $id)
            ->join('properties', 'product_property_values.property_id', '=', 'properties.id')
            ->select('properties.name_property as property_select_name', 'product_property_values.property_value as property_select_value')
            ->get();

        $allProperties = ProductType::where('product_id', $prod_id)
            ->join('product_property_values', 'product_types.id', '=', 'product_property_values.product_type_id')
            ->join('properties', 'product_property_values.property_id', '=', 'properties.id')
            ->select('properties.name_property as property_name', 'product_type_id', 'product_property_values.property_value as property_value')
            ->distinct()
            ->get();

        return view('product', compact('productType', 'selectProperties', 'allProperties', 'product'));
    }
    public function changeProductType($productType)
    {
        // Здесь вы можете выполнить необходимые операции для обновления типа продукта
        // и вернуть новый HTML-код для элемента
        $productPrice = ProductType::find($productType);

        $newHTML = '<p class="text-2xl font-bold" >Цена: ' . $productPrice->price . ' руб.</p>';

        return $newHTML;
    }
    public function addToCart($idProductType)
    {
        // Здесь добавьте код для добавления продукта в корзину, используя данные из $productType.
        $productType = ProductType::find($idProductType);
        if (!$productType) {
            return response()->json(['message' => 'Продукт не найден'], 404);
        }
        $cart = Cart::where('user_id', Auth::id())->first();
        CartProduct::create([
            'cart_id' => $cart->id,
            'product_type_id' => $productType->id,
            'price_products' => $productType->price,
            'quantity' => 1,
        ]);
        // Затем верните подтверждение в виде JSON-ответа.
        return response()->json(['message' => 'Продукт успешно добавлен в корзину']);
    }
    public function products_in_cart()
    {
        $products = Cart::where('user_id', Auth::id())
            ->join('cart_products', 'carts.id', '=', 'cart_products.cart_id')
            ->join('product_types', 'cart_products.product_type_id', '=', 'product_types.id')
            ->join('products', 'product_types.product_id', '=', 'products.id')
            ->select('product_types.name_type', 'product_types.id as type_id', 'product_types.main_image', 'cart_products.price_products as price', 'products.name')
            ->get();
        return view('cart', compact('products'));
    }
}
