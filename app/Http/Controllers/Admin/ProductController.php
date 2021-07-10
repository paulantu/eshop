<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product_attributes;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use function Livewire\str;

class ProductController extends Controller
{

    // product view
    public function Index(){
         $products = product_attributes::latest()->paginate(15);

        return view('admin.product.index', compact('products'));
    }

    public function Active($id){
        $productActive = Product::find($id)->update(['status'=>1]);
        if ($productActive == true) {
            $notification = array(
                'message' => 'product activated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'product deactivated successfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function Inactive($id){
        $productInactive = Product::find($id)->update(['status'=>0]);
        if ($productInactive == true) {
            $notification = array(
                'message' => 'product activated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'product deactivated successfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function AddProduct(){
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.product.add-product', compact('categories', 'brands'));
    }

    public function subCatdependency($cat_id){
        $data = SubCategory::where('category_id', $cat_id)->pluck('name', 'id');
        return json_encode($data);
    }



    public function Store(Request $request){
        $pro_validation = $request->validate([
            'title' => 'required',
            'p_code' => 'required',
        ],
            ['title.required' => 'Please enter product title'],
            ['p_code.required' => 'Please enter product code']
    );

        $products = new Product();

        $products->category = $request->cat_id;
        $products->sub_category = $request->subcat_id;
        $products->brand = $request->brand_id;
        $products->title = $request->title;
        $products->slug = Str::slug($request->title, '-');
        $products->p_code = $request->p_code;
        $products->discount = $request->discount;
        $products->selling_price = $request->selling_price;
        $products->buying_price = $request->buying_price;
        $products->description = $request->product_description;


        $images = $request->file('images');
        if($images == true){
            foreach ($images as $image) {
                $name_image_one = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(500, 500)->save('Image/product/' . $name_image_one);
                $imageNames[] = 'Image/product/' . $name_image_one;
            }

            $product_images = json_encode($imageNames);
            $products->images = $product_images;

        }
        $products->status = $request->status;
        $products->save();

        return redirect('admin/product/attributes/'.$products->id);

    }

    //    for adding attributes

    public function AddAttributes($id){
        $products = Product::Find($id);
        $product_images = json_decode($products->images);
        $image = $product_images[1];
        return view('admin.product.product_attribute', compact('products','image'));
    }
    public function AttributesStore(Request $request,$id){
        $pro_validation = $request->validate([
            'size' => 'required',
            'qty' => 'required',
        ],
            ['size.required' => 'Please enter product size'],
            ['qty.required' => 'Please enter product qty']
        );
        $products = Product::Find($id);

        foreach ($request->size as $key=>$size){
            $attributes = new product_attributes();
            $attributes->product_id = $products->id;
            $attributes->size = $size;
            $attributes->sku = $products->p_code.'-'.$size;
            $attributes->qty = $request->qty[$key];

            $attributes->save();
        }
        if($attributes == true){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return redirect('admin/product')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong. please try again later.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.product')->with($notification);
        }

    }

    // categoey edit page

    public function Edit($id){
        $products = Product::find($id);
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.product.edit-product', compact('products', 'categories', 'brands'));
    }


    public function Update(Request $request){
        $validation = $request->validate([
            'title' => 'required',
            'p_code' => 'required',
        ],
            ['title.required' => 'Please enter product title'],
            ['p_code.required' => 'Please enter product code']
        );

        $update = Product::find($request->id);
        $update->category = $request->cat_id;
        $update->sub_category = $request->subcat_id;
        $update->brand = $request->brand_id;
        $update->title = $request->title;
        $update->p_code = $request->p_code;
        $update->discount = $request->discount;
        $update->selling_price = $request->selling_price;
        $update->buying_price = $request->buying_price;
        $update->description = $request->product_description;


        $images = $request->file('images');
        if($images == true){
            foreach ($images as $image) {
                $name_image_one = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(500, 500)->save('Image/product/' . $name_image_one);
                $update->images = 'Image/product/' . $name_image_one;
            }
        }
        $update->status = $request->status;
        $update->save();
        $attributes = product_attributes::where('product_id',$update->id)->get();
        if($update == true){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return redirect('admin/product/attributes/edit/'.$update->id)->with($notification);
//            '/'.urlencode(http_build_query($attributes->id))
        }else{
            $notification = array(
                'message' => 'something went wrong. please try again later.',
                'alert-type' => 'error'
            );
            return redirect('admin/product/edit/'.$update->id)->with($notification);
        }
    }

    public function AttributesEdit($id){
        $products = Product::find($id);
        $categories = Category::get();
        $brands = Brand::get();
        $attributes = product_attributes::where('product_id',$id)->get();
        return view('admin.product.edit-product-attribute', compact('products', 'categories', 'brands','attributes'));
    }

    public function AttributesUpdate(Request $request,$pro_id,$id){
        $pro_validation = $request->validate([
            'size' => 'required',
            'qty' => 'required',
        ],
            ['size.required' => 'Please enter product size'],
            ['qty.required' => 'Please enter product qty']
        );
        $products = Product::Find($pro_id);

        foreach ($request->size as $key=>$size){
            $attributes = product_attributes::find($id);
            $attributes->product_id = $products->id;
            $attributes->size = $size;
            $attributes->sku = $products->p_code.'-'.$size;
            $attributes->qty = $request->qty[$key];

            $attributes->save();
        }
        if($attributes == true){
            $notification = array(
                'message' => 'data added successfully',
                'alert-type' => 'success'
            );
            return redirect('admin/product')->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong. please try again later.',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.product')->with($notification);
        }

    }






    public function ViewProduct($id){
        $ProductDetails = Product::find($id);
        $ProductAttributes = product_attributes::where('product_id',$id)->get();
        return view('admin.product.product-view', compact('ProductDetails','ProductAttributes'));
    }







    // product delete part
    public function Destroy($id,$attribute_id){
        $checkLength = product_attributes::where('product_id',$id)->count();
        if ($checkLength <= 1){
            $Delete = product_attributes::find($attribute_id)->forceDelete();
            $destroy = Product::find($id)->forceDelete();
            if($destroy){
                $notification = array(
                    'message' => 'data parmanentlly deleted',
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
        }else{
            $destroy =product_attributes::find($attribute_id)->forceDelete();
            if($destroy){
                $notification = array(
                    'message' => 'data parmanentlly deleted',
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
}
