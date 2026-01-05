<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')
                    ->select('id', 'name', 'email', 'created_at', 'updated_at', 'role')
                ->get();

        $allColumns = [
            'serial' => 'SL',
            'name'=>'User Name',
            'email'=>'User Email',
            'email_verified_at'=>'Verifi@mail',
            'password'=>'Password',
            'remember_token'=>'Token',
            'created_at'=>'When Create',
            'updated_at'=>'When Update',
            'role'=>'Role',
        ];

        $actions = [
            [
                'label' => 'Edit',
                'route' => 'users.edit',
                'method'=> 'GET',
                'class' => 'btn btn-sm btn-warning',
            ],
            [
                'label' => 'Delete',
                'route' => 'users.destroy',
                'method'=> 'DELETE',
                'class' => 'btn btn-sm btn-danger',
                'confirm' => 'Are you sure?',
            ],
        ];

        $selectedKeys = array_keys((array) $users->first());

        $columns = array_intersect_key($allColumns, array_flip($selectedKeys));                      

        return view('welcome', [
        'data'    => $users,
        'column'  => $columns,
        'actions' => $actions,
    ]); 
    // dd($users);
       // dd($users->count());
       // dd($users->first());


       // foreach($users as $user);

    }

    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        return view('edit_user', compact('user'));
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }





}
