<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('attributes.index');
    }

    public function list()
    {
      return Attributes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newColumnType = 'string';
        $newColumnName = strtolower($request->name);


        Schema::table('product_configs', function (Blueprint $table) use ($newColumnType, $newColumnName) {
          $table->$newColumnType($newColumnName)->nullable();
        });
        Schema::table('products', function (Blueprint $table) use ($newColumnType, $newColumnName) {
          $table->$newColumnType($newColumnName)->nullable();
        });
        Schema::table('carts', function (Blueprint $table) use ($newColumnType, $newColumnName) {
          $table->$newColumnType($newColumnName)->nullable();
        });




        $data= new Attributes();
        $data->name=$request->name;
        $data->save();
        return redirect()->back()->with('successmessage', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $request=Attributes::find($id);
      $newColumnName = $request->name;

      Schema::table('products', function (Blueprint $table) use ($newColumnName) {
        $table->dropColumn($newColumnName);
      });

      Schema::table('product_configs', function (Blueprint $table) use ($newColumnName) {
        $table->dropColumn($newColumnName);
      });

      Schema::table('carts', function (Blueprint $table) use ($newColumnName) {
        $table->dropColumn($newColumnName);
      });






      Attributes::find($id)->delete();
      return redirect('/attributes')->with('successmessage', 'Successfully Removed');;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Attributes::find($id);
        return view('attributes.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data= Attributes::find($id);
      $data->name=$request->name;
      $data->save();
      return redirect('/attributes')->with('successmessage', 'Successfully Created');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
    }
}
