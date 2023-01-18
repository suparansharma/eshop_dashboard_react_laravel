<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function addProduct(Request $req){

        $product = new Products;
        $product->name=$req->input('name');
        $product->price=$req->input('price');
        $product->description=$req->input('description');
        // $Product->price=$req->input('price');
        $product->file_path=$req->file('file_path')->store('product');
        $product->save();
        return $product;
    }
}
