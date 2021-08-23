<div class="accordion" id="accordion">
  <div class="card">
    <div class="card-header" id="heading1">
      <h2 class="mb-0">
        <button class="btn btn-link d-flex w-100" type="button" data-toggle="collapse"
          data-target="#InfomationStockTrace" aria-expanded="true">
          INFORMATION
        </button>
      </h2>
    </div>
    <div class="collapse show" id="InfomationStockTrace">
      <div class="card-body">
        <form action="" id="saleCustomerForm">
          <div class="row">
            <div class="col-5">
              <label class=" text-nowrap align-middle">
                First Name *
              </label>
              <div class="d-flex">
                <input type="text" class="form-input form-control" id="memberFName">
              </div>
            </div>
            <div class="col-5">
              <label class=" text-nowrap align-middle">
                Last Name *
              </label>
              <div class="d-flex">
                <input type="text" class="form-input form-control" id="memberLName">
              </div>
            </div>
            <div class="col-2">
              <label class=" text-nowrap align-middle">
                Gender
              </label>
              <div class="d-flex">
                <select class="form-control" name="memberGender" id="memberGender">
                  <option value="" selected disabled>Choose</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Date of Birth
              </label>
              <div class="d-flex">
                <input type="date" class="form-input form-control" id="memberBday">
              </div>
            </div>
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Position *
              </label>
              <div class="d-flex">
                <input type="text" class="form-control" id="memberPos">
              </div>
            </div>
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Department
              </label>
              <div class="d-flex">
                <select name="Department" id="memberDept" class="form-control">
                  <option value="" selected disabled>Nothing Selected</option>
                  @foreach ($departments as $department)
                      <option value="{{ $department->department_id }}" data-subtext="{{ $department->department_id }}">{{ ucfirst($department->department_name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Joining Date
              </label>
              <div class="d-flex">
                <input type="date" class="form-input form-control" id="memberJoinDate">
              </div>
            </div>
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Reporting Boss
              </label>
              <div class="d-flex">
                <select name="memberBoss" id="memberBoss" class="form-control">
                  <option value="Not Applicable">Not Applicable</option>
                  <option value="Boss 1">Boss 1</option>
                  <option value="Boss 2">Boss 2</option>
                  <option value="Boss 3">Boss 3</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                &ensp;&ensp;
                <input class="form-check-input" type="checkbox" value="" id="memberIsAdmin">
                <label class="form-check-label" for="memberIsAdmin">
                  is Admin
                </label>
              </label>
              <div class="d-flex">
                <select name="memberRole" id="memberRole" class="form-control">
                  <option value="" selected disabled>User Role (Select)</option>
                  <option value="Role1">001: Role 1</option>
                  <option value="Role2">002: Role 2</option>
                  <option value="Role3">003: Role 3</option>
                  <option value="Role4">004: Role 4</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Salary
              </label>
              <div class="d-flex">
                <input type="number" class="form-input form-control" id="memberSalary">
              </div>
            </div>
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Salary Term
              </label>
              <div class="d-flex">
                <select name="memberSTerm" id="memberSTerm" class="form-control">
                  <option value="" selected disabled>Select</option>
                  <option value="Weekly">Weekly</option>
                  <option value="Bi-monthly">Bi-monthly</option>
                  <option value="Monthly">Monthly</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <label class=" text-nowrap align-middle">
                Employement Type
              </label>
              <div class="d-flex">
                <select name="memberEmpType" id="memberEmpType" class="form-control">
                  <option value="" selected disabled>Select</option>
                  <option value="Full Time">001: Full Time</option>
                  <option value="Contract">002: Contract</option>
                  <option value="Part-time">003: Part-time</option>
                  <option value="Probation">004: Probation</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-6">
              <label class=" text-nowrap align-middle">
                Email
              </label>
              <div class="d-flex">
                <input type="email" class="form-input form-control" id="memberEmail">
              </div>
              <br>
              <label class=" text-nowrap align-middle">
                Password
              </label>
              <div class="d-flex">
                <input type="password" class="form-input form-control" id="memberPassword">
              </div>
              <br>
              <label class=" text-nowrap align-middle">
                Status
              </label>
              <div class="d-flex">
                <select name="memberStatus" class=" form-control" id="memberStatus">
                  <option value="" selected disabled>Select</option>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  <option value="Suspended">Suspended</option>
                  <option value="Left">Left</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <label class=" text-nowrap align-middle">
                Contact Number
              </label>
              <div class="d-flex">
                <input type="number" class="form-input form-control" id="memberCNumber">
              </div>
              <br>
              <label for="memberAddress">Address</label>
              <textarea class="form-control" id="memberAddress" rows="3"></textarea>
            </div>
          </div>
          <br>
        </form>
      </div>
    </div>
  </div>
</div>