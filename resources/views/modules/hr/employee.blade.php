<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
    <h2 class="navbar-brand" style="font-size: 35px;">Employees</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown li-bom">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                    </ul>
                </li>
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;"  onclick="Employee()">Refresh</button>
                </li>
                <li class="nav-item li-bom">
                    <button type="button" class="btn btn-info btn" style="background-color: #007bff;" onclick="addEmployee()">New</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

        <hr>

            @if(count($employees) >= 0)
            <div class="employeedata">
                <table id="employeeTable" class="table table-striped table-bordered hover" style="width:100%">
                    <thead>
                        <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach ($employees as $row)
                    <tr id="<?=$row["id"]?>">
                        <td class="text-black-50"><?=$row["employee_id"]?></td>
                        <td class="text-black-50"><?=$row["first_name"]?> <?=$row["last_name"]?></td>
                        <td class="text-black-50"><?=$row["position"]?></td>
                        <td class="text-black-50"><?=$row["email"]?></td>
                        <td class="text-black-50"><?=$row["role_id"]?></td>
                        {{-- <td class="text-black-50"><?=$row["address"]?></td>
                        <td><img src="images/img.png" class="customer-modal-image" height="37" onError="this.onerror=null;this.src='images/defaultuser.png';"></td>
                        <td class="text-black-50"><?=$row["email_address"]?></td>
                        <td class="text-black-50"><?=$row["company_name"]?></td>
                        <td class="">
                            <a href="#" class="btn btn-success btn-sm rounded-0 editBtn" type="button"><i class="fa fa-edit"></i></a>
                        </td> --}}
                    </tr>
                    @endforeach
                    {{-- <tr>
                       <td class="text-bold"><a href="javascript:onclick=EditEmployee();">EMP001</a></td>
                       <td>Juan Dela Cruz</td>
                       <td class="text-bold">Supervisor</td>
                       <td>juandelacruz@gmail.com</td>
                       <td>Role1</td>
                    </tr>
                    <tr>
                       <td class="text-bold">MNGR001</td>
                       <td>John Doe</td>
                       <td class="text-bold">Manager</td>
                       <td>johndoe@gmail.com</td>
                       <td>Role2</td>
                    </tr> --}}
                   
                    </tbody>
                </table>  
            </div>
            @endif      
          

</div>

<style>
    .conContent {
        padding: 50px;
    }
</style>


<script>
    $(document).ready(function() {
        $('#employeeTable').dataTable({
            columnDefs: [{
                orderable: false,
                targets: 0
            }],
            order: [
                [1, 'asc']
            ]
        });
    });
    var url = "js/employee.js";
    $.getScript(url);
</script>