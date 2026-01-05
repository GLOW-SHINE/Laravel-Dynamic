<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')->where('role','admin')->get();
      //  $users = DB::table('users')->select()->first();

        $column = [

            'id'=>'ID',
            'name'=>'User Name',
            'email'=>'User Email',
            'email_verified_at'=>'Verifi@mail',
            'password'=>'Password',
            'remember_token'=>'Token',
            'created_at'=>'When Create',
            'updated_at'=>'When Update',
            'role'=>'Role',

        ];

        return view('welcome',
        [
            'data'=>$users,
            'column'=>$column
        
        ]); // data is a key name
       // dd($users);
       // dd($users->count());
       // dd($users->first());


       // foreach($users as $user);

    }
}
