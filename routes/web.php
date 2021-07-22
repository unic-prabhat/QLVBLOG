<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\SubAttributesController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerPagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;











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




Route::get('test', function () {
    $provided = [
        'Shirt' => [
            'color' => ['green', 'red'],
            'size' => ['Small', 'Medium'],
        ],
    ]; // Reduced the provided data to reduce the output for sample purposes.

    $result = [];

    foreach ($provided as $type => $attributes) {
        foreach ($attributes['color'] as $color) {
            foreach ($attributes['size'] as $size) {
                $result[] = compact('type','color','size');
            }
        }
    }

    dd($result);
});


Route::get('runcommand', function () {
    // Artisan::call('make:model Product -a');
    // Artisan::call('migrate');
    dd("Success");
});


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');



Route::get('/search', function () {
  $data= App\Models\Product::whereJsonContains('category', ["Kids"])->get();
  echo $data;
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');


Route::get('/logoutadmin', function(){
    Auth::logout();
    return Redirect::to('/');
 });


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
 });
Route::get('/user/deletestore/{id}',[UserController::class,'deletestore']);
Route::resource('/user',UserController::class)->middleware('auth');
Route::post('/user/passwordreset',[UserController::class,'passwordreset']);


Route::get('/attributes/list',[AttributesController::class,'list'])->middleware('auth');
Route::resource('/attributes',AttributesController::class)->middleware('auth');
Route::resource('/subattributes',SubAttributesController::class)->middleware('auth');
Route::resource('/productcategory',ProductCategoryController::class)->middleware('auth');
Route::resource('/productsubcategory',ProductSubCategoryController::class)->middleware('auth');
Route::resource('/country',CountryController::class)->middleware('auth');


Route::get('/showvirtualproductlist/{id}',[ProductController::class, 'showvirtualproductlist'])->middleware('auth');
Route::get('/totalformsubmit/{id}',[ProductController::class, 'totalformsubmit'])->middleware('auth');


Route::resource('/product',ProductController::class)->middleware('auth');
Route::post('/product/attribute',[ProductController::class, 'attribute2nd'])->middleware('auth');
Route::post('/product/subattribute',[ProductController::class, 'subattribute3nd'])->middleware('auth');

Route::get('/product/remove/{unqid}',[ProductController::class, 'removeproduct']);
Route::post('/product/subattributesubmit',[ProductController::class, 'subattributesubmit'])->middleware('auth');


Route::post('/deletevirtualproduct',[ProductController::class, 'deletevirtualproduct'])->middleware('auth');
Route::put('/updatevirtualproduct/{id}',[ProductController::class, 'updatevirtualproduct'])->middleware('auth');
Route::get('/deletevirtualproductnow/{id}',[ProductController::class, 'deletevirtualproductnow'])->middleware('auth');
Route::post('/createvirtualproductnew',[ProductController::class, 'createvirtualproductnew'])->middleware('auth');





Route::get('/orders',[OrderController::class,'index'])->middleware('auth');
Route::get('/order/{id}',[OrderController::class,'view'])->middleware('auth');
Route::get('/order/print/{id}',[OrderController::class,'print'])->middleware('auth');

Route::get('/order/active/{id}/{productid}/{type}',[OrderController::class,'active'])->middleware('auth');
Route::get('/order/delete/{id}/{productid}/{type}',[OrderController::class,'delete'])->middleware('auth');
Route::post('/order/update',[OrderController::class,'update']);
Route::post('/order/update/notes',[OrderController::class,'updatenotes']);
Route::get('/deletenote/{id}',[OrderController::class,'deletenote']);




Route::get('/treport',[PagesController::class, 'treport'])->middleware('auth');
Route::get('/qtyreport',[PagesController::class, 'qtyreport'])->middleware('auth');

Route::post('/searchtreport',[PagesController::class, 'searchtreport'])->middleware('auth');
Route::post('/searchqreport',[PagesController::class, 'searchqreport'])->middleware('auth');



Route::get('/store/deletestore/{id}',[StoreController::class,'deletestore']);
Route::resource('/store',StoreController::class)->middleware('auth');


//=================================================================================================
// MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION
// MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION
// MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION // MANAGERS SECTION
//=================================================================================================
// Route::get('/manager',[ManagerPagesController::class, 'index'])->middleware('auth');


Route::group(['prefix' => 'manager'], function()
{
  Route::get('/',[ManagerPagesController::class, 'index'])->middleware('auth');

  Route::get('/products',[ManagerPagesController::class, 'productslist'])->middleware('auth');
  Route::get('/products/filter/{data}',[ManagerPagesController::class, 'productslistfilter'])->middleware('auth');


  Route::get('/product/{id}',[ManagerPagesController::class, 'productview'])->middleware('auth');
  Route::post('/addtocart',[ManagerPagesController::class, 'addtocart'])->middleware('auth');

  Route::get('/orders',[ManagerPagesController::class,'orders'])->middleware('auth');
  Route::get('/order/{id}',[ManagerPagesController::class,'ordersview'])->middleware('auth');

  Route::get('/cart/delete/{id}',[ManagerPagesController::class,'cartdelete'])->middleware('auth');
  Route::get('/cart',[ManagerPagesController::class,'cart'])->middleware('auth');
  Route::post('/cart',[ManagerPagesController::class,'cartpost'])->middleware('auth');

  Route::get('/checkout',[ManagerPagesController::class,'checkout'])->middleware('auth');
  Route::post('/checkout/store',[ManagerPagesController::class,'checkoutstore'])->middleware('auth');




});
