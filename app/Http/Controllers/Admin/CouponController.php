<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class CouponController extends Controller
{
    public function Index(){
        $shopCoupons = Coupon::latest()->paginate(15);
        return view('admin.coupon.index',compact('shopCoupons'));
    }




    public function Store(Request $request){
        $Validation = $request->validate([
            'couponName' => 'required',
            'couponDiscount' => 'required',
            'couponValidity' => 'required'
        ]);


        $CouponStore = new Coupon();

        $CouponStore->coupon_name = strtoupper($request->couponName);
        $CouponStore->coupon_discount = $request->couponDiscount;
        $CouponStore->coupon_validity = $request->couponValidity;
        $CouponStore->created_by = Auth::user()->id;
        $CouponStore->status = $request->status;
        $banner = $request->file('couponBanner');
        if($banner == true) {
            $name_gen = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
            Image::make($banner)->resize(2200, 600)->save('Image/coupon/' . $name_gen);
            $CouponStore->coupon_banner = 'Image/coupon/' . $name_gen;
        }

        $CouponStore->save();
        if($CouponStore){
            $notification = array(
                'message' => 'Coupon added successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }





    public function Edit($id){
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit-coupon',compact('coupon'));
    }










    public function Update(Request $request, $id){
        $Validation = $request->validate([
            'couponName' => 'required',
            'couponDiscount' => 'required',
            'couponValidity' => 'required'
        ]);

        $update = Coupon::find($id);
        $update->coupon_name = strtoupper($request->couponName);
        $update->coupon_discount = $request->couponDiscount;
        $update->coupon_validity = $request->couponValidity;
        $update->created_by = Auth::user()->id;
        $update->status = $request->status;
        $banner = $request->file('couponBanner');
        if($banner == true) {

            // for checking existing file and delete.
            if(file_exists($update->coupon_banner)){
                unlink($update->coupon_banner);
            }

            $name_gen = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
            Image::make($banner)->resize(2200, 600)->save('Image/coupon/' . $name_gen);
            $update->coupon_banner = 'Image/coupon/' . $name_gen;
        }

        $update->save();
        if($update){
            $notification = array(
                'message' => 'Coupon added successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.coupon')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return redirect()->back('admin.coupon')->with($notification);
        }
    }







    public function Destroy($id){
        $removeCoupon = Coupon::findOrFail($id);
        // find & delete file from location
        if(file_exists( $removeCoupon->coupon_banner)){
            unlink( $removeCoupon->coupon_banner);
        }
        //delete data row
        $removeCoupon -> forceDelete();
        if($removeCoupon){
            $notification = array(
                'message' => 'data deleted successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }





}
