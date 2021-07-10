<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\product_attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    public function Index($category, $p_code)
    {
        if (Auth::check()) {
            // logged-in
            $categories = Category::where('slug', $category)->first();
            $products = Product::where('p_code', $p_code)->first();
            $pro_id = $products->id;
            $productWithAttributes = product_attributes::where('product_id', $pro_id)->get();
            return view('fontend.product_details',compact('categories','products','productWithAttributes'))->with('user', Auth::user());
        } else {
            // not logged-in
            $categories = Category::where('slug', $category)->first();;
            $products = Product::where('p_code', $p_code)->first();
            $pro_id = $products->id;
            $productWithAttributes = product_attributes::where('product_id', $pro_id)->get();
            return view('fontend.product_details',compact('categories','products','productWithAttributes'));
        }
    }
}
