<form action="{{ route('departments.store') }}" method="POST" id="departmentForm">
  <div class="row">
    <div class="col-7">
      <label class=" text-nowrap align-middle">
        Department ID
      </label>
      <div class="d-flex">
        <input type="text" class="form-input form-control" id="deptID" value="DEPT-XXX" disabled>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label class=" text-nowrap align-middle">
        Department Name
      </label>
      <div class="d-flex">
        <input type="text" class="form-input form-control" name="deptName" id="deptName">
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label class=" text-nowrap align-middle">
        Department Head
      </label>
      <div class="d-flex">
        <select name="deptHead" class="form-control dept-select" data-live-search="true" id="deptHead">
          <option value="" data-subtext="None">No Selected Employee</option>
          @foreach ($employees as $employee)
              <option value="{{ $employee->employee_id }}" data-subtext="{{ $employee->employee_id }}">{{ $employee->last_name }}, {{ $employee->first_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</form>