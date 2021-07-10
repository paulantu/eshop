<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
                ->where('products.category','=',2)
                ->sum('product_attributes.qty');
            $cosmeticsProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',4)
                ->sum('product_attributes.qty');
            $accessoriesProductCounts = DB::table('products')
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
            $categories = Category::get();
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category')
                ->join('subcategories','subcategories.id','=', 'products.sub_category')
                ->join('brands', 'brands.id', '=', 'products.brand')
                ->select('products.*','categories.name as catName', 'categories.slug as catSlug','subcategories.name as subCatName','subcategories.slug as subCatSlug','brands.name')
                ->where('products.status', 1)
                ->latest()->take(8)->get();
            return view('fontend.index',compact('menProductCounts','kidProductCounts', 'cosmeticsProductCounts', 'accessoriesProductCounts', 'otherProductCounts', 'products', 'wishdata', 'categories'));
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
                ->where('products.category','=',2)
                ->sum('product_attributes.qty');
            $cosmeticsProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',4)
                ->sum('product_attributes.qty');
            $accessoriesProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',5)
                ->sum('product_attributes.qty');
            $otherProductCounts = DB::table('products')
                ->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                ->select('products.category', 'product_attributes.qty')
                ->where('products.category','=',6)
                ->sum('product_attributes.qty');
            $categories = Category::get();
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category')
                ->join('subcategories','subcategories.id','=', 'products.sub_category')
                ->join('brands', 'brands.id', '=', 'products.brand')
                ->select('products.*','categories.name as catName', 'categories.slug as catSlug','subcategories.name as subCatName','subcategories.slug as subCatSlug','brands.name')
                ->where('products.status', 1)
                ->latest()->take(8)->get();
            return view('fontend.index',compact('menProductCounts','kidProductCounts', 'cosmeticsProductCounts', 'accessoriesProductCounts', 'otherProductCounts','products', 'categories'));
        }
    }
}
