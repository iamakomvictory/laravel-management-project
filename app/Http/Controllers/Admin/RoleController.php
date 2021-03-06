<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accomodation;
use App\User;
use Auth;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect('/');
        }

        $administrators = User::where('role_id', '<', 3)->get();
        
        
         return view('roles.index', 
                ['administrators' => $administrators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_accomodation = Accomodation::all();
        return view('roles.create', ['all_accomodation' =>$all_accomodation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('/');
        }

        $request->validate([
            'username' => 'required',
            'role' => 'required',
               ]);
           
               $username = $request->username;
               $role = $request->role;
        
        $assign = User::where('name', $username)
                      ->update(['role_id' => $role]);
                
                         return redirect('/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if(!Auth::check()){
            return redirect('/');
        }

        $request->validate([
            'username' => 'required',
            'role' => 'required',
               ]);
           
               $username = $request->username;
               $role = $request->role;
        
        $assign = User::where('name', $username)
                      ->update(['role_id' => $role]);
                
                         return redirect('/role');
    }
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
