<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::get(['employee_id', 'first_name', 'last_name']);
        $departments = Department::with(['dept_head'])->get();
        return view('modules.userManagement.Departments.Departments',
                    ['employees' => $employees,
                     'departments' => $departments]
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
        //
        $form_data = $request->input();
        $dept_name = $form_data['deptName'];
        $exists = Department::where('department_name', $dept_name)->first();

        if($exists){
            return Response::json(['error' => 'Error msg'], 404);
        }else{
            
            $dept = new Department();

            $last_dept = Department::orderby('id', 'desc')->first();
            $id = $last_dept ? $last_dept->id + 1 : 1;
            $dept_id = 'DEPT-' . str_pad($id, 3, '0', STR_PAD_LEFT);
            $dept->department_id = $dept_id;
            $dept->department_name = $dept_name;

            if(isset($form_data['deptHead'])) {
                $dept->reports_to = $form_data['deptHead'];
            }

            $dept->save();
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
        return response()->json(['department' => Department::find($id)]);
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
        $form_data = $request->input();
        $dept = Department::find($id);
        $dept_name = $form_data['deptEditName'];
        $dept->department_name = $dept_name;
        if(isset($form_data['deptEditHead'])) {
            $dept->reports_to = $form_data['deptEditHead'];
        }
        $dept->save();
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
        try {
            $dept = Department::find($id);
            $dept->delete();
        } catch (Exception $e) {
            return $e;
        }
    }
}
