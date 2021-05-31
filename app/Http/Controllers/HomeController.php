<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\product_attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // logged-in
            $kidProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',3)
                ->sum('product_attributes.qty');
            $menProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',4)
                ->sum('product_attributes.qty');
            $womenProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',5)
                ->sum('product_attributes.qty');
            $otherProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',6)
                ->sum('product_attributes.qty');
            $wishdata = DB::table('wishlists')->where('user_id', Auth::id())->count();
            $products = Product::latest()->where('status',1)->get();
            return view('fontend.index',compact('menProductCounts','kidProductCounts','womenProductCounts','otherProductCounts','products','wishdata'));
        } else {
            // not logged-in
            $kidProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',3)
                ->sum('product_attributes.qty');
            $menProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',4)
                ->sum('product_attributes.qty');
            $womenProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',5)
                ->sum('product_attributes.qty');
            $otherProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',6)
                ->sum('product_attributes.qty');
            $wishdata = DB::table('wishlists')->where('user_id', Auth::id())->count();
            $products = Product::latest()->take(12)->where('status',1)->get();
            return view('fontend.index',compact('menProductCounts','kidProductCounts','womenProductCounts','otherProductCounts','products','wishdata'));
        }
    }
}
