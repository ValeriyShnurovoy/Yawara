<?php

namespace App\Http\Controllers\Admin;

use App\UserRoles;
use App\Configuration;
use App\Helpers\Constants;
use App\Http\Services\AccessService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'acl']);
    }

    public function index()
    {
    	$routers = Constants::ADMIN_ROUTERS;
    	$roles = UserRoles::all();
    	$accessService = new AccessService();
    	$configuration = $accessService->getAccessMatrix();
    	
        return view(
        	'admin/configuration/index', 
        	[
        		'roles' => $roles,
        		'routers' => $routers,
        		'configuration' => $configuration,
        	]
        );
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
            'controller' => 'required|string',
            'role_id' => 'required|integer'
        ]);
        Configuration::create($validatedData);

        return response()->json(['status' => 200,]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'controller' => 'required|string',
            'role_id' => 'required|integer'
        ]);
        Configuration::where($validatedData)->delete();
        return response()->json(['status' => 200,]);
    }
}