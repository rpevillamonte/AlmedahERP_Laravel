<?php

namespace App\Http\Controllers;

use App\Models\Station;
use \App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Exception;

class StationController extends Controller
{
    //
    function index()
    {
        if(Auth::user()){
            $role_id = Auth::user()->role_id;
            $user_role = UserRole::where('role_id', $role_id)->first();
            $permissions = json_decode($user_role->permissions, true);
        }else{
            $permissions = null;
        }

        $stations = Station::all();
        return view('modules.manufacturing.workstation', ['stations' => $stations, 'permissions' => $permissions]);
    }

    function store(Request $request)
    {
        try {
            $form_data = $request->input();
            $data = new Station();
            $data->station_name = $form_data["station_name"];
            $data->description = $form_data["description"];

            // Generate ID for UOM
            // Based from schema documentation
            $lastStation = Station::orderby('created_at', 'desc')->first();
            $nextId = ($lastStation)
                        ? Station::orderby('created_at', 'desc')->first()->id + 1 
                        : 1;
            $data->station_id = "Station_" . $nextId;

            $data->save();
        } catch (Exception $e) {
        }
    }
}
