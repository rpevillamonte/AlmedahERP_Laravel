<script src="{{ asset('js/departments.js') }}"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Departments</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" type="button"
                        id="deptRefresh">Refresh</button>
                </li>
                <li class="nav-item li-bom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDeptPrompt">
                        New
                    </button>
                </li>
            </ul>
        </div>
    </div>
    
</nav>
<div class="alert alert-success" style="display:none" role="alert">
    Successfully created a <a href="#" class="alert-link">Department</a>.
</div>
<div class="alert alert-danger" style="display:none" role="alert">
    There was an error in creating  <a href="#" class="alert-link">Department</a>.
</div>
<br>
<table id="departmentsTable" class="table table-striped table-bordered hover" style="width:100%">
    <thead>
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Department Head</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $department)
            <tr>
                <td class="text-bold">
                    <a href="#editDeptPrompt" data-toggle="modal" data-target="#editDeptPrompt" class="dept-link"
                        value="{{ $department->id }}">
                        {{ $department->department_id }}
                    </a>
                </td>
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->first_name }} {{ $department->last_name }}</td>
            </tr>
        @endforeach
        {{-- <tr>
            <td class="text-bold"><a href="#editDeptPrompt" data-toggle="modal"
                    data-target="#editDeptPrompt">DEPT-002</a></td>
            <td>Department 2</td>
            <td>John Doe</td>
        </tr> --}}
    </tbody>
</table>

<!-- Modal New Record-->
<div class="modal fade" id="newDeptPrompt" tabindex="-1" role="dialog" aria-labelledby="newDeptPromptTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create a Department</h5>

            </div>
            <div class="modal-body">
                @include('modules.userManagement.Departments.newDepartment')
            </div>
            <div class="modal-footer d-flex">
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-primary m-1" data-dismiss="modal" data-target="#newDeptPrompt"
                        id="saveNewDept">
                        <a class="" href="#" style="text-decoration: none;color:white">
                            Save
                        </a>
                    </button>
                    <button type="button" class="btn btn-secondary m-1" data-dismiss="modal"
                        data-target="#newDeptPrompt" id="closeDeptCreate">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Record-->
<div class="modal fade" id="editDeptPrompt" tabindex="-1" role="dialog" aria-labelledby="editDeptPromptTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Department</h5>

            </div>
            <div class="modal-body">
                @include('modules.userManagement.Departments.editDepartment')
            </div>
            <div class="modal-footer d-flex">
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary m-1" id="saveEditDept" form="EmpEditTypeForm">Save</button>
                    <form action="" id="deleteDeptForm" method="POST">
                        <button type="button" class="btn btn-danger m-1" data-dismiss="modal"
                            data-target="#editDeptPrompt" id="deleteDept">
                            Delete <span class="fas fa-trash"></span>
                        </button>
                    </form>
                    <button type="button" class="btn btn-secondary m-1" data-dismiss="modal"
                        data-target="#newDeptPrompt" id="closeEditDept">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
