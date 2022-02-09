<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employee;
use \App\Models\UserRole;
use Auth;   
class ManufacturingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()){
            $role_id = Auth::user()->role_id;
            $user_role = UserRole::where('role_id', $role_id)->first();
            $permissions = json_decode($user_role->permissions, true);
        }

        return view('modules.manufacturing.manufacturing', ['permissions'=>$permissions]);
    }
}
