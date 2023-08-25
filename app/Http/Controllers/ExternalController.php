<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ExternalController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->take(8)->get();
        return view('externalLayout.home',compact('products'));
    }

    public function shopIndex()
    {
        $products = Product::orderBy('created_at','desc')->paginate(15);
        return view('external.shop',compact('products'));
    }

    public function showProduct($id)
    {
        $product = Product::find($id);

        return view('external.productdetail',compact('product'));
    }

}
