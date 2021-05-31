<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // category view page
    public function Index(){
        $categories = Category::latest()->paginate(10);
        $trashes = Category::onlyTrashed()->latest()->get();
        return view('admin.category.index', compact('categories', 'trashes'));
    }

    // category store
    public function Store(Request $request){

        $categories = new Category();

        $categories->name = $request->name;
        $categories->created_by = Auth::user()->id;
        $categories->slug = Str::slug($request->name, '-');

        $categories->save();

        if($categories){
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
        $categories = Category::find($id);
        return view('admin.category.edit-category', compact('categories'));
    }

    // Category update
    public function Update(Request $request){
        $cat_validation = $request->validate([
            'name' => 'required|max:100',
        ],
            ['name.required' => 'This fild are required.'],
            ['name.max' => 'Maximum length are 100 Charecter.']);


        $update = Category::find($request->id);

        $update->created_by = Auth::user()->id;
        $update->name = $request->name;
        $update->slug = Str::slug($request->name, '-');
        $update->save();

        if($update){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return redirect('admin/category')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return redirect('admin/category')->back()->with($notification);
        }

    }

    // category soft delete
    public function SoftDelete($id){
        $soft_delete = Category::find($id)->delete();

        if($soft_delete){
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

    // category restore
    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        if($restore){
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


    // category parmanent delete
    public function Destroy($id){
        $destroy = Category::onlyTrashed()->find($id)->forceDelete();
        if($destroy){
            $notification = array(
                'message' => 'category successfully deleted',
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
