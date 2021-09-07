<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
class TeamMembersController extends Controller
{
    public function index()
    {
        $employees = Employee::all(['employee_id', 'first_name', 'last_name']);
        $departments = Department::all();
        return view('modules.userManagement.TeamMembers.TeamMembers',
                    [
                     'departments' => $departments]
                    );
    }
}
