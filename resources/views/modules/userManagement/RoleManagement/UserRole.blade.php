<script src="{{ asset('js/userrole.js') }}"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">User Role</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" type="button"
                        onclick="" id="URRefresh">Refresh</button>
                </li>
                <li class="nav-item li-bom">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newRoleFormPrompt">
                        New Role
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<table id="UserRoleTable" class="table table-striped table-bordered hover" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td class="text-bold">
                <a href="#editRoleModal" data-toggle="modal" value="{{ $role->id }}" class="role-entity" data-target="#editRoleModal">
                    {{ $role->role_name }}
                </a>
            </td>
        </tr>
        @endforeach
        {{--
        <tr>
            <td class="text-bold"><a href="#editRoleModal" data-toggle="modal" data-target="#editRoleModal">Manager
                    Role</a></td>
        </tr>--}}
    </tbody>
</table>

<!-- Modal New Record-->
<div class="modal fade" id="newRoleFormPrompt" tabindex="-1" role="dialog" aria-labelledby="newTracePromptTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Role</h5>
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-primary m-1" data-target="#newRoleFormPrompt" id="saveRole">
                        <a class="" href="#" style="text-decoration: none;color:white">
                            Save
                        </a>
                    </button>
                    <button type="button" class="btn btn-secondary m-1" data-dismiss="modal"
                        data-target="#newRoleFormPrompt" id="closeRolePrompt">
                        Close
                    </button>
                </div>
            </div>
            <div class="modal-body p-5">
                @include('modules.userManagement.RoleManagement.newRoleForm')
            </div>
            <div class="modal-footer d-flex">
                <span id="roleNotif" class="mr-auto text-danger"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal New Record-->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="newTracePromptTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-secondary m-1" data-dismiss="modal"
                        data-target="#editRoleModal" id="closeRoleEditPrompt">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary m-1" data-dismiss="modal" data-target="#editRoleModal" id="updateRole">
                        <a class="" href="#" style="text-decoration: none;color:white">
                            Save
                        </a>
                    </button>
                    <form method="POST" id="deleteRoleForm">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger m-1" data-dismiss="modal" data-target="#editRoleModal"
                        id="deleteRole">
                            Delete <span class="fas fa-trash"></span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-body p-5">
                @include('modules.userManagement.RoleManagement.editRole')
            </div>
            <div class="modal-footer d-flex">
            </div>
        </div>
    </div>
</div>