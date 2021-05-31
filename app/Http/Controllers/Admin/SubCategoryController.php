<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function Index(){
        $categories = Category::get();
        $subcategories = SubCategory::latest()->paginate(10);
        $trashes = SubCategory::onlyTrashed()->latest()->get();
        return view('admin.category.sub-category', compact('categories', 'subcategories', 'trashes'));
    }


    // Subcategory store
    public function Store(Request $request){

        $subcategories = new SubCategory();

        $subcategories->category_id = $request->cat_name;
        $subcategories->name = $request->name;
        $subcategories->slug = Str::slug($request->name, '-');
        $subcategories->created_by = Auth::user()->id;

        $subcategories->save();

        if($subcategories){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.subcategory')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.subcategory')->with($notification);
        }
    }


    // categoey edit page

    public function Edit($id){
        $subcategories = SubCategory::find($id);
        $categories = Category::get();
        return view('admin.category.edit-sub-category', compact('subcategories', 'categories'));
    }


    // Sub Category update
    public function Update(Request $request){
        $cat_validation = $request->validate([
            'cat_name' => 'required',
            'name' => 'required|max:100',
        ],
            ['cat_name' => 'required'],
            ['name.required' => 'This fild are required.'],
            ['name.max' => 'Maximum length are 100 Charecter.']);


        $update = SubCategory::find($request->id);

        $update->category_id = $request->cat_name;
        $update->created_by = Auth::user()->id;
        $update->name = $request->name;
        $update->slug = Str::slug($request->name, '-');
        $update->save();

        if($update){
            $notification = array(
                'message' => 'data updated successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.subcategory')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return Redirect()->route('admin.subcategory')->with($notification);
        }

    }



    // category soft delete
    public function SoftDelete($id){
        $soft_delete = SubCategory::find($id)->delete();
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

    // category restore
    public function Restore($id){
        $restore = SubCategory::withTrashed()->find($id)->restore();
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


    // category parmanent delete
    public function Destroy($id){
        $destroy = SubCategory::onlyTrashed()->find($id)->forceDelete();
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
