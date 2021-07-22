<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Booking;



class ManagerPagesController extends Controller
{
    public function index()
    {
      return view('manager.index');
    }

    public function productslist()
    {
      $datas=Product::where('active_status','Active')->get();
      return view('manager.product.index')->with('datas',$datas);
    }
    public function productview($id)
    {
      $data=Product::find($id);
      return view('manager.product.view')->with('data',$data);
    }

    public function addtocart(Request $request)
    {
      Cart::create($request->all());
      return redirect()->back()->with('successmessage', 'Successfully added in your cart');
    }

    public function orders()
    {
      return view('manager.orders.index');
    }

    public function ordersview($id)
    {
      $datas= Cart::where('purchase_code',$id)->get();
      $data= Cart::where('purchase_code',$id)->first();
      return view('manager.orders.view',compact('datas','data'));
    }


    public function checkout()
    {
      $datas=Cart::where('status',NULL)->where('auth_id',auth()->user()->id)->get();
      return view('manager.product.checkout')->with('datas',$datas);
    }

    public function cart()
    {
      $datas=Cart::where('status',NULL)->where('auth_id',auth()->user()->id)->get();
      return view('manager.product.cart')->with('datas',$datas);
    }

    public function cartpost(Request $request)
    {
      $data=Cart::find($request->id);
      $data->qty=$request->qty;
      $data->save();
      return redirect('/manager/cart');
    }

    public function cartdelete($id)
    {
      Cart::find($id)->delete();
      return redirect()->back();
    }

    public function checkoutstore(Request $request){

      $num='ODR'.rand(111111111,999999999);
      $carts= Cart::where('auth_id',auth()->user()->id)->where('isbooking',NULL)->get();
      foreach ($carts as $cart) {
        $cart=Cart::find($cart->id);
        $cart->purchase_code=$num;
        $cart->total_price=$cart->price*$cart->qty;
        $cart->isbooking='pending';
        $cart->status='pending';
        $cart->payment='pending';
        $cart->booking_name=$request->booking_name;
        $cart->booking_email=$request->booking_email;
        $cart->booking_contact=$request->booking_contact;
        $cart->booking_address=$request->booking_address;
        $cart->save();
      }
      return redirect('/manager/orders');
    }


    public function productslistfilter($data){
      // echo $data;

      if($data=='all'){
        return redirect('/manager/products');
      }else{
        $datas=Product::whereJsonContains('category',[$data])->get();
        return view('manager.product.index')->with('datas',$datas);
      }



    }

}
