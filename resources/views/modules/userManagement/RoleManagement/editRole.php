<form action="" id="RoleForm">
  <div class="row">
    <div class="col-5">
      <label class=" text-nowrap align-middle">
        Role Name
      </label>
      <div class="d-flex">
        <input type="text" class="form-input form-control" id="roleName">
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <table class="table table-sm table-bordered table-striped">
        <thead>
          <tr>
            <th>Permission</th>
            <th class="text-center">View</th>
            <th class="text-center">Create</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Customers</td>
            <td class="text-center"><input type="checkbox" id="ViewCustomers"></td>
            <td class="text-center"><input type="checkbox" id="CreateCustomers"></td>
            <td class="text-center"><input type="checkbox" id="EditCustomers"></td>
            <td class="text-center"><input type="checkbox" id="DeleteCustomers"></td>
          </tr>
          <tr>
            <td>Employees</td>
            <td class="text-center"><input type="checkbox" id="ViewEmployees"></td>
            <td class="text-center"><input type="checkbox" id="CreateEmployees"></td>
            <td class="text-center"><input type="checkbox" id="EditEmployees"></td>
            <td class="text-center"><input type="checkbox" id="DeleteEmployees"></td>
          </tr>
          <tr>
            <td>Suppliers</td>
            <td class="text-center"><input type="checkbox" id="ViewSuppliers"></td>
            <td class="text-center"><input type="checkbox" id="CreateSuppliers"></td>
            <td class="text-center"><input type="checkbox" id="EditSuppliers"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSuppliers"></td>
          </tr>
          <tr>
            <td>Supplier Group</td>
            <td class="text-center"><input type="checkbox" id="ViewSGroup"></td>
            <td class="text-center"><input type="checkbox" id="CreateSGroup"></td>
            <td class="text-center"><input type="checkbox" id="EditSGroup"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSGroup"></td>
          </tr>
          <tr>
            <td>Inventory/Raw Materials</td>
            <td class="text-center"><input type="checkbox" id="ViewInventory"></td>
            <td class="text-center"><input type="checkbox" id="CreateInventory"></td>
            <td class="text-center"><input type="checkbox" id="EditInventory"></td>
            <td class="text-center"><input type="checkbox" id="DeleteInventory"></td>
          </tr>
          <tr>
            <td>Components</td>
            <td class="text-center"><input type="checkbox" id="ViewComponents"></td>
            <td class="text-center"><input type="checkbox" id="CreateComponents"></td>
            <td class="text-center"><input type="checkbox" id="EditComponents"></td>
            <td class="text-center"><input type="checkbox" id="DeleteComponents"></td>
          </tr>
          <tr>
            <td>Products (Machines)</td>
            <td class="text-center"><input type="checkbox" id="View"></td>
            <td class="text-center"><input type="checkbox" id="Create"></td>
            <td class="text-center"><input type="checkbox" id="Edit"></td>
            <td class="text-center"><input type="checkbox" id="Delete"></td>
          </tr>
          <tr>
            <td>Stations</td>
            <td class="text-center"><input type="checkbox" id="ViewStations"></td>
            <td class="text-center"><input type="checkbox" id="CreateStations"></td>
            <td class="text-center"><input type="checkbox" id="EditStations"></td>
            <td class="text-center"><input type="checkbox" id="DeleteStations"></td>
          </tr>
          <tr>
            <td>Stock Moves</td>
            <td class="text-center"><input type="checkbox" id="ViewSMoves"></td>
            <td class="text-center"><input type="checkbox" id="CreateSMoves"></td>
            <td class="text-center"><input type="checkbox" id="EditSMoves"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSMoves"></td>
          </tr>
          <tr>
            <td>Stock Traceability</td>
            <td class="text-center"><input type="checkbox" id="ViewSTrace"></td>
            <td class="text-center"><input type="checkbox" id="CreateSTrace"></td>
            <td class="text-center"><input type="checkbox" id="EditSTrace"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSTrace"></td>
          </tr>
          <tr>
            <td>Material Request</td>
            <td class="text-center"><input type="checkbox" id="ViewMatRequest"></td>
            <td class="text-center"><input type="checkbox" id="CreateMatRequest"></td>
            <td class="text-center"><input type="checkbox" id="EditMatRequest"></td>
            <td class="text-center"><input type="checkbox" id="DeleteMatRequest"></td>
          </tr>
          <tr>
            <td>Request for Quotation</td>
            <td class="text-center"><input type="checkbox" id="ViewReqQuotation"></td>
            <td class="text-center"><input type="checkbox" id="CreateReqQuotation"></td>
            <td class="text-center"><input type="checkbox" id="EditReqQuotation"></td>
            <td class="text-center"><input type="checkbox" id="DeleteReqQuotation"></td>
          </tr>
          <tr>
            <td>Supplier quotation</td>
            <td class="text-center"><input type="checkbox" id="ViewSQuotation"></td>
            <td class="text-center"><input type="checkbox" id="CreateSQuotation"></td>
            <td class="text-center"><input type="checkbox" id="EditSQuotation"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSQuotation"></td>
          </tr>
          <tr>
            <td>Email Suppliers</td>
            <td class="text-center"><input type="checkbox" id="ViewEmailSuppliers"></td>
            <td class="text-center"><input type="checkbox" id="CreateEmailSuppliers"></td>
            <td class="text-center"><input type="checkbox" id="EditEmailSuppliers"></td>
            <td class="text-center"><input type="checkbox" id="DeleteEmailSuppliers"></td>
          </tr>
          <tr>
            <td>Purchase Order</td>
            <td class="text-center"><input type="checkbox" id="ViewPurchaseOrder"></td>
            <td class="text-center"><input type="checkbox" id="CreatePurchaseOrder"></td>
            <td class="text-center"><input type="checkbox" id="EditPurchaseOrder"></td>
            <td class="text-center"><input type="checkbox" id="DeletePurchaseOrder"></td>
          </tr>
          <tr>
            <td>Purchase Receipt</td>
            <td class="text-center"><input type="checkbox" id="ViewPurchaseReceipt"></td>
            <td class="text-center"><input type="checkbox" id="CreatePurchaseReceipt"></td>
            <td class="text-center"><input type="checkbox" id="EditPurchaseReceipt"></td>
            <td class="text-center"><input type="checkbox" id="DeletePurchaseReceipt"></td>
          </tr>
          <tr>
            <td>Purchase Invoice</td>
            <td class="text-center"><input type="checkbox" id="ViewPurchaseInvoice"></td>
            <td class="text-center"><input type="checkbox" id="CreatePurchaseInvoice"></td>
            <td class="text-center"><input type="checkbox" id="EditPurchaseInvoice"></td>
            <td class="text-center"><input type="checkbox" id="DeletePurchaseInvoice"></td>
          </tr>
          <tr>
            <td>Pending Orders</td>
            <td class="text-center"><input type="checkbox" id="ViewPendingOrders"></td>
            <td class="text-center"><input type="checkbox" id="CreatePendingOrders"></td>
            <td class="text-center"><input type="checkbox" id="EditPendingOrders"></td>
            <td class="text-center"><input type="checkbox" id="DeletPendingOrderse"></td>
          </tr>
          <tr>
            <td>Machine Manual</td>
            <td class="text-center"><input type="checkbox" id="ViewMachineManual"></td>
            <td class="text-center"><input type="checkbox" id="CreateMachineManual"></td>
            <td class="text-center"><input type="checkbox" id="EditMachineManual"></td>
            <td class="text-center"><input type="checkbox" id="DeleteMachineManual"></td>
          </tr>
          <tr>
            <td>Work Center</td>
            <td class="text-center"><input type="checkbox" id="ViewWorkCenter"></td>
            <td class="text-center"><input type="checkbox" id="CreateWorkCenter"></td>
            <td class="text-center"><input type="checkbox" id="EditWorkCenter"></td>
            <td class="text-center"><input type="checkbox" id="DeleteWorkCenter"></td>
          </tr>
          <tr>
            <td>Operations</td>
            <td class="text-center"><input type="checkbox" id="ViewOperations"></td>
            <td class="text-center"><input type="checkbox" id="CreateOperations"></td>
            <td class="text-center"><input type="checkbox" id="EditOperations"></td>
            <td class="text-center"><input type="checkbox" id="DeleteOperations"></td>
          </tr>
          <tr>
            <td>Routings</td>
            <td class="text-center"><input type="checkbox" id="ViewRoutings"></td>
            <td class="text-center"><input type="checkbox" id="CreateRoutings"></td>
            <td class="text-center"><input type="checkbox" id="EditRoutings"></td>
            <td class="text-center"><input type="checkbox" id="DeleteRoutings"></td>
          </tr>
          <tr>
            <td>Bill of Materials</td>
            <td class="text-center"><input type="checkbox" id="ViewBOM"></td>
            <td class="text-center"><input type="checkbox" id="CreateBOM"></td>
            <td class="text-center"><input type="checkbox" id="EditBOM"></td>
            <td class="text-center"><input type="checkbox" id="DeleteBOM"></td>
          </tr>
          <tr>
            <td>Jobs Scheduling</td>
            <td class="text-center"><input type="checkbox" id="ViewJobScheduling"></td>
            <td class="text-center"><input type="checkbox" id="CreateJobScheduling"></td>
            <td class="text-center"><input type="checkbox" id="EditJobScheduling"></td>
            <td class="text-center"><input type="checkbox" id="DeleteJobScheduling"></td>
          </tr>
          <tr>
            <td>Sales</td>
            <td class="text-center"><input type="checkbox" id="ViewSales"></td>
            <td class="text-center"><input type="checkbox" id="CreateSales"></td>
            <td class="text-center"><input type="checkbox" id="EditSales"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSales"></td>
          </tr>
          <tr>
            <td>Payment Logs</td>
            <td class="text-center"><input type="checkbox" id="ViewPaymentLogs"></td>
            <td class="text-center"><input type="checkbox" id="CreatePaymentLogs"></td>
            <td class="text-center"><input type="checkbox" id="EditPaymentLogs"></td>
            <td class="text-center"><input type="checkbox" id="DeletePaymentLogs"></td>
          </tr>
          <tr>
            <td>Warranty</td>
            <td class="text-center"><input type="checkbox" id="ViewWarranty"></td>
            <td class="text-center"><input type="checkbox" id="CreateWarranty"></td>
            <td class="text-center"><input type="checkbox" id="EditWarranty"></td>
            <td class="text-center"><input type="checkbox" id="DeleteWarranty"></td>
          </tr>
          <tr>
            <td>Serial Numbers</td>
            <td class="text-center"><input type="checkbox" id="ViewSNumber"></td>
            <td class="text-center"><input type="checkbox" id="CreateSNumber"></td>
            <td class="text-center"><input type="checkbox" id="EditSNumber"></td>
            <td class="text-center"><input type="checkbox" id="DeleteSNumber"></td>
          </tr>
          <tr>
            <td>Work Order</td>
            <td class="text-center"><input type="checkbox" id="ViewWorkOrder"></td>
            <td class="text-center"><input type="checkbox" id="CreateWorkOrder"></td>
            <td class="text-center"><input type="checkbox" id="EditWorkOrder"></td>
            <td class="text-center"><input type="checkbox" id="DeleteWorkOrder"></td>
          </tr>
          <tr>
            <td>Products Delivery</td>
            <td class="text-center"><input type="checkbox" id="ViewProductsDelivery"></td>
            <td class="text-center"><input type="checkbox" id="CreateProductsDelivery"></td>
            <td class="text-center"><input type="checkbox" id="EditProductsDelivery"></td>
            <td class="text-center"><input type="checkbox" id="DeleteProductsDelivery"></td>
          </tr>
          <tr>
            <td>Warranty Claims (Repairs)</td>
            <td class="text-center"><input type="checkbox" id="ViewWarrantyClaims"></td>
            <td class="text-center"><input type="checkbox" id="CreateWarrantyClaims"></td>
            <td class="text-center"><input type="checkbox" id="EditWarrantyClaims"></td>
            <td class="text-center"><input type="checkbox" id="DeleteWarrantyClaims"></td>
          </tr>
          <tr>
            <td>Reports</td>
            <td class="text-center"><input type="checkbox" id="ViewReports"></td>
            <td class="text-center"><input type="checkbox" id="CreateReports"></td>
            <td class="text-center"><input type="checkbox" id="EditReports"></td>
            <td class="text-center"><input type="checkbox" id="DeleteReports"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <br>
</form>