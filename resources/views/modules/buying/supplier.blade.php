<script src="{{ asset('js/supplier.js') }}"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content: space-between;">
    <div class="container-fluid">
        <h2 class="navbar-brand" style="font-size: 35px;">Supplier</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown li-bom">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                    </ul>
                </li>
                <li class="nav-item li-bom">
                    <button class="btn btn-refresh" style="background-color: #d9dbdb;" type="submit"
                        onclick="loadSupplier()">Refresh</button>
                </li>
                @if (($permissions['Supplier']['create'] ?? null) === 1 || !auth()->user())  
                    <li class="nav-item li-bom">
                        <button type="button" class="btn btn-primary" {{--data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"--}} onclick="openSupplierForm()">New</button>
                    </li>
                @endif  
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="card my-2">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <select name="supplierName" id="supplierName" class="form-control supplier-search" data-live-search="true">
                            <option value="None">All Suppliers</option>
                            @foreach ($suppliers as $s)
                                <option value="{{ $s['supplier_id'] }}">{{ $s['company_name'] }}</option>
                            @endforeach
                        </select>
                        {{--<input type="text" class="form-control" placeholder="Name">--}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Supplier Name">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select name="sgroupSelect" id="sgroupSelect" class="form-control supplier-search" data-live-search="true">
                            <option value="None" selected data-subtext="All Suppliers">Search by Raw Material</option>
                            @foreach ($materials as $rm)
                                <option value="{{ $rm->item_code }}" data-subtext="{{ $rm->item_code }}">{{ $rm->item_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body filter">
            <div class="row">
                <div class="float-left">
                    <button class="btn btn-outline-light btn-sm text-muted shadow-sm">
                        Add Filter
                    </button>
                </div>
                <div class=" ml-auto float-right">
                    <span class="text-muted ">Last Modified On</span>
                    <button class="btn btn-outline-light btn-sm text-muted shadow-sm">
                        <i class="fas fa-arrow-down"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table id="supplierTbl" class="table table-sm table-hover w-100">
                <thead class="border-top border-bottom bg-light">
                    <tr class="text-muted">
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </td>
                        <td>Supplier Name</td>
                        <td>Contact Name</td>
                        <td>Phone Number</td>
                        <td>Supplier Address</td>
                        <td># of Supplier Groups</td>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                </div>
                            </td>
                            <td>
                                @if (($permissions['Supplier']['edit'] ?? null) === 1 || !auth()->user())  
                                    <a href='javascript:onclick=openSupplierInfo({{ $supplier->id }});'>{{ $supplier->company_name }}</a>
                                @else
                                    {{ $supplier->company_name }}
                                @endif  
                            </td>
                            <td class="text-black-50">{{ $supplier->contact_name }}</td>
                            <td class="text-black-50">{{ $supplier->phone_number }}</td>
                            <td class="text-black-50">{{ $supplier->supplier_address }}</td>
                            <td class="text-black-50">{{ $supplier->sg_materials_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>