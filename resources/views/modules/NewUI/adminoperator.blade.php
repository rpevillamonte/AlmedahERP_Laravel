<script src="{{ asset('js/adminoperator.js') }}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" >
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Operator</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                
            </ul>
        </div>
    </div>
</nav>
<hr>
<div class="row">
            <div class="col-6">
                <div class="form-group">
                    <br>
                    <label>Select Production : </label>
                    <select class="form-control" id="wc_select" onchange="operators()">
                        <option value="N/A" selected></option>
                        <option value="Repair">Repair</option>
                        <option value="Sample1">Sample 1</option>
                        <option value="Sample2">Sample 2</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div id="f1" style="display:none">
                  
                    <table class="table border-bottom table-hover table-bordered" id="Repair">
                    <thead>
                        <tr>
                        <th>Repair ID</th>
                        <th>Product Code</th>
                        <th>Date Issued</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    </table>

                </div>
                <div id="f2" style="display:none">

                    <table class="table border-bottom table-hover table-bordered" id="Sample1">
                    <thead>
                        <tr>
                        <th>Sample ID</th>
                        <th>Sample Code</th>
                        <th>Date Issued</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    </table>

                </div>    
                <div id="f3" style="display:none">

                    <table class="table border-bottom table-hover table-bordered" id="Sample2">
                    <thead>
                        <tr>
                        <th>Sample ID</th>
                        <th>Sample Code</th>
                        <th>Date Issued</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    </table>
                    
                </div>    
            </div>
</div>

<script>
$(document).ready(function() {
    $('#Repair').DataTable();
} );
$(document).ready(function() {
    $('#Sample1').DataTable();
} );
$(document).ready(function() {
    $('#Sample2').DataTable();
} );
</script>