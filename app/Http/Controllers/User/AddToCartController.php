<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $products = Product::findOrFail($id);
        $image = json_decode($products->images);
        $thumbnail = $image[0];
        if ($products->discount !== null ){
            $price = $products->selling_price -($products->selling_price * ($products->discount / 100));
            Cart::add([
                'id' => $id,
                'name' => $products->title,
                'qty' => $request->qty,
                'price' => $price,
                'weight' => 10,
                'options' => [
                    'size' => $request->size,
                    'image' => $thumbnail,
                ],
            ]);

            return response()->json(['success' => 'product added to your cart list.']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $products->title,
                'qty' => $request->qty,
                'price' => $products->selling_price,
                'weight' => 10,
                'options' => [
                    'size' => $request->size,
                    'image' => $thumbnail,
                ],
            ]);

            return response()->json(['success' => 'product added to your cart list.']);
        }
    }



    //mini cart area



    public function ViewCart(){
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();
        $cartTax = Cart::tax();
        $cartSubTotal = Cart::subtotal();
        $total = Cart::priceTotal();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => $cartTotal,
            'cartTax' => $cartTax,
            'cartSubTotal' => $cartSubTotal,
            'total' => $total
        ));
    }


//cart product remove from cart list

    public function RemoveFromCartList($id){
        $cartProduct = Cart::remove($id);
        return response()->json(['success'=>'Product successfully removed from cart.']);
    }






}
