<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\UserRoles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
{

    public function index()
    {    	
    	$users = User::all();

        $roles_selector = [];
        $roles = UserRoles::all();
        foreach($roles as $role) {
            $roles_selector[$role->id] = $role->name;
        }
    	
        return view(
        	'admin/userrole/index', 
        	[
        		'roles' => $roles_selector,
        		'users' => $users,
        	]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles_selector = [];
        $roles = UserRoles::all();
        foreach($roles as $role) {
            $roles_selector[$role->id] = $role->name;
        }

        return view('admin/userrole/create', ['role_selector' => $roles_selector]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string', 
            'password' => 'required|string', 
            'role_id' => 'required|integer',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return Redirect::back();
    }    

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'role_id' => 'required|integer',
        ]);
        $report = User::find($validatedData['id']);
        $report->role_id = $validatedData['role_id'];
        $report->save();

        return response()->json(['status' => 200,]);
    }

         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'role_id' => 'required|integer',
        ]);
        $report = User::find($validatedData['id']);
        $report->role_id = $validatedData['role_id'];
        $report->save();

        return response()->json(['status' => 200,]);
    }

}