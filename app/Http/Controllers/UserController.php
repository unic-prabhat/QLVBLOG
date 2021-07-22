<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\StoreHouse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // User::create([
      //     'name' => $request->name,
      //     'email' => $request->eemail,
      //     'usertype' => $request->usertype,
      //     'password' => Hash::make($request->password)
      // ]);
      // echo 'Success';

      if(User::where('email',$request->email)->first()){


        return redirect()->back()->with('failmessage', 'Email already available.');


      }else{
        $data= new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->usertype=$request->usertype;
        $data->contact=$request->contact;
        $data->address1=$request->address1;
        $data->address2=$request->address2;
        $data->zipcode=$request->zipcode;
        $data->city=$request->city;
        $data->state=$request->state;
        $data->country=$request->country;
        $data->storeid=$request->storeid;
        $data->save();



        $str=StoreHouse::find($request->storeid);
        $str->auth_id=User::where('email',$request->email)->first()->id;
        $str->save();

        return redirect('/user')->with('successmessage', 'Successfully Created');

      }

    }

    public function passwordreset(Request $request){
      $newpassword=Hash::make($request->password);

      $data=User::find($request->id);
      $data->password=$newpassword;
      $data->save();

      return redirect()->back()->with('successmessage', 'Successfully Changed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=User::find($id);
        return view('user.view')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data=User::find($id);
      return view('user.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::findOrFail($id)->fill($request->all())->save();
        return redirect('/user')->with('successmessage', 'Successfully Created');

    }


    public function deletestore($id)
    {
      User::find($id)->delete();
      return redirect('/user')->with('successmessage', 'Successfully Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
