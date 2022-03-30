<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Accounts Receivable</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown li-bom">
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                    </ul>
                </li>
                <li class="nav-item li-bom">
                    {{-- Still can't use loadInto function because of a non-exisisting controller.
                        Feel free to delete this comment 🙂--}}
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" type="submit">Refresh</button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table id="accounts_receivable_table" class="table table-striped table-bordered hover" style="width:100%">
    <thead>
        <tr>
            <th>Posting Date</th>
            <th>Customer</th>
            <th>Voucher Type</th>
            <th>Voucher No.</th>
            <th>Due Date</th>
            <th>Invoice Amount</th>
            <th>Paid Amount</th>
            <th>Outstanding balance</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Posting Date</td>
            <td>
                <a tabindex="0" data-html="true" data-toggle="popover" title="<x-customer_hover>
                                <x-slot name='customer_name'>
                                    Customer 1
                                </x-slot>
                                <x-slot name='branch'>
                                    Branch
                                </x-slot>
                                <x-slot name='contact_number'>
                                    09123456789
                                </x-slot>
                                <x-slot name='address'>
                                    Long Address
                                </x-slot>
                                <x-slot name='email_address'>
                                    customer1@adress.com
                                </x-slot>
                                <x-slot name='company_name'>
                                    Company Name
                                </x-slot>
                                </x-customer_hover>" style="cursor: pointer;">
                    <b>
                        Customer 1
                    </b>
                </a>
            </td>
            <td>Voucher Type Value</td>
            <td>Voucher No. Value</td>
            <td>Due Date Value</td>
            <td>Invoice Amount Value</td>
            <td>Paid Amount Value</td>
            <td>Outstanding balance Value</td>
            <td>Age Value</td>
        </tr>
        <tr>
            <td>Posting Date</td>
            <td>
                <a tabindex="0" data-html="true" data-toggle="popover" title="<x-customer_hover>
                                <x-slot name='image'>
                                    <img src='https://via.placeholder.com/80' class='rounded-circle img-fluid p-0 w-50'>
                                </x-slot>
                                <x-slot name='customer_name'>
                                    Customer 2
                                </x-slot>
                                <x-slot name='branch'>
                                    Branch
                                </x-slot>
                                <x-slot name='contact_number'>
                                    09123456789
                                </x-slot>
                                <x-slot name='address'>
                                    Long Address
                                </x-slot>
                                <x-slot name='email_address'>
                                    customer2@adress.com
                                </x-slot>
                                <x-slot name='company_name'>
                                    Company Name
                                </x-slot>
                                </x-customer_hover>" style="cursor: pointer;">
                    <b>
                        Customer 2
                    </b>
                </a>
            </td>
            <td>Voucher Type Value</td>
            <td>Voucher No. Value</td>
            <td>Due Date Value</td>
            <td>Invoice Amount Value</td>
            <td>Paid Amount Value</td>
            <td>Outstanding balance Value</td>
            <td>Age Value</td>
        </tr>
        <tr>
            <td>Posting Date</td>
            <td>
                <a tabindex="0" data-html="true" data-toggle="popover" title="<x-customer_hover>
                                <x-slot name='image'>
                                    <img src='https://via.placeholder.com/80' class='rounded-circle img-fluid p-0 w-50'>
                                </x-slot>
                                <x-slot name='customer_name'>
                                    Customer Name 3
                                </x-slot>
                                <x-slot name='branch'>
                                    Branch
                                </x-slot>
                                <x-slot name='contact_number'>
                                    09123456789
                                </x-slot>
                                <x-slot name='address'>
                                    Long Address
                                </x-slot>
                                <x-slot name='email_address'>
                                    customer3@adress.com
                                </x-slot>
                                <x-slot name='company_name'>
                                    Company Name
                                </x-slot>
                                </x-customer_hover>" style="cursor: pointer;">
                    <b>
                        Customer 3
                    </b>
                </a>
            </td>
            <td>Voucher Type Value</td>
            <td>Voucher No. Value</td>
            <td>Due Date Value</td>
            <td>Invoice Amount Value</td>
            <td>Paid Amount Value</td>
            <td>Outstanding balance Value</td>
            <td>Age Value</td>
        </tr>
    </tbody>
</table>

<script>
    $("#accounts_receivable_table").dataTable();
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            html: true,
            trigger: "hover"
        });
    });
</script>
