<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datauser = User::all();
        return view ('user.index',compact('datauser'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama' => 'required',
            'username' => 'required',
            'role_id' => 'required',
            'password' => 'required|confirmed',
        ]);
        $validateData['password']=Hash::make($validateData['password']);
        //dd($request);
        User::create($validateData);
        toast('Data berhasil diinput','success');
        return redirect()->route('user.index');
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
        $validateData=$request->validate([
            'nama' => 'required',
            'username' => 'required',
            'role_id' => 'required',
            'password' => 'required|confirmed',
        ]);
        $validateData['password']=Hash::make($validateData['password']);
        User::find($id)->update($validateData);
        toast('Data berhasil diedit','info');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        toast('Data berhasil dihapus','info');
        return redirect()->route('user.index');
    }
}
