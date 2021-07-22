<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductConfig;
use App\Models\ProductNote;



class OrderController extends Controller
{
    public function index()
    {
      $datas=Cart::groupBy('purchase_code')->selectRaw('count(*) as total, purchase_code')->get();
      return view('orders.index')->with('datas',$datas);
    }
    public function view($id)
    {
      // $data = Cart::find($id);
      $datas= Cart::where('purchase_code',$id)->get();
      $data= Cart::where('purchase_code',$id)->first();
      return view('orders.view',compact('datas','data'));
      // return view('orders.view')->with('data',$data);
    }
    public function active($id,$productid,$type)
    {
      if($type=='Virtual'){
        $data=Cart::find($id);
        $data->status='Approved';
        $data->save();

        $product=ProductConfig::find($productid);
        $product->stock= $product->stock-$data->qty;
        $product->save();

        return redirect()->back();
      }else{
        $data=Cart::find($id);
        $data->status='Approved';
        $data->save();

        $product=Product::find($productid);
        $product->stock= $product->stock-$data->qty;
        $product->save();

        return redirect()->back();
      }
    }

      public function delete($id,$productid,$type)
      {
        if($type=='Virtual'){
          $data=Cart::find($id)->delete();
          return redirect('/orders');
        }else{
          $data=Cart::find($id)->delete();
          return redirect('/orders');
       }
    }
    public function update(Request $request)
    {
      $datapc=Cart::where('purchase_code',$request->purchase_code)->get();

      foreach ($datapc as $pc) {
        $data = Cart::find($pc->id);
        $data->payment=$request->payment;
        $data->status=$request->status;
        $data->save();
      }

      return redirect()->back()->with('successmessage', 'Successfully Updated');
    }


    public function updatenotes(Request $request){

      $data= new ProductNote();
      $data->purchase_code=$request->purchase_code;
      $data->notes=$request->notes;
      $data->save();
      return redirect()->back()->with('successmessage', 'Successfully Updated');




    }

    public function print($id)
    {
      $datas= Cart::where('purchase_code',$id)->get();
      $data= Cart::where('purchase_code',$id)->first();
      return view('orders.printOrder',compact('datas','data'));
    }


    public function deletenote($id)
    {
      ProductNote::find($id)->delete();
      return redirect()->back();
    }
}
