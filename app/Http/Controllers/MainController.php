<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Property;
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
            ->select('properties.name_property as property_select_name', 'product_property_values.property_value as property_select_value', 'product_property_values.property_id')
            ->get();

        $allProperties = ProductType::where('product_id', $prod_id)
            ->join('product_property_values', 'product_types.id', '=', 'product_property_values.product_type_id')
            ->join('properties', 'product_property_values.property_id', '=', 'properties.id')
            ->select('properties.name_property as property_name', 'product_property_values.property_value as property_value')
            ->distinct()
            ->get();

        return view('product', compact('productType', 'selectProperties', 'allProperties', 'product'));
    }
    public function changeProductType($productTypeId, $selectProp, $propValue)
    {
        $oldProperties = productPropertyValue::where('product_type_id', $productTypeId)
            ->get();

        $newProperties = [];
        foreach ($oldProperties as $property) {
            $newProperties[] = [
                'property_id' => $property->property_id,
                'property_value' => $property->property_value,
            ];
        }
        $newProduct = null;
        foreach ($newProperties as $key => $property) {
            if ($property['property_id'] == $selectProp) {
                $newProperties[$key]['property_value'] = $propValue;
                $newProduct = $this->findProductByProperties($newProperties);

                if ($newProduct) {
                    break;
                }
            }
        }

        if ($newProduct) {
            return response()->json(['newProductId' => $newProduct->id]);
        }
    }

    private function findProductByProperties($properties)
    {
        $product = ProductType::query();
        foreach ($properties as $property) {
            $product->whereHas('properties', function ($query) use ($property) {
                $query->where('property_id', $property['property_id'])
                    ->where('property_value', $property['property_value']);
            });
        }
        return $product->first();
    }


    public function delProductFromCart($idProductType)
    {
        $productType = CartProduct::where('product_type_id', $idProductType);
        if (!$productType) {
            return response()->json(['message' => 'Продукт не найден'], 404);
        }
        $productType->delete();
        return response()->json(['message' => 'Продукт успешно удален из корзины']);
    }
    public function addToCart($idProductType)
    {
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
