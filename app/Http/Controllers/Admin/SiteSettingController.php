<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogoHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SiteSettingController extends Controller
{
    public function Index(){
        $myLogos = LogoHistory::latest()->paginate(10);
        return view('admin/sitesetting/logosetup', compact('myLogos'));
    }




    public function Active($id){
        $logoActive = LogoHistory::find($id)->update(['status' => 1]);
//        $logoActive = LogoHistory::find($id);
//        dd($logoActive);
        if ($logoActive == true) {
            $notification = array(
                'message' => 'logo activated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'logo deactivated successfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function Inactive($id){
        $logoInactive = LogoHistory::find($id)->update(['status' => 0]);
//        $logoInactive = LogoHistory::find($id);
//        dd($logoInactive);
        if ($logoInactive == true) {
            $notification = array(
                'message' => 'logo activated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'logo deactivated successfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }






    public function Store(Request $request){
        $logoHistory = new LogoHistory();

        $logo = $request->file('store_logo');
        if ($logo == true){
        $name_gen = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
        Image::make($logo)->resize(150,70)->save('Image/logo/'. $name_gen);
        $logoHistory->logo = 'Image/logo/'. $name_gen;
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $logoHistory->uploaded_by = Auth::user()->id;
        $logoHistory->save();


        if($logoHistory){
            $notification = array(
                'message' => 'data added successfully',
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








}
