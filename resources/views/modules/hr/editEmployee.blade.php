<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
    <h2 class="navbar-brand" style="font-size: 35px;">Edit Employee</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" onclick="Employee()">Cancel</button>
                </li>
                <li class="nav-item li-bom">
                    <button class="btn btn-primary" type="submit" style="background-color: #007bff;" >Save</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
	<form id="editemployee" name="editemployee" role="form">
        <hr>
        <div class="row">
          <div class="col-3">
            <div class="form-group">
              <label>Employee ID</label>
              <input type="text" readonly name="employeeID" id="employeeID" class="form-control" >
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text"  name="fname" id="fname" class="form-control">
            </div>
            </div>   
            <div class="col-6">
            <div class="form-group">
              <label >Last Name</label>
              <input type="text"  name="lname" id="lname" class="form-control">
            </div>
            </div>   
        </div> 
        <div class="row">
            <div class="col-3">
            <div class="form-group">
            <label>
                Gender
            </label>
                <select class="form-control" name="memberGender" id="memberGender">
                  <option value="" selected disabled>Choose</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                
                </select>
            </div>
            </div>
            <div class="col-3">
            <div class="form-group">
              <label >Birthday</label>
              <input type="date"  name="bday" id="bday" class="form-control">
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
              <select class="form-control" name="eType" id="eType">
                  <option value="" selected disabled>Choose</option>
                  <option value="Full-Time">Full-Time</option>
                  <option value="Contract">Contract</option>
                  <option value="Probation">Probation</option>
                  <option value="Part-Time">Part-Time</option>
                </select>
            </div>
            </div>
        </div> 
        <hr>
        <div class="row">
            <div class="col-3">
            <div class="form-group">
              <label>Department ID</label>
              <input type="text" name="deptID" id="deptID" class="form-control" >
            </div>
            </div>      
        </div>  
        <div class="row">
            <div class="col-4">
            <div class="form-group">
              <label >Hired Date</label>
              <input type="date"  name="Hdate" id="Hdate" class="form-control">
            </div>
            </div>
            <div class="col-4">
            <div class="form-group">
              <label >Salary</label>
              <input type="number" min="0" name="Salary" id="Salary" class="form-control">
            </div>
            </div>
            <div class="col-4">
            <div class="form-group">
              <label >Salary Term</label>
              <select class="form-control" name="salaryTerm" id="salaryTerm">
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
              <input type="text" name="roleID" id="roleID" class="form-control" >
            </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="Email" id="Email" class="form-control">
            </div>
            </div>  
            <div class="col-6">
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="Password" id="Password" class="form-control">
            </div>
            </div>  
        </div>
        <div class="row">
        <div class="col-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="isadmin">
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
              <input type="number" min="0" name="contactno" id="contactno" class="form-control">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="Status" id="Status">
                  <option value="" selected disabled>Choose</option>
                  <option value="Weekly">Active</option>
                  <option value="Monthly">Inactive</option>
                  <option value="Monthly">Suspended</option>
                  <option value="Monthly">Left</option>
                </select>
        </div>
        </div>
        </div>
        <div class="row">
             <div class="col-12">
             <div class="form-group">
              <label>Address</label>
              <textarea name="Address"  id="Address" class="form-control"></textarea>
            </div>  
            </div>   
        </div> 
    </form>

</div>