<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employee;
use \App\Models\Department;
use App\Models\EmploymentType;
use \App\Models\UserRole;
use DB;
use Illuminate\Support\Facades\Hash;
class EmployeeController extends Controller
{
    public function index(){
        // $position = Employee::whereNotNull('position')->distinct();
        $employees = Employee::employees()->get(['employee_id', 'last_name', 'first_name', 'email']);
        // $departments = Department::get();

        // $roles = Employee::get()->pluck('role_id');
        // $role_names = array();
        // foreach($roles as $role){
        //     $user_role = UserRole::where('role_id', $role)->first();
        //     $role_name = $user_role->role_name ?? null;
        //     array_push($role_names, $role_name);
        // }
        // $spec_rolesModel::all(['id'])->toArray()
        return view('modules.hr.employee', [
            'employees' => $employees
            // 'departments' => $departments,
            // 'role_names' => $role_names,
        ]);
    }

    public function addEmployee(){
        $departments = Department::get();
        $roles = UserRole::get();
        $e_types = EmploymentType::get();

        return view('modules.hr.AddEmployee', [
            'departments' => $departments,
            'roles' => $roles,
            'e_types' => $e_types
        ]);
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'last_name' => 'required|max:30',
            'first_name' => 'required|max:30',
            'position' => 'required|max:50',
            'contact_number' => 'required|numeric',
            'email' => 'required|unique:env_employees,email',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'department_id' => 'required',
            'hired_date' => 'required',
            'salary' => 'required',
            'salary_term' => 'required',
            'role_id' => 'required',
            'status' => 'required',
            'address' => 'required',
        ]);

        try {
            $form_data = $request->input();
            $data = new Employee();
            $data->employee_id = 'EMP'.rand(1,1000);
            $data->last_name = $form_data['last_name'];
            $data->first_name = $form_data['first_name'];
            $data->position = $form_data['position'];
            $data->gender = $form_data['gender'];
            $data->email = $form_data['email'];

            $data->contact_number = $form_data['contact_number'];
            $data->salary_term = $form_data['salary_term'];
            $data->salary = $form_data['salary'];
            $data->hired_date = $form_data['hired_date'];
            $data->date_of_birth = $form_data['date_of_birth'];


            $data->password = Hash::make($form_data['password']);
            

            $data->is_admin = $form_data['is_admin'];
            $data->address = $form_data['address'];
            $data->status = $form_data['status'];
            $data->department_id = $form_data['department_id'];
            $data->role_id = $form_data['role_id'];

            $data->employment_id = $form_data['employment_type'];
            $data->save();
            return response($data);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'lname' => 'required|max:30',
            'fname' => 'required|max:30',
            'position' => 'required|max:50',
            'contactno' => 'required|numeric',
            'Email' => 'required|email',
            'mamberGender' => 'required',
            'bday' => 'required',
            'Hdate' => 'required',
            'Salary' => 'required',
            'salaryTerm' => 'required',
            'Status' => 'required',
            'Address' => 'required',
        ]);

        try {
            $employee = Employee::where('employee_id', $id)->first();

            $employee->last_name = $request->input('lname');
            $employee->first_name = $request->input('fname');
            $employee->position = $request->input('position');
            $employee->gender = $request->input('memberGender');

            $employee->contact_number = $request->input('contactno');
            $employee->salary_term = $request->input('salaryTerm');
            $employee->salary = $request->input('Salary');
            $employee->hired_date = $request->input('Hdate');
            $employee->date_of_birth = $request->input('bday');

            if($request->input('Password')){
                $employee->password = Hash::make($request->input('Password'));
            }

            $employee->is_admin = $request->input('isadminEdit');
            $employee->address = $request->input('Address');
            $employee->status = $request->input('Status');
            // $employee->department_id = $request->input('deptID');
            // $employee->role_id = $request->input('roleID');
            // $employee->employment_id = $request->input('eType');

            $employee->save();
            return response($employee);
        } catch (Exception $e) {
            return response('There was an error upon updating!');
        }

        try {
            $employee = Employee::where('id', $id)->first();
            // $imagePath = request('profile_picture');
            // if(request('profile_picture')){
            //     $imagePath = request('profile_picture')->store('uploads', 'public');
            //     $employee->profile_picture = $imagePath;
            // }
            $employee->last_name = $request->input('last_name');
            $employee->first_name = $request->input('first_name');
            $employee->position = $request->input('position');
            $employee->gender = $request->input('gender');
            $employee->contact_number = $request->input('contact_number');

            if(!($request->input('active_status')==null)){
                $employee->active_status = $request->input('active_status');
            }
            $employee->save();
            return response($employee);
        } catch (Exception $e) {
            return response('There was an error upon updating!');
        }
    }

    public function updateimage(Request $request, $id)
    {
        try {
            $employee = Employee::where('id', $id)->first();
            $file = $request->hasFile('profile_picture');
            if($request->hasFile('profile_picture')){
                $imagePath = request('profile_picture')->store('uploads', 'public');
                $employee->profile_picture = $imagePath;
            }
            $employee->save();
            return response($imagePath);
        } catch (Exception $e) {
            return response('There was an error upon updating!');
        }
    }
    // this updates the active status in the employees dataTable
    // public function toggle(Request $request, $id, $stat)
    // {
    //     try {
    //         $employee = Employee::where('id', $id)->first();
    //         $employee->active_status = $stat;
    //         $employee->save();
    //         return response('Account has been activated!');
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'status' => 'failed'
    //         ]);
    //     }
    // }

    public function getEmployeeDetails($employee_id){
        try {
            $employee = Employee::where('employee_id', $employee_id)->first();
            return response($employee);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed'
            ]);
        }
    }

}
