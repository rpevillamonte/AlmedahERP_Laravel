<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" >
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Repair Requests</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
        <hr>
        <br>
        <table id="operator_table" class="w-100 table table-bom border-bottom">
            <thead class="border-top border-bottom bg-light">
                <tr class="text-muted">
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                        </div>
                    </td>
                    
                    <td>Repair ID</td>
                    <td>Product Code</td>
                    <td>Date Issued</td>
                    <td>Status</td>
                    
                    <td>Action</td>
                    
                </tr>
            </thead>
            <tbody class="">
            
                <tr id="">
                <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                        </div>
                    </td>
                    <td>REP00001</td>
                    <td>PROD0001</td>
                    <td>03-19-2021</td>
                    <td>Pending</td>
                    <td ><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#details">View Details</button>
                    
                    </td>
                    
                    
                </tr>
            
                
            </tbody>
        </table>
    </div>

</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <button type="button" class="btn btn-outline-primary mr-auto" onclick="javascript:confirm('Do you really want to start?');">Start</button>  
      <button type="button" class="btn btn-outline-success mr-auto" onclick="javascript:confirm('Are you sure it is done?');">Completed</button>
      <button type="button" class="btn btn-outline-dark mr-auto" onclick="javascript:confirm('Are you sure you want to cancel?');">Cancel</button>  
      <div class="row">
      
            <div class="col-6">
            <br>
                  <div class="form-group">
                    <label for="purpose">Repair ID</label>

                    <input type="text" name="wclaim_id" id="wclaim_id" readonly class="form-control">
                  </div>
                </div>

            <div class="col-6">
            <br>
                <div class="form-group">
                  <label for="">Status</label>
                  <input type="text" name="status" id="status" readonly class="form-control">
                    
                    
                  </select>
                </div>
              </div>

        </div>

        <div class="row">
        <div class="col-6">
                  <div class="form-group">
                    <label for="purpose">Issue Date</label>

                    <input type="date" name="issue_date" id="issue_date" readonly class="form-control">
                  </div>
                </div>
        </div>

        <div class="row">
        <div class="col-12">
                  <div class="form-group">
                    <label for="purpose">Issue</label>

                    <textarea class="form-control" id="exampleFormControlTextarea1" readonly rows="3"></textarea>
                  </div>
                </div>
        
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<style>
    .conContent {
        padding: 200px;
    }
</style>

<script>
$(document).ready(function() {
    $('#operator_table').DataTable();
} );


</script>