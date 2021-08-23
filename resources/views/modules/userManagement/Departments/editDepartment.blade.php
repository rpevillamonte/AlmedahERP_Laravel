<form action="" method="POST" id="EmpEditTypeForm">
  <div class="row">
    <div class="col-7">
      <label class=" text-nowrap align-middle">
        Department ID
      </label>
      <div class="d-flex">
        <input type="text" class="form-input form-control" id="deptEditID" readonly>
        <input type="number" hidden id="deptIDHidden">
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
        <input type="text" class="form-input form-control" name="deptEditName" id="deptEditName">
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
        <input type="text" class="form-input form-control" id="deptEditHead">
      </div>
    </div>
  </div>
</form>