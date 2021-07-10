<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    // brand view page
    public function Index(){
        $brands = Brand::latest()->paginate(10);
        $trashes = Brand::onlyTrashed()->latest()->get();
        return view('admin.category.brand', compact('brands', 'trashes'));
    }

    // brand store
    public function Store(Request $request){

        $brands = new Brand();

        $brands->name = $request->name;
        $brands->slug = Str::slug($request->name, '-');
        $brands->created_by = Auth::user()->id;

        $logo = $request->file('brand_logo');
        if($logo == true) {
            $name_gen = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(200, 200)->save('Image/brand/' . $name_gen);
            $brands->brand_logo = 'Image/brand/' . $name_gen;
        }

        $brands->save();


        if($brands){
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


    // categoey edit page

    public function Edit($id){
        $brands = Brand::find($id);
        return view('admin.category.edit-brand', compact('brands'));
    }



    // brand Update

    public function Update(Request $request){

        $brand_validation = $request->validate([
            'name' => 'required|unique:brands,name|max:50',
            'brand_logo' => 'max:2048|file|mimes:jpg,jpeg,png,csv,pdf'
        ],
            ['name.required' => 'Please input brand name'],
            ['name.unique' => 'Brand Name will be unique'],
            ['name.max' => 'Brand name will maximum 50 charecter'],
            ['brand_logo.max' => 'Brand image size will max 2MB.'],
            ['brand_logo.mimes' => 'Upload file system will be jpg,jpeg,png,csv,pdf']
        );

        $update = Brand::find($request->id);
        $update->created_by = Auth::user()->id;
        $update->name = $request->name;


        $logo = $request->file('brand_logo');

        // Image resize and upload portion
        if ($logo == true){
            // for checking existing file and delete.
            if(file_exists($update->brand_logo)){
                unlink($update->brand_logo);
            }

            $name_gen = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(200,200)->save('Image/brand/'. $name_gen);
            $update->brand_logo = 'Image/brand/'. $name_gen;
        }
        $update->save();

        if($update){
            $notification = array(
                'message' => 'data updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.brand')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.brand')->with($notification);
        }
    }



    // brand soft delete
    public function SoftDelete($id){
        $soft_delete = Brand::find($id)->delete();

        if($soft_delete){
            $notification = array(
                'message' => 'data moved to trash',
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

    // brand restore
    public function Restore($id){
        $restore = Brand::withTrashed()->find($id)->restore();
        if($restore){
            $notification = array(
                'message' => 'data restore successfully',
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


    // brand parmanent delete

    public function Destroy($id){
        // find the data row
        $destroy = Brand::onlyTrashed()->findOrFail($id);
        // find & delete file from location
        if(file_exists( $destroy->brand_logo)){
            unlink( $destroy->brand_logo);
        }
        //delete data row
        $destroy -> forceDelete();
        if($destroy){
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
