<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Exception;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('modules.teamsAndRoles.UserRole');
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
        try {
            $form_data = $request->input();
            $last_role = UserRole::first();
            $id = $last_role ? $last_role->id + 1 : 1;
            $role_id = "ROLE-";
            $role_id .= str_pad($id, 3, "0", STR_PAD_LEFT);
    
            $role = new UserRole();
            $role->role_id = $role_id;
            $role->role_name = $form_data['roleName'];
            $role->description = 'sample_desc';
            $role->permissions = $form_data['permissions'];
    
            $role->save();
        } catch (Exception $e) {
            return ['error' => $e];
        } 
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
