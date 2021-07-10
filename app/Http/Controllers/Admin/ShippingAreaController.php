<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingThana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAreaController extends Controller
{



    public function Index(){
        $shippingDivision = ShippingDivision::latest()->paginate(10);

        return view('admin.shipping.division',compact('shippingDivision'));
    }



    public function Store(Request $request){
        $validation = $request->validate([
            'divisionName' => 'required',
        ]);


        $divisionStore = new ShippingDivision();

        $divisionStore->division_name = $request->divisionName;
        $divisionStore->created_by = Auth::user()->id;
        $divisionStore->status = $request->status;

        $divisionStore->save();

        if($divisionStore){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.shipping.division')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.shipping.division')->with($notification);
        }

    }





    public function Edit($id){
        $divisionEdit = ShippingDivision::find($id);
        return view('admin.shipping.edit-division',compact('divisionEdit'));
    }




    public function Update(Request $request){
        $validation = $request->validate([
            'divisionName' => 'required',
        ]);


        $divisionUpdate = ShippingDivision::find($request->id);

        $divisionUpdate->division_name = $request->divisionName;
        $divisionUpdate->created_by = Auth::user()->id;
        $divisionUpdate->status = $request->status;

        $divisionUpdate->save();

        if($divisionUpdate){
            $notification = array(
                'message' => 'data updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.shipping.division')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.shipping.division')->with($notification);
        }
    }






    public function Destroy($id){
        $divisionDestroy = ShippingDivision::find($id)->forceDelete();

        if($divisionDestroy){
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
















//    Shipping District Section start

    public function DistrictView(){
        $shippingDistrict = ShippingDistrict::latest()->paginate(10);
        $shippingDivision = ShippingDivision::get();
        return view('admin.shipping.district',compact('shippingDistrict','shippingDivision'));
    }






    public function DistrictStore(Request $request){
        $validation = $request->validate([
            'divisionName' => 'required',
            'districtName' => 'required',
        ]);


        $districtStore = new ShippingDistrict();

        $districtStore->division_id = $request->divisionName;
        $districtStore->district_name = $request->districtName;
        $districtStore->created_by = Auth::user()->id;
        $districtStore->status = $request->status;

        $districtStore->save();

        if($districtStore){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.shipping.district')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.shipping.district')->with($notification);
        }

    }











    public function DistrictEdit($id){
        $districtEdit = ShippingDistrict::with('Districts')->find($id);
        $divisions = ShippingDivision::get();
        return view('admin.shipping.edit-district',compact('districtEdit', 'divisions'));
    }




    public function DistrictUpdate(Request $request){
        $validation = $request->validate([
            'divisionName' => 'required',
            'districtName' => 'required',
        ]);


        $districUpdate = ShippingDistrict::find($request->id);

        $districUpdate->division_id = $request->divisionName;
        $districUpdate->district_name = $request->districtName;
        $districUpdate->created_by = Auth::user()->id;
        $districUpdate->status = $request->status;

        $districUpdate->save();

        if($districUpdate){
            $notification = array(
                'message' => 'data updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.shipping.district')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.shipping.district')->with($notification);
        }
    }






    public function DistrictDestroy($id){
        $districDestroy = ShippingDistrict::find($id)->forceDelete();

        if($districDestroy){
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









//    Shipping District Section start


    public function Districtdependency($id){
        $data = ShippingDistrict::where('division_id', $id)->pluck('district_name', 'id');
        return json_encode($data);
    }




    public function ThanaView(){
        $shippingDivision = ShippingDivision::get();
        $shippingThana = ShippingThana::latest()->paginate(30);
        return view('admin.shipping.thana', compact('shippingThana','shippingDivision'));
    }






    public function ThanaStore(Request $request){
        $validation = $request->validate([
            'divisionName' => 'required',
            'districtName' => 'required',
            'thanaName' => 'required',
        ]);


        $thanaStore = new ShippingThana();

        $thanaStore->division_id = $request->divisionName;
        $thanaStore->district_id = $request->districtName;
        $thanaStore->thana_name = $request->thanaName;
        $thanaStore->created_by = Auth::user()->id;
        $thanaStore->status = $request->status;

        $thanaStore->save();

        if($thanaStore){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.shipping.thana')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.shipping.thana')->with($notification);
        }

    }











    public function ThanaEdit($id){
        $thanaEdit = ShippingThana::with('Districts')->find($id);
        $divisions = ShippingDivision::get();
        return view('admin.shipping.edit-thana',compact('thanaEdit', 'divisions'));
    }




    public function ThanaUpdate(Request $request){
        $validation = $request->validate([
            'divisionName' => 'required',
            'districtName' => 'required',
            'thanaName' => 'required',
        ]);


        $ThanaUpdate = ShippingThana::find($request->id);

        $ThanaUpdate->division_id = $request->divisionName;
        $ThanaUpdate->district_id = $request->districtName;
        $ThanaUpdate->thana_name = $request->thanaName;
        $ThanaUpdate->created_by = Auth::user()->id;
        $ThanaUpdate->status = $request->status;

        $ThanaUpdate->save();

        if($ThanaUpdate){
            $notification = array(
                'message' => 'data updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.shipping.thana')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.shipping.thana')->with($notification);
        }
    }






    public function ThanaDestroy($id){
        $ThanaDestroy = ShippingThana::find($id)->forceDelete();

        if($ThanaDestroy){
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
