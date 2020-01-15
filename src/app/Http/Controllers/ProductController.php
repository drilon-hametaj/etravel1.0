<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function create($id_prodotto)
    {
        $product = new Product();
        $product->id_wishlist = $id_prodotto;
        $product->product_name = "Prodotto";
        $product->product_description = "Descrizione";
        $product->save();
        return $product;
    }

    public function store()
    {
        $product = new Product();
        $product->id_wishlist = Input::get('id_wishlist');
        $product->product_name = Input::get('product_name');
        $product->product_description = Input::get('product_description');
        $product->save();
        return $product;
    }

    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update($id)
    {
        $product = Product::find($id);
        $product->id_wishlist = Input::get('id_wishlist');
        $product->product_name = Input::get('product_name');
        $product->product_description = Input::get('product_description');
        $product->save();
        return $product;
    }

    //Remove a Wishlist
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

}
