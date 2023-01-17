<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function addProduct(Request $req){
        return $req->file('file')->store('products');
    }
}
