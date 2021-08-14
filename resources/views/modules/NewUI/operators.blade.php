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
<br>
<div class="container">
        <hr>
        <br>
        <div class="row">
         <div class="col-12">
         <div class="card p-4">
        <div class="d-flex align-items-center">
            <div class="image"> <i class='fas fa-user fa-fw fa-8x'></i> </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0">John Doe</h4> <span>Production</span>
              
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> Time In <span class="number1">8:00 am</span> </div>
                    <div class="d-flex flex-column"> Time Out <span class="number1">5:00 pm</span> </div>
                </div>
            
                
                <div class="p-2 mt-2 bg-success d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> Tasks Done <span class="number2">0 / 5</span></div>
                </div>
               
            
                <div class="button mt-2 d-flex flex-row align-items-center"> <button class="btn btn-sm btn-outline-primary w-100" data-toggle="modal" data-target="#report">Report</button> <button class="btn btn-sm btn-danger w-100 ml-2" onclick="javascript:confirm('Do you really want to Logout?');">Logout</button> </div>
            </div>
        </div>
           </div>  
         </div>

      </div> 
        <div class="row">
  
        <div class="col-12">
          <br>
        <table id="operator_table" class="w-100 table table-bom border-bottom">
            <thead class="border-top border-bottom bg-light">
                <tr class="text-muted">

                    <td>Tasks</td>
                    <td>Status</td>
                    <td  style="text-align:center;">Action</td>
                    
                </tr>
            </thead>
            <tbody class="">
            
                <tr id="">
 
                    <td><a href="" data-toggle="modal" data-target="#details">Sample Task</a></td>
                    <td>Pending</td>
                    <td style="text-align:center;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                     <button type="button" class="btn btn-outline-primary" id="start" onclick="javascript:confirm('Do you really want to start?'); enableButton2();">Start</button>
                     <button type="button" class="btn btn-outline-success" id="completed" onclick="javascript:confirm('Are you sure it is done?'); " style="display:none;">Completed</button>
                     <button type="button" class="btn btn-outline-dark" id="cancel" onclick="javascript:confirm('Are you sure you want to cancel?'); " style="display:none;">Cancel</button>
                    </div>
                    </td>
                </tr>
                <tr id="">
 
                    <td><a href="" data-toggle="modal" data-target="#details">Sample Task</a></td>
                    <td>Pending</td>
                    <td style="text-align:center;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                     <button type="button" class="btn btn-outline-primary" id="start" onclick="javascript:confirm('Do you really want to start?'); enableButton2();">Start</button>
                     <button type="button" class="btn btn-outline-success" id="completed" onclick="javascript:confirm('Are you sure it is done?'); " style="display:none;">Completed</button>
                     <button type="button" class="btn btn-outline-dark" id="cancel" onclick="javascript:confirm('Are you sure you want to cancel?'); " style="display:none;">Cancel</button>
                    </div>
                    </td>
                </tr>
                <tr id="">
 
                    <td><a href="" data-toggle="modal" data-target="#details">Sample Task</a></td>
                    <td>Pending</td>
                    <td style="text-align:center;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                     <button type="button" class="btn btn-outline-primary" id="start" onclick="javascript:confirm('Do you really want to start?'); enableButton2();">Start</button>
                     <button type="button" class="btn btn-outline-success" id="completed" onclick="javascript:confirm('Are you sure it is done?'); " style="display:none;">Completed</button>
                     <button type="button" class="btn btn-outline-dark" id="cancel" onclick="javascript:confirm('Are you sure you want to cancel?'); " style="display:none;">Cancel</button>
                    </div>
                    </td>
                </tr>
                <tr id="">
 
                    <td><a href="" data-toggle="modal" data-target="#details">Sample Task</a></td>
                    <td>Pending</td>
                    <td style="text-align:center;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                     <button type="button" class="btn btn-outline-primary" id="start" onclick="javascript:confirm('Do you really want to start?'); enableButton2();">Start</button>
                     <button type="button" class="btn btn-outline-success" id="completed" onclick="javascript:confirm('Are you sure it is done?'); " style="display:none;">Completed</button>
                     <button type="button" class="btn btn-outline-dark" id="cancel" onclick="javascript:confirm('Are you sure you want to cancel?'); " style="display:none;">Cancel</button>
                    </div>
                    </td>
                </tr>
                <tr id="">
 
                    <td><a href="" data-toggle="modal" data-target="#details">Sample Task</a></td>
                    <td>Pending</td>
                    <td style="text-align:center;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                     <button type="button" class="btn btn-outline-primary" id="start" onclick="javascript:confirm('Do you really want to start?'); enableButton2();">Start</button>
                     <button type="button" class="btn btn-outline-success" id="completed" onclick="javascript:confirm('Are you sure it is done?'); " style="display:none;">Completed</button>
                     <button type="button" class="btn btn-outline-dark" id="cancel" onclick="javascript:confirm('Are you sure you want to cancel?'); " style="display:none;">Cancel</button>
                    </div>
                    </td>
                </tr>                                                                                                                     
            </tbody>
        </table>
</div>
</div>
</div>

<!-- Report Modal -->
<div class="modal fade bd-example-modal-lg " id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Report_model">Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="row">
        <div class="col-6">
                  <div class="form-group">
                    <label for="purpose">Subject</label>

                    <input type="text" name="r_subject" id="r_subject" class="form-control">
                  </div>
                </div>
        </div>

        <div class="row">
        <div class="col-12">
                  <div class="form-group">
                    <label for="purpose">Message</label>

                    <textarea class="form-control" id="summernote" rows="5"></textarea>
                  </div>
                </div>
        
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- Details Modal -->
<div class="modal fade bd-example-modal-lg" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal_details">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

                    <textarea class="form-control" id="issue" readonly rows="3"></textarea>
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
     function enableButton2() {
            document.getElementById("start").disabled = "true";
            document.getElementById("completed").style = "block";
            document.getElementById("cancel").style = "block";
        }
$(document).ready(function () {
    $('#summernote').summernote({
        height: 200
    });
    $('#form-control').verticalTimeline({
        startLeft: false,
        alternate: false,
        arrows: false
    });
});

</script>