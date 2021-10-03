<script src="{{ asset('js/employee_type.js') }}"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Employment Type</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" type="button"
                        id="etRefresh">Refresh</button>
                </li>
                <li class="nav-item li-bom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newEmpTypePrompt">
                        New
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="et_success_message" class="alert alert-success" style="display: none;">
</div>

<div id="et_alert_message" class="alert alert-danger" style="display: none;">
</div>

<br>
<table id="employmentTypeTable" class="table table-striped table-bordered hover" style="width:100%">
    <thead>
        <tr>
            <th>Employment Type ID</th>
            <th>Employment Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employment_types as $et)
        <tr>
            <td class="text-bold">
                <a href="#EditEmpTypePrompt" data-toggle="modal" data-target="#EditEmpTypePrompt" 
                value="{{ $et->id }}" class="emp-type">
                    {{ $et->employment_id }}
                </a>
            </td>
            <td>{{ $et->employment_type }}</td>
        </tr>
        @endforeach
        {{--
        <tr>
            <td class="text-bold"><a href="#EditEmpTypePrompt" data-toggle="modal"
                    data-target="#EditEmpTypePrompt">EMP-TYPE-002</a></td>
            <td>Contractual</td>
        </tr>
        <tr>
            <td class="text-bold"><a href="#EditEmpTypePrompt" data-toggle="modal"
                    data-target="#EditEmpTypePrompt">EMP-TYPE-003</a></td>
            <td>Part-Time</td>
        </tr>
        <tr>
            <td class="text-bold"><a href="#EditEmpTypePrompt" data-toggle="modal"
                    data-target="#EditEmpTypePrompt">EMP-TYPE-004</a></td>
            <td>Probation</td>
        </tr>
        --}}
    </tbody>
</table>

<!-- Modal New Emp Type-->
<div class="modal fade" id="newEmpTypePrompt" tabindex="-1" role="dialog" aria-labelledby="newEmpTypePromptTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create an Employment Type</h5>

            </div>
            <div class="modal-body">
                @include('modules.userManagement.EmploymentType.newEmpType')
            </div>
            <div class="modal-footer d-flex">
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-primary m-1" data-target="#newEmpTypePrompt" data-dismiss="modal" id="saveEmpType">
                        <a class="" href="#" style="text-decoration: none;color:white">
                            Save
                        </a>
                    </button>
                    <button type="button" class="btn btn-secondary m-1" data-dismiss="modal"
                        data-target="#newEmpTypePrompt" id="closeEmpTypePrompt">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit EmpType-->
<div class="modal fade" id="EditEmpTypePrompt" tabindex="-1" role="dialog" aria-labelledby="EditEmpTypePromptTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Employment Type</h5>

            </div>
            <div class="modal-body">
                @include('modules.userManagement.EmploymentType.editEmpType')
            </div>
            <div class="modal-footer d-flex">
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-primary m-1" data-target="#EditEmpTypePrompt" data-dismiss="modal" id="editEmpType">
                        <a class="" href="#" style="text-decoration: none;color:white">
                            Save
                        </a>
                    </button>
                    <form action="" id="deleteEmpType" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger m-1" data-dismiss="modal" data-target="#EditEmpTypePrompt" id="deleteET">
                            Delete <span class="fas fa-trash"></span>
                        </button>
                    </form>
                    <button type="button" class="btn btn-secondary m-1" data-dismiss="modal" data-target="#EditEmpTypePrompt" id="closeET">
                        Close 
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>