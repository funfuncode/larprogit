<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use Carbon\Carbon;

class AdminUsersController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $users = User::all();

      return view('admin.users.index')->with('users', $users);
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {

      /*
      $roles = Role::all();

      function array_push_assoc($array, $key, $value){
      $array[$key] = $value;
      return $array;
   }


   $roles_form = [];

   foreach ($roles as $role) {
   $roles_form = array_push_assoc($roles_form, $role->id, $role->name);
}
   */

   $roles = Role::lists('name', 'id')->all();

   return view('admin.users.create')->with('roles', $roles);
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(UsersRequest $request)
{
/*
   User::create([
         'name'=>$request->name,
         'email'=>$request->email,
         'password'=>bcrypt($request->password),
         'role_id'=>$request->role_id,
         'is_active'=>$request->is_active
      ]);
*/
   $input = $request->all();

   if($file = $request->file('file')){

      $name = Carbon::now()->format('Y-m-d') . '_' . $file->getClientOriginalName();

      $file->move('images', $name);

      $photo = Photo::create(['file'=>$name]);

      $input['photo_id'] = $photo->id;
   }

   User::create($input);

   return redirect('/admin/users');
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
