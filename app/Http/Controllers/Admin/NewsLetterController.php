<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function Index(){
        $newsletters =Newsletter::latest()->paginate(25);
        return view('admin.other.newsletter',compact('newsletters'));
    }





    public function Store(Request $request){
        $validation = $request->validate([
            'name' => 'max:100',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
        ],
            ['email.required' => 'This field are required.'],
            ['name.max' => 'Maximum length are 100 Charecter.']);

        $newsletter = new Newsletter();
        $newsletter->name = $request->name;
        $newsletter->email = $request->email;

        $newsletter->save();

        if($newsletter){
            $notification = array(
                'message' => 'newsletter added successfully',
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
        $newsletter = Newsletter::find($id);
        return view('admin.other.edit-newsletter',compact('newsletter'));
    }




    public function Update(Request $request){
        $validation = $request->validate([
            'name' => 'max:100',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
        ],
            ['email.required' => 'This field are required.'],
            ['name.max' => 'Maximum length are 100 Charecter.']);

        $update = Newsletter::find($request->id);
        $update->name = $request->name;
        $update->email = $request->email;

        $update->save();

        if($update){
            $notification = array(
                'message' => 'newsletter updated successfully',
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



    public function Destroy($id){
        $destroy = Newsletter::find($id)->forceDelete();
        if($destroy){
            $notification = array(
                'message' => 'newsletter successfully deleted.',
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
