<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Exception;
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
        $employees = Employee::all(['employee_id', 'first_name', 'last_name']);
        $departments = DB::table('departments')
                        ->select('departments.*', 'env_employees.last_name', 'env_employees.first_name')
                        ->join('env_employees', 'departments.reports_to', '=', 'env_employees.employee_id')
                        ->get();
        return view('modules.userManagement.Departments.Departments',
                    ['employees' => $employees,
                     'departments' => $departments]
                    );
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
        try{
            $form_data = $request->input();
            $dept = new Department();

            $last_dept = Department::orderby('id', 'desc')->first();
            $id = $last_dept ? $last_dept->id + 1 : 1;
            $dept_id = 'DEPT-' . str_pad($id, 3, '0', STR_PAD_LEFT);
            $dept->department_id = $dept_id;
            $dept->department_name = $form_data['deptName'];
            $dept->reports_to = $form_data['deptHead'];

            $dept->save();
        } catch (Exception $e) {
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
        return response()->json(['department' => Department::find($id)]);
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
        try {
            //code...
            $dept = Department::find($id);
            $dept->delete();
        } catch (Exception $e) {
            //throw $th;
            return $e;
        }
    }
}
