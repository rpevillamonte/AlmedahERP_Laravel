<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" >
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">General Ledger</h2>
    </div>
</nav>
<br>
<div class="container">
    <table id="general-ledger" class=" table border-bottom" style="width:100%;">
        <thead class="border-top border-bottom bg-light">
            <tr>
                <th>Posting Date</th>
                <th>Account</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
                <th>Voucher Type</th>
                <th>Voucher No.</th>
                <th>Against Account</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#general-ledger').DataTable();
    } );
</script>