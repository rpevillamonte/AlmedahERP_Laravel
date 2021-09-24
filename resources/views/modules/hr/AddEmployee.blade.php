<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
    <h2 class="navbar-brand" style="font-size: 35px;">Add Employee</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" onclick="Employee()">Cancel</button>
                </li>
                <li class="nav-item li-bom">
                    <input class="btn btn-primary" form="addemployee" type="submit"/>
                    {{-- <button class="btn btn-primary" form="addemployee" style="background-color: #007bff;" >Save</button> --}}
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="alert alert-success alert-dismissible" id="addemployee-success" style="display:none;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
</div>
<div class="alert alert-danger alert-dismissible" id="addemployee-danger" style="display:none;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
</div>
<div class="container">
	<form id="addemployee" method="post">
    @csrf
        <hr>
        <div class="row">
          <div class="col-3">
            <div class="form-group">
              <label>Employee ID</label>
              <input type="text" readonly name="employee_id" id="employee_id" class="form-control" placeholder='EMP-XXX'>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text"  name="first_name" id="first_name" class="form-control">
            </div>
            </div>   
            <div class="col-6">
            <div class="form-group">
              <label >Last Name</label>
              <input type="text"  name="last_name" id="last_name" class="form-control">
            </div>
            </div>   
        </div> 
        <div class="row">
            <div class="col-3">
            <div class="form-group">
            <label>
                Gender
            </label>
                <select class="form-control" name="gender" id="gender">
                  <option value="" selected disabled>Choose</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                
                </select>
            </div>
            </div>
            <div class="col-3">
            <div class="form-group">
              <label >Birthday</label>
              <input type="date"  name="date_of_birth" id="date_of_birth" class="form-control">
            </div>
            </div>
            <div class="col-3">
            <div class="form-group">
              <label >Position</label>
              <input type="text"  name="position" id="position" class="form-control">
            </div>
            </div>
            <div class="col-3">
            <div class="form-group">
              <label >Employment Type</label>
              <select class="form-control" name="employment_type" id="employment_type">
                  <option value="" selected disabled>Choose</option>
                  <option value="EMP-FT">Full-Time</option>
                  <option value="EMP-C">Contract</option>
                  <option value="EMP-P">Probation</option>
                  <option value="EMP-PT">Part-Time</option>
                </select>
            </div>
            </div>
        </div> 
        <hr>
        <div class="row">
            <div class="col-3">
            <div class="form-group">
              <label>Department ID</label>
              <input list="departmentid" name="department_id" id="department_id" class="form-control" >
              <datalist id="departmentid">
                  @foreach ($departments as $row)
                      <option value="{{ $row->department_id }}"> {{ $row->department_id}}
                        </option>
                  @endforeach
                  <option value=" + Add new">
              </datalist>
            </div>
            </div>      
        </div>  
        <div class="row">
            <div class="col-4">
            <div class="form-group">
              <label >Hired Date</label>
              <input type="date"  name="hired_date" id="hired_date" class="form-control">
            </div>
            </div>
            <div class="col-4">
            <div class="form-group">
              <label >Salary</label>
              <input type="number" min="0" name="salary" id="salary" class="form-control">
            </div>
            </div>
            <div class="col-4">
            <div class="form-group">
              <label >Salary Term</label>
              <select class="form-control" name="salary_term" id="salary_term">
                  <option value="" selected disabled>Choose</option>
                  <option value="Weekly">Weekly</option>
                  <option value="Monthly">Monthly</option>
                </select>
            </div>
            </div>
        </div> 
        <hr>
        <div class="row">
            <div class="col-3">
            <div class="form-group">
              <label>Role ID</label>
              <input list="roleid" name="role_id" id="role_id" class="form-control" >
              <datalist id="roleid">
                @foreach ($roles as $row)
                    <option value="{{ $row->role_id }}"> {{ $row->role_id}}
                      </option>
                @endforeach
                <option value=" + Add new">
            </datalist>
            </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            </div>  
            <div class="col-6">
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" id="password" class="form-control">
            </div>
            </div>  
        </div>
        <div class="row">
        <div class="col-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin">
            <label class="form-check-label">
                IS Admin
            </label>
            </div>  
        </div>
        </div>
        <hr>  
        <div class="row">
          <div class="col-6">
          <div class="form-group">
              <label>Contact No.</label>
              <input type="number" min="0" name="contact_number" id="contact_number" class="form-control">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status" id="status">
                  <option value="" selected disabled>Choose</option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  <option value="Suspended">Suspended</option>
                  <option value="Left">Left</option>
                </select>
        </div>
        </div>
        </div>
        <div class="row">
             <div class="col-12">
             <div class="form-group">
              <label>Address</label>
              <textarea name="address" id="address" class="form-control"></textarea>
            </div>  
            </div>   
        </div> 
    </form>

</div>

<script>
   $("#addemployee").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/create-employee",
            data: $("#addemployee").serialize(),
            success: function (response) {
                console.log(response);
                successNotification("Employee SuccessFully Added!");
                $("#addemployee")[0].reset();
            },
            error: function () {
                console.log("ERROR");
                dangerNotification(
                    "An existing account with the same Email exists!"
                );
            },
        });
    });

    $('#is_admin').on('change', function(){
      $('#is_admin').val(this.checked ? 1 : 0);
      console.log($('#is_admin').val());
    });

    function dangerNotification(text) {
      $("#addemployee-danger").show();
      $("#addemployee-danger").html(text);
      $("#addemployee-danger").delay(4000).hide(1);
    }

    function successNotification(text) {
        $("#addemployee-success").show();
        $("#addemployee-success").html(text);
        $("#addemployee-success").delay(4000).hide(1);
        loadAll();
    }
</script>