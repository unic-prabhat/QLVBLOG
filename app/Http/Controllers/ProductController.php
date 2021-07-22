<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductConfig;
use App\Models\ProductImage;
use App\Models\ProductCategoryForProduct;
use App\Models\ProductSubCategoryForProduct;
use App\Models\User;




use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    public function showvirtualproductlist($id)
    {
     return view('product._virtualProductTable',compact('id'));
    }
    public function deletevirtualproduct(Request $request)
    {
      ProductConfig::find($request->id)->delete();
    }

    public function deletevirtualproductnow($id)
    {
      ProductConfig::find($id)->delete();
      return redirect()->back();
    }

    public function createvirtualproductnew(Request $request)
    {
        // ProductConfig::create($request->all());
        $data=new ProductConfig();
        $data->unqid = $request->unqid;
        $data->name = $request->name;
        $data->sellprice = $request->sellprice;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('product.create');

    }


    public function removeproduct($unqid)
    {

      $data=Product::where('unqid',$unqid)->first();
      $data->delete();

      $datas=ProductConfig::where('unqid',$unqid)->get();
      foreach ($datas as $value) {
        ProductConfig::find($value->id)->delete();
      }

      return redirect('/product')->with('successmessage', 'Successfully Removed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       if($request->type=='Simple'){

         $model = Product::create($request->all());

         $unqid=$request->unqid;
         $dssa= Product::where('unqid',$unqid)->first();
         $dssa->active_status='Active';
         $dssa->save();

         foreach($request->file('filename') as $filess)
         {
             $image = $filess;
             $name = time().rand(199,999).'.'.$image->getClientOriginalExtension();
             $destinationPath = 'public/serverimage';
             $imagename= $image->move($destinationPath, $name);

             $data = new ProductImage();
             $data->uniqid = $unqid;
             $data->imagepath = $imagename;
             // $data->stock = $stock;
             $data->save();
         }
         return redirect('/product')->with('successmessage', 'Successfully Created');


       }else{


         $unqid=$request->unqid;

         $data=new Product();
         $data->active_status='Active';
         $data->type='Virtual';
         $data->unqid=$request->unqid;
         $data->stock=$request->stock;
         $data->name=$request->name;
         $data->sku=$request->sku;
         $data->description=$request->description;
         $data->category=$request->category;
         $data->subcategory=$request->subcategory;
         $data->save();

            foreach($request->file('filename') as $filess)
            {
                $image = $filess;
                $name = time().rand(199,999).'.'.$image->getClientOriginalExtension();
                $destinationPath = 'public/serverimage';
                $imagename= $image->move($destinationPath, $name);

                $data = new ProductImage();
                $data->uniqid = $unqid;
                $data->imagepath = $imagename;
                // $data->stock = $stock;
                $data->save();
            }


            $sample = array();
            for($z=0; $z<count($request->virtual_name); $z++){
                $sample[]=array($request->virtual_name[$z],$request->virtual_price[$z],$request->virtual_sellprice[$z],$request->virtual_qty[$z]);
            }
            // dd($sample);


            foreach ($sample as $sam) {
              $ns = new ProductConfig();
              $ns->unqid=$unqid;
              $ns->name = $sam[0];
              $ns->price = $sam[1];
              $ns->sellprice = $sam[2];
              $ns->stock = $sam[3];
              $ns->save();
            }

            return redirect('/product');

         // return view('product.selectVirtualAttributes',compact('unqid'));

       }
    }


    public function totalformsubmit($id){
      $data= Product::where('unqid',$id)->first();
      $data->active_status='Active';
      $data->save();

      return redirect('/product');
    }



    public function attribute2nd(Request $request)
    {
      $datas = $request->all();
      $unqid=$request->unqid;

      session()->put('add_product_attributes',$datas['attributes']);

      return view('product.selectVirtualSubAttributes',compact('datas','unqid'));
    }


    public function subattribute3nd(Request $request)
    {

      // $user= new ProductConfig;
      // $table = $user->getTable();
      // $columns  = \Schema::getColumnListing($table);
      // dd($columns);


      $datas = $request->all();
      $unqid=$request->unqid;

      return view('product.createVirtual',compact('datas','unqid'));


    }


    public function subattributesubmit(Request $request)
    {
        ProductConfig::create($request->all());
        echo 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Product::find($id);
        return view('product.view')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data= Product::find($id);
      return view('product.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('/product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function updatevirtualproduct(Request $request, $id){
      $data= ProductConfig::find($id);
      $data->stock=$request->stock;
      $data->price=$request->price;
      $data->sellprice=$request->sellprice;
      $data->save();
      return redirect()->back();

    }
}
