<form action="{{ route('employmenttype.store') }}" id="EmpTypeForm" method="POST">
  <div class="row">
    <br>
    <div class="col">
      <label class=" text-nowrap align-middle">
        Employment Type ID
      </label>
      <div class="d-flex">
        <input type="text" class="form-input form-control" id="empTypeID" disabled>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <label class=" text-nowrap align-middle">
        Employment Type Name
      </label>
      <div class="d-flex">
        <input type="text" class="form-input form-control" name="empTypeName" id="empTypeName">
      </div>
    </div>
  </div>
</form>