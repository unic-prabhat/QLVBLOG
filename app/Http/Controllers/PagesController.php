<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductConfig;


class PagesController extends Controller
{
    public function treport(){
      $datas=Cart::all();
      return view('report.treport')->with('datas',$datas);
    }

    public function qtyreport(){
      $datas=Cart::all();
      return view('report.qtyreport')->with('datas',$datas);
    }

    public function searchtreport(Request $request){
      $datas = Cart::whereDate('created_at', '>=', $request->fromdate)->whereDate('created_at', '<=', $request->todate)->get();
      return view('report.treport')->with('datas',$datas);
    }

    public function searchqreport(Request $request){
      $max=$request->qty;
      $datas= Product::whereBetween('stock', [0, $max])->where('type','Simple')->get();
      $vardatas= ProductConfig::whereBetween('stock', [0, $max])->get();
      return view('report.qtyreportsearch',compact('datas','vardatas'));
      // return $vardatas;
    }
}
