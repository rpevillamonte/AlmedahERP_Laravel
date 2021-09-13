<?php

namespace App\Http\Controllers;

use App\Models\EmploymentType;
use Exception;
use Illuminate\Http\Request;

class EmploymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('modules.userManagement.EmploymentType.EmploymentType', ['employment_types' => EmploymentType::all()]);
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
            $emp_type = new EmploymentType();
            $form_data = $request->input();
            
            $last_et = EmploymentType::orderby('id', 'desc')->first();
            $last_id = $last_et ? $last_et->id + 1 : 1;
            
            $et_id = 'EMP-TYPE-' . str_pad($last_id, 3, '0', STR_PAD_LEFT);
            $emp_type->employment_id = $et_id;
            $emp_type->employment_type = $form_data['empTypeName'];

            $emp_type->save();

        } catch(Exception $e) {
            return $e;
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
        return ['emp_type' => EmploymentType::find($id)];
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
