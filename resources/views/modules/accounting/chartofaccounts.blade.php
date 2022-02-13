<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="{{ asset('js/chartofaccounts.js') }}"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Chart of Accounts</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown li-bom">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                    </ul>
                </li>
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" type="submit"
                        onclick="">Refresh</button>
                </li>

                    <li class="nav-item li-bom">
                        <button style="background-color: #007bff;" class="btn btn-info btn" data-bs-toggle="modal" data-bs-target="#newAccountModal"
                            style="float: left;">New</button>
                    </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">

<!-- ONE NEW FILE -->
<div class="card">
<div class="card-body">
<div class="accordion" id="accordion1">
<div class="accordion-group">
        &nbsp;
        <i class="fa fa-folder"></i>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            Sample Main Account </a>

    <div id="collapseOne" class="accordion-body collapse" style="height: 0px;">
        <div class="accordion-inner">   
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                 
                        <div class="row">
                            <div class="col-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-folder"></i>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneOne">
                                  Application of Funds (Assets)</a>
                            </div>
                            <div class="col-4">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                    <button data-bs-toggle="modal" data-bs-target="#EditAccountModal" type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-primary">Delete</button>
                                    <button type="button" class="btn btn-outline-primary">Add Child</button>
                                    <button type="button" class="btn btn-outline-primary">View Ledger</button>
                                </div>
                            </div>    
                            <div class="col-4">
                                 <p>P10,000</p>
                            </div> 
                        </div>
                        <div id="collapseOneOne" class="accordion-body collapse" style="height: 0px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-folder"></i>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneOne">
                                 Sample Child</a>
                        </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                    <div class="row">
                            <div class="col-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-folder"></i>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneTwo">
                           Source of Funds (Liabilities) </a>
                            </div>
                            <div class="col-4">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-primary">Delete</button>
                                    <button type="button" class="btn btn-outline-primary">Add Child</button>
                                    <button type="button" class="btn btn-outline-primary">View Ledger</button>
                                </div>
                            </div> 
                            <div class="col-4">
                                 <p>P20,000</p>
                            </div>    
                    </div>
                    </div>
                    <div id="collapseOneTwo" class="accordion-body collapse" style="height: 0px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-folder"></i>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneOne">
                                 Sample Child</a>
                    </div>
                    </div>
                </div>
                
                <div class="accordion-group">
                    <div class="accordion-heading">
                    <div class="row">
                            <div class="col-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-folder"></i>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneThree">
                            Equity</a>
                            </div>
                            <div class="col-4">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-primary">Delete</button>
                                    <button type="button" class="btn btn-outline-primary">Add Child</button>
                                    <button type="button" class="btn btn-outline-primary">View Ledger</button>
                                </div>
                            </div> 
                            <div class="col-4">
                                 <p>P30,000</p>
                            </div>    
                    </div>
                    <div id="collapseOneThree" class="accordion-body collapse" style="height: 0px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-folder"></i>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneOne">
                                 Sample Child</a>
                    </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                    <div class="row">
                            <div class="col-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-folder"></i>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneFour">
                            Income</a>
                            </div>
                            <div class="col-4">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-primary">Delete</button>
                                    <button type="button" class="btn btn-outline-primary">Add Child</button>
                                    <button type="button" class="btn btn-outline-primary">View Ledger</button>
                                </div>
                            </div> 
                            <div class="col-4">
                                 <p>P40,000</p>
                            </div>    
                    </div>
                    <div id="collapseOneFour" class="accordion-body collapse" style="height: 0px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-folder"></i>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneOne">
                                 Sample Child</a>
                    </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                    <div class="row">
                            <div class="col-4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-folder"></i>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneFive">
                            Expenses</a>
                            </div>
                            <div class="col-4">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-primary">Delete</button>
                                    <button type="button" class="btn btn-outline-primary">Add Child</button>
                                    <button type="button" class="btn btn-outline-primary">View Ledger</button>
                                </div>
                            </div> 
                            <div class="col-4">
                                 <p>P50,000</p>
                            </div>    
                    </div>
                    <div id="collapseOneFive" class="accordion-body collapse" style="height: 0px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-folder"></i>
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOneOne">
                                 Sample Child</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>


<!-- NEW ACCOUNT MODAL -->
<div class="modal fade" id="newAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form>
  <div class="mb-3">
    <label for="account_id" class="form-label">Account ID</label>
    <input type="text" readonly class="form-control" id="account_id" >
  </div>
  <div class="mb-3">
    <label for="account_name" class="form-label">Account Name</label>
    <input type="text"  class="form-control" id="account_name" >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="isGroup" onclick="openRootType()">
    <label class="form-check-label" for="isGroup">Is Group</label>
  </div>
  <div class="mb-3">
  <div class="form-group" id="root_type" style="display:none;">
    <label for="exampleFormControlSelect1">Root Type</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option selected></option>
      <option>Asset</option>
      <option>Liability</option>
      <option>Equity</option>
      <option>Income</option>
      <option>Expense</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="account_type" class="form-label">Account Type</label>
    <select class="form-control" id="account_type">
      <option selected></option>
      <option>Accumulated Depreciation</option>
      <option>Asset Received But Not Billed</option>
      <option>Bank</option>
      <option>Cash</option>
      <option>Chargeable</option>
      <option>Capital Work In Progress</option>
      <option>Cost of Goods Sold</option>
      <option>Depreciation</option>
      <option>Equity</option>
      <option>Expense Account</option>
      <option>Expenses Included in Asset Valuation</option>
      <option>Expenses Included in Valuation</option>
      <option>Fixed Asset</option>
      <option>Income Account</option>
      <option>Payable</option>
      <option>Receivable</option>
      <option>Round Off</option>
      <option>Stock</option>
      <option>Stock Adjustment</option>
      <option>Stock Received But Not Billed</option>
      <option>Service Received But Not Billed</option>
      <option>Tax</option>
      <option>Temporary</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="parent_account" class="form-label">Parent Account</label>
    <input type="text"  class="form-control" id="parent_account" >
  </div>
  <div class="mb-3">
    <label for="report_type" class="form-label">Report Type</label>
    <input type="text"  class="form-control" id="report_type" >
  </div>

  
</div>

</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create New</button>
      </div>
    </div>
  </div>
</div>


<!-- EDIT ACCOUNT MODAL -->
<div class="modal fade" id="EditAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form>
  <div class="mb-3">
    <label for="account_id" class="form-label">Account ID</label>
    <input type="text" readonly class="form-control" id="account_id" >
  </div>
  <div class="mb-3">
    <label for="account_name" class="form-label">Account Name</label>
    <input type="text"  class="form-control" id="account_name" >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="isGroupEdit" onclick="openRootTypeEdit()" checked>
    <label class="form-check-label" for="isGroup" >Is Group</label>
  </div>
  <div class="mb-3">
  <div class="form-group" id="root_type_edit" style="display:block;">
    <label for="exampleFormControlSelect1">Root Type</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option selected></option>
      <option>Asset</option>
      <option>Liability</option>
      <option>Equity</option>
      <option>Income</option>
      <option>Expense</option>
    </select>
  </div>
  
  <div class="form-group" id="root_type_edit" style="display:block;">
    <label for="exampleFormControlSelect1">Account Type</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option selected></option>
      <option>Accumulated Depreciation</option>
      <option>Asset Received But Not Billed</option>
      <option>Bank</option>
      <option>Cash</option>
      <option>Chargeable</option>
      <option>Capital Work In Progress</option>
      <option>Cost of Goods Sold</option>
      <option>Depreciation</option>
      <option>Equity</option>
      <option>Expense Account</option>
      <option>Expenses Included in Asset Valuation</option>
      <option>Expenses Included in Valuation</option>
      <option>Fixed Asset</option>
      <option>Income Account</option>
      <option>Payable</option>
      <option>Receivable</option>
      <option>Round Off</option>
      <option>Stock</option>
      <option>Stock Adjustment</option>
      <option>Stock Received But Not Billed</option>
      <option>Service Received But Not Billed</option>
      <option>Tax</option>
      <option>Temporary</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="parent_account" class="form-label">Parent Account</label>
    <input type="text"  class="form-control" id="parent_account" >
    
  </div>
  <div class="mb-3">
    <label for="report_type" class="form-label">Report Type</label>
    <input type="text"  class="form-control" id="report_type" >
    
  </div>

  
</div>

</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create New</button>
      </div>
    </div>
  </div>
</div>