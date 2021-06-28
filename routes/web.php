<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'Index']);


// for fontend
Route::get('/shop',[\App\Http\Controllers\ShopController::class, 'Index']);
Route::Post('newsletter/store',[\App\Http\Controllers\Admin\NewsLetterController::class,'Store'])->name('newsletter.store');
Route::get('/blog',[\App\Http\Controllers\BlogController::class,'Index']);
Route::get('/contact-us',[\App\Http\Controllers\ContactController::class,'Index']);
Route::get('/add-to-wishlist/{id}',[\App\Http\Controllers\User\WishlistController::class,'AddToWishlist']);
Route::get('/my-wishlist',[\App\Http\Controllers\User\WishlistController::class,'GetMyWishlistData']);
Route::get('/my-wishlist/remove/{wish_pro_id}',[\App\Http\Controllers\User\WishlistController::class,'Destroy']); //not working


//Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//    return view('welcome');
//})->name('dashboard');

//admin authentication

Route::middleware(['auth:sanctum', 'verified', 'auth_admin'])->group(function(){
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'Index'])->name('admin.dashboard');


//    for category part
    Route::get('admin/category', [\App\Http\Controllers\Admin\CategoryController::class, 'Index'])->name('admin.category');
    Route::post('admin/category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'Store'])->name('admin.category.store');
    Route::get('admin/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'Edit']);
    Route::put('admin/category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'Update']);
    Route::get('admin/category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'SoftDelete']);
    Route::get('admin/category/restore/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'Restore']);
    Route::get('admin/category/destroy/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'Destroy']);



//    for Sub Category part
    Route::get('admin/subcategory', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Index'])->name('admin.subcategory');
    Route::post('admin/subcategory/store', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Store'])->name('admin.subcategory.store');
    Route::get('admin/subcategory/edit/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Edit']);
    Route::put('admin/subcategory/update/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Update']);
    Route::get('admin/subcategory/trash/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'SoftDelete']);
    Route::get('admin/subcategory/restore/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Restore']);
    Route::get('admin/subcategory/destroy/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'Destroy']);




//    for Brand part
    Route::get('admin/brand', [\App\Http\Controllers\Admin\BrandController::class, 'Index'])->name('admin.brand');
    Route::post('admin/brand/store', [\App\Http\Controllers\Admin\BrandController::class, 'Store'])->name('admin.brand.store');
    Route::get('admin/brand/edit/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'Edit']);
    Route::put('admin/brand/update/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'Update']);
    Route::get('admin/brand/trash/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'SoftDelete']);
    Route::get('admin/brand/restore/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'Restore']);
    Route::get('admin/brand/destroy/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'Destroy']);


//for product part
    Route::get('admin/product', [\App\Http\Controllers\Admin\ProductController::class, 'Index'])->name('admin.product');
    Route::get('admin/product/add', [\App\Http\Controllers\Admin\ProductController::class, 'AddProduct'])->name('admin.product.add');
    Route::get('subCatdependency/{cat_id}', [\App\Http\Controllers\Admin\ProductController::class, 'subCatdependency']);
    Route::post('admin/product/store', [\App\Http\Controllers\Admin\ProductController::class, 'Store'])->name('admin.product.store');
    Route::get('admin/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'Edit']);
    Route::put('admin/product/update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'Update']);
    Route::get('admin/product/trash/{id}/{attribute_id}', [\App\Http\Controllers\Admin\ProductController::class, 'Destroy']);

    Route::get('admin/product/attributes/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'AddAttributes']);
    Route::post('admin/product/attributes/store/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'AttributesStore']);
//    Route::get('admin/product/attributes/edit/{id}/{att_id}',[\App\Http\Controllers\Admin\ProductController::class, 'AttributesEdit']);
//    Route::put('admin/product/attributes/update/{pro_id}/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'AttributesUpdate']);
Route::get('admin/product/view/{id}',[\App\Http\Controllers\Admin\ProductController::class,'ViewProduct']);
//    product change status
    Route::get('admin/product/active/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'Active']);
    Route::get('admin/product/inactive/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'Inactive']);

//    Route::get('admin/product/attribute', function () {
//        return view('admin.product.product_attribute');
//    });



//  for coupon part
    Route::get('admin/coupon', [\App\Http\Controllers\Admin\CouponController::class, 'Index'])->name('admin.coupon');
    Route::post('admin/coupon/store', [\App\Http\Controllers\Admin\CouponController::class, 'Store'])->name('admin.coupon.store');
    Route::get('admin/coupon/edit/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'Edit']);
    Route::put('admin/coupon/update/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'Update']);
    Route::get('admin/coupon/trash/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'SoftDelete']);
    Route::get('admin/coupon/restore/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'Restore']);
    Route::get('admin/coupon/destroy/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'Destroy']);




//    for newsletter part
    Route::get('admin/newsletter', [\App\Http\Controllers\Admin\NewsLetterController::class, 'Index'])->name('admin.newsletter');
    Route::post('admin/newsletter/store', [\App\Http\Controllers\Admin\NewsLetterController::class, 'Store'])->name('admin.newsletter.store');
    Route::get('admin/newsletter/edit/{id}', [\App\Http\Controllers\Admin\NewsLetterController::class, 'Edit']);
    Route::put('admin/newsletter/update/{id}', [\App\Http\Controllers\Admin\NewsLetterController::class, 'Update']);
    Route::get('admin/newsletter/delete/{id}', [\App\Http\Controllers\Admin\NewsLetterController::class, 'Destroy']);




///////////////////////////////////////////////////////for site setting

//    logo Setting part
    Route::get('admin/mystore/logo',[\App\Http\Controllers\Admin\SiteSettingController::class, 'Index'])->name('admin.mystore.logo');
    Route::post('admin/mystore/logo/store', [\App\Http\Controllers\Admin\SiteSettingController::class, 'Store'])->name('admin.mystore.logo.store');
    Route::get('admin/mystore/logo/view/{id}',[\App\Http\Controllers\Admin\SiteSettingController::class,'ViewLogo']);
//    logo status change
    Route::get('admin/mystore/logo/active/{id}', [\App\Http\Controllers\Admin\SiteSettingController::class, 'Active']);
    Route::get('admin/mystore/logo/inactive/{id}', [\App\Http\Controllers\Admin\SiteSettingController::class, 'Inactive']);











});
























