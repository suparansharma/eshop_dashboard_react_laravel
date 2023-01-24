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

    public function list(){
        return Products::all();
    }

    public function delete($id){
        $result = Products::where("id",$id)->delete();
        if($result){
            return ["result"=>"product has been delete"];
        }

        else{
            return "operation failed";
        }
        // return $id;
    }


    public function getProduct($id){
        $result = Products::find($id);
        return  $result;
    }

    public function search($key){
        $result = Products::where('name','Like',"%$key%")->get();
        return $result;
    }
}
