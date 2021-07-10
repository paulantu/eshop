<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\product_attributes;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function Index(Request $request)
    {
        if (Auth::check()) {
            // logged-in

            $categories = Category::with('subcategory')->get();
            $products = Product::with('ProductAttributes')->where('status', 1)->latest()->paginate(12);
            if ($request->ajax()){
                $view = view('data',compact('products'))->render();
                return response()->json(['html'=>$view]);
            }

            return view('fontend.shop',compact('categories', 'products'))->with('user', Auth::user());
        } else {
            // not logged-in
            $categories = Category::with('subcategory')->get();
            $products = Product::with('ProductAttributes')->where('status', 1)->latest()->paginate(12);
            if ($request->ajax()){
                $view = view('data',compact('products'))->render();
                return response()->json(['html'=>$view]);
            }
            return view('fontend.shop',compact('categories', 'products'));
        }
    }
}
