<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
   public function AddToWishlist(Request $request,$id){
       $user_id = Auth::id();
       $check_data = Wishlist::where('user_id', $user_id)->where('product_id', $id)->first();
       $data = array(
           'user_id' => $user_id,
           'product_id' => $id,
       );
        if (Auth::check()){
            if($check_data){
                return response()->json(['error' => 'Already has on your wishlist.']);
            }else{
                $wish = new Wishlist();
                $wish->user_id = $user_id;
                $wish->product_id = $id;
                $wish->save();
                return response()->json(['success' => 'Product add to wishlist']);
            }
        }else{
            return response()->json(['error' => 'Please login first.']);
        }
   }





   public function GetMyWishlistData(){

       if (Auth::check()) {
           $WishData = DB::table('products')
               ->join('wishlists', 'products.id', '=', 'wishlists.product_id')
               ->select('products.*', 'wishlists.*')
               ->where('wishlists.user_id','=',Auth::id())
               ->get();
           return view('fontend.wishlist', compact('WishData'));
       }else{
           return redirect()->back()->with('alert', 'Log in first!');
       }
   }



   public function Destroy($wish_pro_id){
       $remove = Wishlist::where('user_id',Auth::id())->where('product_id',$wish_pro_id)->forceDelete();
       if ($remove){
           return response()->json(['success' => 'Product successfully removed from wishlist']);
       }
       else{
           return response()->json(['error' => 'Please try again later.']);
       }
   }

}
