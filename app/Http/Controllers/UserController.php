<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\User;

class UserController extends Controller
{
  //
    public function profile(){
      return view('home', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

      $userToUpdate = User::find($request->id);

      $userToUpdate->username = $request->input('username');
	   	$userToUpdate->name = $request->input('name');
      $userToUpdate->lastname = $request->input('lastname');
		  $userToUpdate->country = $request->input('country');
      $userToUpdate->email = $request->input('email');

      $imagen = $request->file('avatar');
      if($imagen){
        $imagenFinal = uniqid("img_") . "." . $imagen->extension();

  			$imagen->storePubliclyAs("public/avatars/", $imagenFinal);

  			$userToUpdate->avatar = $imagenFinal;

        //$avatar = $request->file('avatar');
        //$filename = time() . '.' . $avatar->getClientOriginalExtension();
       //Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ));

        //$user = Auth::user();
        //$user->avatar = $filename;
        //$user->save();
      }

      $userToUpdate->save();

      return view('home', array('user' => Auth::user()) );
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
      // Busco la Movie
      $userToEdit = User::find($id);
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
    //

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
