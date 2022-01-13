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
                @if (($permissions['Employee']['create'] ?? null) === 1 || !auth()->user())
                    <li class="nav-item li-bom">
                        <button type="button" class="btn btn-info btn" style="background-color: #007bff;" onclick="addEmployee()">New</button>
                    </li>
                @endif
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
                        
                    @foreach ($employees as $key=>$row)
                    <tr id="<?=$row["id"]?>">
                        <td class="text-black-50">
                            @if (($permissions['Employee']['edit'] ?? null) === 1 || !auth()->user())
                                <a href="javascript:onclick=EditEmployee('<?=$row["employee_id"]?>');">
                                    <?=$row["employee_id"]?>
                                </a> 
                            @else
                                    <?=$row["employee_id"]?>
                            @endif
                        </td>
                        <td class="text-black-50"><?=$row["first_name"]?> <?=$row["last_name"]?></td>
                        <td class="text-black-50"><?=$row["position"]?></td>
                        <td class="text-black-50"><?=$row["email"]?></td>
                        <td class="text-black-50">{{ $role_names[$key ]}}</td>
                    </tr>
                    @endforeach

    
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