<?php

namespace App\Http\Controllers;

use App\Models\SubAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class SubAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('subattributes.index');

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

        $pname=strtolower($request->parent_name);
        //
        // Schema::table('products', function (Blueprint $table) use ($pname,$newColumnType, $newColumnName) {
        //   $table->$newColumnType($pname.'_'.$newColumnName)->nullable()->after($pname);
        // });

        $data= new SubAttributes();
        $data->parent_name=$request->parent_name;
        $data->name=$request->name;
        $data->code=$pname.'_'.$newColumnName;
        $data->save();
        return redirect()->back()->with('successmessage', 'Successfully Created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubAttributes  $subAttributes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $request=SubAttributes::find($id);
      //
      // $newColumnName = strtolower($request->name);
      //
      // $pname=strtolower($request->parent_name);
      //
      // Schema::table('products', function (Blueprint $table) use ($pname,$newColumnName) {
      //   $table->dropColumn($pname.'_'.$newColumnName);
      // });

      SubAttributes::find($id)->delete();
      return redirect('/subattributes')->with('successmessage', 'Successfully Removed');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubAttributes  $subAttributes
     * @return \Illuminate\Http\Response
     */
    public function edit(SubAttributes $subAttributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubAttributes  $subAttributes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubAttributes $subAttributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubAttributes  $subAttributes
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubAttributes $subAttributes)
    {
        //
    }
}
