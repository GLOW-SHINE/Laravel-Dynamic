<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudent()
    {
        $students = DB::table('students')
                    ->select('id', 'uuid', 'roll_no', 'name', 'email', 'phone', 'created_at', 'updated_at')
                    ->get();

        $allColumns = [
            'serial' => 'SL',
          //  'id' => 'ID',
            'name'=>'Name',
            'email'=>'Email',
            'email_verified_at'=>'Verifi@mail',
            'phone'=>'Phone No',
            //'remember_token'=>'Token',
            'created_at'=>'When Create',
            'updated_at'=>'When Update',
            //'role'=>'Role',
        ];

        $actions = [
            // Edit --
            [
                'label' => 'Edit',
                'route' => 'students.edit',
                'method'=> 'GET',
                'class' => 'btn btn-sm btn-warning',
            ],

            // Delete --
            [
                'label' => 'Delete',
                'route' => 'students.destroy',
                'method'=> 'DELETE',
                'class' => 'btn btn-sm btn-danger',
                'confirm' => 'Are you sure?',
            ],
        ];

        $selectedKeys = array_keys((array) $students->first());

        $columns = array_intersect_key($allColumns, array_flip($selectedKeys));                      

            return view('students', [
            'data'    => $students,
            'column'  => $columns,
            'actions' => $actions,
        ]); 
    }

    public function edit($uuid)
    {
        $students = DB::table('students')->find($uuid);
        return view('edit_students', compact('students'));
    }

    public function destroy($uuid)
    {
        DB::table('students')->where('uuid', $uuid)->delete();
        return redirect()->route('students.index')->with('success', 'User deleted successfully.');
    }

}
