<script src="{{ asset('js/inventory_backend.js') }}"></script>
<script>
    function clickView(images){
        if(typeof images == 'string')
            images = JSON.parse(images);
            console.log(images)
        $('#exampleImage').modal('show');
        $('.imageContainer').html('');
        for(i of images){
            $('.imageContainer').append(`<img id="image-view" src="storage/`+i+`" style="width:300px;height:300px;">`);
        }
        $('.viewImages').html($('.imagesContainer')[0]);
    }
    function resetForm(){
        $('#material-form')[0].reset();
        $('#img_tmp').attr('src', 'images/thumbnail.png');
        // Clearing out error messages
        $('#material-form .input-error').each(function(){
            this.innerHTML = '';
        });
        // Clearing out error input borders
        $('#material-form input').each(function(){
            this.classList.remove('border-danger');
        });
    }
    function errorThrown(errors){
        if(errors.total_amount){
            $('#create_total_amount').addClass('border-danger');
            $('#create-qty-error').html(errors.total_amount[0]);
        }if(errors.material_name){
            $('#create_material_name').addClass('border-danger');
            $('#create-name-error').html(errors.material_name[0]);
        }if(errors.unit_price){
            $('#create_unit_price').addClass('border-danger');
            $('#create-price-error').html(errors.unit_price[0]);
        }
    }
</script>
<div class="container rounded">
    <div class="row d-flex justify-content-center">

        <div class="col-sm p-4 bg-light">
            <h4 class="font-weight-bold text-black">Inventory List</h4>
            <div id="alert-message">
            </div>
            @if (($permissions['Inventory']['create'] ?? null) === 1 || !auth()->user())
                <div class="row pb-2">
                    <div class="col-12 text-right">
                        <p><button type="button" class="btn btn-outline-primary btn-sm"
                                onclick="$('#create-material-form').modal('show'); resetForm();"><i class="fas fa-plus"
                                    aria-hidden="true"></i> Add New</button></p>
                    </div>
                </div>
            @endif


            <table id="inventoryTable" class="table table-striped table-bordered hover" style="width:100%">
                <thead>
                    <tr>
                        {{-- <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </td> --}}
                        <td>Item Code</td>
                        <td>Item Name</td>
                        <td>Category</td>
                        <td>Consumable</td>
                        <td>Stock Qty.</td>
                        <td>RM Status</td>
                        <td>View</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($raw_materials as $row)
                    <tr id="row-{{ $row->id }}">
                        {{-- <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td> --}}
                            <td>{{ $row->item_code }}</td>
                            <td>{{ $row->item_name }}</td>
                            <td>{{ $row->category->category_title }}</td>
                            <td><div class="form-check">
                                <input type="checkbox" class="form-check-input" {{ $row->consumable ? "checked" : null }} disabled>
                            </div></td>
                            <td id="item-qty-{{ $row->id }}" class="text-black-50">{{ $row->stock_quantity }}</td>
                            <td class="text-black-50">{{ $row->rm_status }}</td>

                            <td class="text-black-50 text-center"><a href='#' onclick="clickView(JSON.stringify({{ $row->item_image }}))" class="row-img-view-btn" id="clickViewTagInv{{ $row->id }}">View</a></td>

                            <td class="">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="align-content-center dropdown-menu p-0" style="background: 0; min-width:125px;" role="menu">
                                        @if (($permissions['Inventory']['edit'] ?? null) === 1 || !auth()->user())
                                            <li><button data-id="{{ $row->id }}" data-toggle="modal"
                                                data-target="#update-item-form"
                                                class="edit-btn btn btn-warning btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit"><i class="fa fa-edit"></i> Edit</button>
                                            </li>
                                        @endif
                                        @if (($permissions['Inventory']['delete'] ?? null) === 1 || !auth()->user())
                                            <li><button data-id="{{ $row->id }}"
                                                class="delete-btn btn btn-danger btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <script>
                $(document).ready(function() {
                    // Added an if statement here in case it becomes necessary to turn
                    // the datatable into a component and selectively render it based on
                    // whether there are entries or not
                    if ($('#inventoryTable').length) {
                        $('#inventoryTable').dataTable({
                            columnDefs: [{
                                orderable: false,
                                targets: 0
                            }],
                            order: [
                                [1, 'asc']
                            ]
                        });
                    }
                });

            </script>
        </div>
    </div>
</div>
<!-- IMAGE PART MODAL -->
<div class="modal fade" id="exampleImage" tabindex="-1" role="dialog" aria-labelledby="exampleImageLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sample Picture</h4>
                <button type="button" class="close" onclick="$('#exampleImage').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="viewImages modal-body m-0 p-0">
                <div class="imageContainer">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#exampleImage').modal('hide')">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Material Modal-->
<div class="modal fade" id="update-material-form-modal" tabindex="-1" aria-labelledby="updateModalForm"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-inline">Edit Material</h5>
                <button type="button" class="close" onclick="$('#update-material-form-modal').modal('hide')"
                    aria-label="close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update-material-form" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    {{-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Material Code</label>
                                <input class="form-control" type="text" id="material_code" name="material_code"
                                    placeholder="Ex. MT181204" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Material Name</label>
                                <input class="form-control" type="text" id="material_name" name="material_name"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Material Categories</label>
                                <select class="form-control" id="material_category" name="material_category"
                                    onchange="openCategory(value)" required>
                                    <option value="" selected disabled hidden>
                                        Select an Option
                                    </option>
                                    @foreach ($categories as $row)
                                        <option value="{{ $row['id'] }}" name="category">
                                            {{ $row['category_title'] }}</option>
                                    @endforeach
                                    <option id="newCategoryButton">
                                        + Add new Category
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group p-2">
                        <label for="">Image</label>
                        <img id="img_tmp_edit" src="../images/thumbnail.png" style="width:100%;">
                        <input class="form-control" type="file" accept="image/*" name="material_image[]" onchange="readURL2(this);" multiple>
                    </div>

                    <script>
                        function readURL2(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#img_tmp_edit')
                                        .attr('src', e.target.result);
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>

                    <div class="form-group">
                        <label for="">Unit Price</label>
                        <input class="form-control" type="text" id="unit_price" name="unit_price" required
                            placeholder="Ex. 100">
                    </div>


                    <div class="form-group">
                        <label for="">Total Quantity</label>
                        <input class="form-control" type="text" id="total_amount" name="total_amount" required
                            placeholder="Ex. 500">
                    </div>


                    <div class="form-group">
                        <label for="">RM Status</label>
                        <select class="form-control" id="rm_status" name="rm_status" required>
                            <option value="" selected disabled hidden>
                                Select an Option
                            </option>
                            <option value="To Purchase">To Purchase</option>
                            <option value="Available">Available</option>
                        </select>
                    </div>

                    <div class="form-group" id="attribute_group">
                        <label>Attributes</label>
                        <select id="attribute_inventory_variants" class="selectpicker2 form-control" name="attribute_inventory_variants" data-container="body" data-live-search="true" title="Select attribute" data-hide-disabled="true">
                            <option value="none" selected disabled hidden>
                                Select an Option
                            </option>
                            <option value="New">
                                &#43; Create a new Attribute
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Value</label>
                        <select id="value_inventory_variants" class="selectpicker2 form-control" name="value_inventory_variants" data-container="body" data-live-search="true" title="Select attribute" data-hide-disabled="true">
                            <option value="none" selected disabled hidden>
                                Select an Option
                            </option>
                            <option value="New">
                                &#43; Create a new Attribute
                            </option>
                        </select>
                    </div>
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="$('#update-material-form-modal').modal('hide')">Close</button>
                        <button id="update-material-form-modal-btn" type="submit" class="btn btn-primary">Save</button>
                    </div> --}}
                    <!-- DIVIDER---->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Material Code</label>
                                <input class="form-control" id="material_code" type="text" name="material_code" placeholder="Ex. MT181204" required
                                    >
                                <span id="update-code-error" class="input-error text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Material Name</label>
                                <input class="form-control" id="material_name" type="text" name="material_name" required>
                                <span id="update-name-error" class="input-error text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Material Categories</label>
                                <select class="form-control" id="material_category" name="material_category" onchange="openCategory(value)"
                                    required>
                                    <option value="" selected disabled hidden>
                                        Select an Option
                                    </option>
                                    @foreach ($categories as $row)
                                        <option value="{{ $row['id'] }}" name="category">
                                            {{ $row['category_title'] }}</option>
                                    @endforeach
                                    <option id="newCategoryButton">
                                       + Add new Category
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group p-2">
                        <label for="">Image</label>
                        <img id="img_tmp" src="../images/thumbnail.png" style="width:100%;">
                        <input class="form-control" type="file" accept="image/*" name="material_image" onchange="readURL3(this);"
                            required>
                    </div> --}}

                    <div class="form-group pb-2 m-0">
                        <label for="">Image</label>
                        <img id="img_tmp_edit" src="../images/thumbnail.png" style="width:100%;">
                        <input class="form-control" type="file" accept="image/*" name="material_image[]" onchange="readURL2(this);" multiple>
                    </div>

                    <script>
                        function readURL2(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#img_tmp_edit')
                                        .attr('src', e.target.result)
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }

                    </script>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Quantity</label>
                            <input class="form-control" type="number" id="total_amount" name="rm_quantity" required placeholder="Ex. 500">
                            <span id="create-qty-error" class="input-error text-danger"></span>
                        </div>

                        <div class="form-group col-6">
                        <label for="">Unit of Measurement</label>
                        <select class="form-control selectpicker" data-live-search="true" name="uom_id" id="edit_uom_id">
                            @foreach ($units as $unit)
                                <option value="{{ $unit->uom_id }}" data-subtext="({{ $unit->conversion_factor }} nos.)" data-cf="{{ $unit->conversion_factor }}">{{ $unit->item_uom }}</option>   
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group col-6">
                          <label for="">Reorder Level</label>
                          <input type="text" value="0" id="edit_reorder_level" name="edit_reorder_level" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group col-6">
                          <label for="">Reorder Quantity</label>
                          <input type="text" value="0" id="edit_reorder_quantity" name= "edit_reorder_quantity" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group col-6">
                          <label for="">Conversion Factor</label>
                          <input type="text" value="0" readonly id="edit_conversion_factor" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group col-6">
                          <label for="">Stock Quantity</label>
                          <input type="text" value="0" readonly id="edit_stock_quantity" class="form-control" placeholder="" aria-describedby="helpId" name="stock_quantity">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">RM Status</label>
                        <select class="form-control" id="rm_status" name="rm_status" required>
                            <option value="" selected disabled hidden>
                                Select an Option
                            </option>
                            <option value="To Purchase">To Purchase</option>
                            <option value="Available">Available</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-group col-12">
                            <label for="" class="mr-3">Consumable</label>
                            <input type="checkbox" name="edit_consumable" id="edit_consumable" style="transform: scale(1.4);">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="$('#update-material-form-modal').modal('hide')">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add Material Modal -->
<div class="modal fade" id="create-material-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Material</h5>
                <button type="button" class="close" onclick="$('#create-material-form').modal('hide')"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="material-form" method="post" enctype="multipart/form-data" action="/create-material">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Material Code</label>
                                <input class="form-control" id="create_material_code" type="text" name="material_code" placeholder="Ex. MT181204"
                                    required>
                                <span id="create-code-error" class="input-error text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Material Name</label>
                                <input class="form-control" id="create_material_name" type="text" name="material_name" required>
                                <span id="create-name-error" class="input-error text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Material Categories</label>
                                <select class="form-control" id="material_category1" name="material_category" onchange="openCategory(value)"
                                    required>
                                    <option value="" selected disabled hidden>
                                        Select an Option
                                    </option>
                                    @foreach ($categories as $row)
                                        <option value="{{ $row['id'] }}" name="category">
                                            {{ $row['category_title'] }}</option>
                                    @endforeach
                                    <option id="newCategoryButton">
                                       + Add new Category
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group p-2">
                        <label for="">Image</label>
                        <img id="img_tmp" src="../images/thumbnail.png" style="width:100%;">
                        <input class="form-control" type="file" accept="image/*" name="material_image" onchange="readURL3(this);"
                            required>
                    </div> --}}

                    <div class="form-group pb-2 m-0">
                        <label for="">Image</label>
                        <img id="img_tmp" src="../images/thumbnail.png" style="width:100%;">
                        <input class="form-control" type="file" accept="image/*" name="material_image[]" onchange="readURL3(this);" required multiple>
                    </div>

                    <script>
                        function readURL3(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#img_tmp')
                                        .attr('src', e.target.result)
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }

                    </script>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Quantity</label>
                            <input class="form-control" type="number" id="create_total_amount" name="rm_quantity" required placeholder="Ex. 500">
                            <span id="create-qty-error" class="input-error text-danger"></span>
                        </div>

                        <div class="form-group col-6">
                        <label for="">Unit of Measurement</label>
                        <select class="form-control selectpicker" data-live-search="true" name="uom_id" id="uom_id">
                            @foreach ($units as $unit)
                                <option value="{{ $unit->uom_id }}" data-subtext="({{ $unit->conversion_factor }} nos.)" data-cf="{{ $unit->conversion_factor }}">{{ $unit->item_uom }}</option>   
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group col-6">
                          <label for="">Reorder Level</label>
                          <input type="text" value="0" id="reorder_level" name="reorder_level" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group col-6">
                          <label for="">Reorder Quantity</label>
                          <input type="text" value="0" id="reorder_quantity" name="reorder_quantity" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group col-6">
                          <label for="">Conversion Factor</label>
                          <input type="text" value="0" readonly id="conversion_factor" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group col-6">
                          <label for="">Stock Quantity</label>
                          <input type="text" value="0" readonly id="stock_quantity" class="form-control" placeholder="" aria-describedby="helpId" name="stock_quantity">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">RM Status</label>
                        <select class="form-control" name="rm_status" required>
                            <option value="" selected disabled hidden>
                                Select an Option
                            </option>
                            <option value="To Purchase">To Purchase</option>
                            <option value="Available">Available</option>
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="" class="mr-3">Consumable</label>
                            <input type="checkbox" name="consumable" id="consumable" style="transform: scale(1.4);">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="$('#create-material-form').modal('hide')">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ADD CATEGORY MODAL -->
<div class="modal fade" id="add-Category-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                <button type="button" class="close" onclick="closeCategory()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="category-form" method="post" enctype="multipart/form-data" action="/create-categories"
                    onsubmit="return false">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Category Code</label>
                                <input class="form-control" type="text" name="category_title"
                                    placeholder="Ex. Stone, Gold" required>
                                @error('category_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Category Description</label>
                                <textarea class="form-control" type="text" name="category_description" required
                                    placeholder="Ex. Gold Category"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button onclick="closeCategory()" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button id="category-form-btn" class="btn btn-primary" data-dismiss="modal">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $('#create-material-form').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#update-material-form-modal').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#add-Category-form').modal({
        backdrop: 'static',
        keyboard: false
    });
</script>
<script>
    $(document).ready(function(e) {
        // Since we're dynamically loading more .edit-btn elements
        // we need to bind the function to body clicks instead of .edit-btn clicks
        // since functions bound to .edit-btn will only be bound to the elements
        // that loaded first

        //When clicking edit button
        $('body').on('click', '.edit-btn', function(e) {
            console.log('{{storage_path("fladksfd")}}')
            e.preventDefault();
            var element = this;
            var id = element.dataset.id;
            // Adding the ID to a variable accessible to the ajax call
            sessionStorage.setItem('material-edit-id', id);
            var form = $('#update-material-form');
            var modal = $('#update-material-form-modal');
            form.attr('action', '/update-material/' + id);
            modal.modal('show');

            // Finding the element being edited and returning the details
            $.get('/inventory/' + sessionStorage.getItem('material-edit-id'), function(data, status) {
                console.log(data);
                data = data.material;
                let images = JSON.parse(data.item_image);
                $(form).find('#material_name').val(data.item_name);
                $(form).find('#material_code').val(data.item_code);
                $(form).find('#material_category').val(data.category_id);
                $(form).find('#img_tmp_edit').attr('src', 'storage/' + images[0]);
                sessionStorage.setItem('old_image', 'storage/' + images[0]);
                $(form).find('#rm_status').val(data.rm_status);
                $(form).find('#total_amount').val(data.rm_quantity);
                $(form).find('#total_amount').focusout();
                $(form).find('#edit_uom_id').val(data.uom_id);
                $(form).find('#edit_uom_id').change();
                $(form).find('#edit_consumable').prop("checked",data.consumable == 1 ? true : false);
                $(form).find('#edit_reorder_level').val(data.reorder_level);
                $(form).find('#edit_reorder_quantity').val(data.reorder_qty);
                $(form).find('#edit_consumable').change( function (){
                    $(this).val( $(this).is(':checked') ? 1 : 0 );
                });
                
            });

        });
        // When clicking delete button
        $('body').on('click', '.delete-btn', function(e) {
            var id = this.dataset.id;
            var row = $(this).parents('tr');
            if (confirm("Are you sure?")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'delete-material/' + id,
                    data: null,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == "success") {
                            $(document).ready(function() {
                                sessionStorage.setItem("status", "success");
                                // Removing a row from the data table
                                var table = $('#inventoryTable');
                                table.DataTable()
                                    .row(row)
                                    .remove()
                                    .draw();
                            });
                        } else {
                            //alert(data.message);
                        }
                    },
                    error: function(data) {
                        //console.log("error");
                        //console.log(data);
                        $(document).ready(function() {
                            sessionStorage.setItem("status", "error");
                            $('#divMain').load('/inventory');
                        });
                    }
                });
            }
            return false;
        });


        // Update form function
        // When the form is submitted (save button is pressed and all the required fields are filled in)
        // it deletes the row of the element being edited and adds a row with the updated values
        $('#update-material-form').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            formData.append("consumable", $('#edit_consumable').val());
            $.ajax({
                type: 'POST',
                url: $('#update-material-form').attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == "success") {
                        // If a new image was set, use it as the value. Otherwise, use the old image
                        var image = (data.image) ? data.image : sessionStorage.getItem(
                            'old_image');
                        sessionStorage.removeItem('old_image');
                        // Hide the modal create form
                        $('#update-material-form-modal').modal('hide');
                        // Reset the preview image
                        $('#img_tmp_edit').attr('src', '../images/thumbnail.png');
                        // Reset the form fields
                        $('#update-material-form')[0].reset();
                        $(document).ready(function() {
                            sessionStorage.setItem("status", "success");
                            // Removing the old row
                            $('#inventoryTable').DataTable()
                                .row($('#row-' + sessionStorage.getItem(
                                    'material-edit-id')))
                                .remove()
                                .draw();
                            // Adding the updated row
                            $('#inventoryTable').DataTable()
                                .row
                                .add([
                                    formData.get('material_code'),
                                    formData.get('material_name'),
                                    data.category_title,
                                    formData.get('consumable') == 1 ?
                                    '<input type="checkbox" class="d-flex flex-row" disabled checked>' :
                                    '<input type="checkbox" class="d-flex flex-row" disabled>',
                                    '<span class="text-black-50">' + formData
                                    .get('stock_quantity') + '</span>',
                                    '<span class="text-black-50">' + formData
                                    .get('rm_status') + '</span>',
                                    `<span class='text-black-50 text-center w-100' style='display: inline-block'> 
                                    <a href='#' onclick='clickView(${JSON.stringify(data.material.item_image)})' id='clickViewTagInv${data.material.id}'>View</a> 
                                    </span>`,
                                `<div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="align-content-center dropdown-menu p-0" style="background: 0; min-width:125px;" role="menu">

                                        <li><button data-id="${data.id}" data-toggle="modal"
                                            data-target="#update-item-form"
                                            class="edit-btn btn btn-warning btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit"><i class="fa fa-edit"></i> Edit</button>
                                        </li>
                                        
                                        <li><button data-id="${data.id}"
                                            class="delete-btn btn btn-danger btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                        </li>
                                    
                                    </ul>
                                </div>`
                                ])
                                .node()
                                .id = 'row-' + data.id;
                            $('#inventoryTable').DataTable().draw();
                            console.log('this is the data.image '+data.image);
                            var id = data.id;
                            $('#clickViewTagInv').attr('id', "clickViewTagInv"+id);
                            images = [];
                            for(i of data.image){
                                images.push(i);
                            }
                            $('#clickViewTagInv'+id).attr('onclick', 'clickView('+JSON.stringify(images)+')');

                            if($('#materials-picker').length){
                                updatedMaterial(data.id, 
                                    formData.get('total_amount'),
                                    formData.get('material_name')
                                    );
                            }
                        });
                    }
                },
                error: function(data) {
                    let errors = data.responseJSON.errors;
                    // If validation failed, show the message and make the
                    // input have a red border
                    errorThrown(errors);
                }
            });
            return false;
        })

        $('#material-form').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            //Gets material category id idk why its not getting inside the form data
            $.ajax({
                type: 'POST',
                url: $('#material-form').attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                // "Data" is a JSON that contains the status of the save, the ID of the new record
                // and the path of the uploaded image
                success: function(data) {
                    //console.log("success");
                    if (data.status == "success") {
                        if(data.already_exists){
                            alert('Material already exists');
                            $(`#item-qty-${data.id}`).html(data.new_amount);
                            $('#create-material-form').modal('hide');
                            return;
                        }
                        // Hide the modal create form
                        $('#create-material-form').modal('hide');
                        // Reset the form fields
                        $('#material-form')[0].reset();
                        // Remove the preview image
                        $('#image-view').attr('src', 'images/thumbnail.png');
                        $(document).ready(function() {
                            sessionStorage.setItem("status", "success");
                            // TODO: Dynamically adding data to the DataTable; consider transforming the entire TR data into a
                            // component instead to prevent having to write HTML here in the future

                            // NOTE: This is exactly the same as the markup for the <tr> tags above in string form.
                            // Due to not being able to import templates in JavaScript, this is currently the best solution
                            $('#inventoryTable').DataTable()
                                .row
                                .add([
                                    formData.get('material_code'),
                                    formData.get('material_name'),
                                    data.category_title,
                                    data.material.consumable === 1 ? 
                                    '<input type="checkbox" class="d-flex flex-row" disabled checked>' :
                                    '<input type="checkbox" class="d-flex flex-row" disabled>',
                                    '<span class="text-black-50">' + formData
                                    .get('stock_quantity') + '</span>',
                                    '<span class="text-black-50">' + formData
                                    .get('rm_status') + '</span>',
                                    `<span class='text-black-50 text-center w-100' style='display: inline-block'> 
                                        <a href='#' onclick='clickView(${JSON.stringify(data.material.item_image)})' id='clickViewTagInv${data.material.id}'>View</a>" 
                                    </span>`,
                                `<div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="align-content-center dropdown-menu p-0" style="background: 0; min-width:125px;" role="menu">

                                        <li><button data-id="${data.id}" data-toggle="modal"
                                            data-target="#update-item-form"
                                            class="edit-btn btn btn-warning btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit"><i class="fa fa-edit"></i> Edit</button>
                                        </li>
                                        
                                        <li><button data-id="${data.id}"
                                            class="delete-btn btn btn-danger btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                        </li>
                                    
                                    </ul>
                                </div>`
                                ])
                                .node()
                                .id = 'row-' + data.id;

                            $('#inventoryTable').DataTable().draw();

                            var id = data.id;
                            $('#clickViewTagInv').attr('id', "clickViewTagInv"+id);
                            images = [];
                            for(i of data.image){
                                images.push(i);
                            }
                            console.log('result of for loop '+images);
                            $('#clickViewTagInv'+id).attr('onclick', 'clickView('+JSON.stringify(images)+')');

                            // If the materials picker exists, append the new option
                            // Note: must find a better way to let item.blade.php know that
                            //       a new item has been added to prevent having mark-ups mixed
                            //       together
                            if($('#materials-picker').length){
                                $('#materials').append(
                                    "<option value=\""+data.id+"\">"+formData.get('material_name')+"</option>"
                                );
                                $('#materials').selectpicker('refresh');
                                $('#materials-picker').append(
                                    "<input id='raw_"+data.id+"' type='text' value='"+formData.get('total_amount')+"' hidden>"
                                );
                            }
                        });
                    }else{
                        console.log('error');
                        console.log(data);
                    }
                },
                error: function(data) {
                    let errors = data.responseJSON.errors;
                    // If validation failed, show the message and make the
                    // input have a red border
                    errorThrown(errors);
                }
            });
        });

        //Add Categories AJAX
        $('#category-form').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $('#category-form').attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                // "Data" is a JSON that contains the status of the save, the ID of the new record
                // and the path of the uploaded image
                success: function(data) {
                    // Hide the modal create form
                    $('#add-Category-form').modal('hide');
                    
                    // Add it to the categories

                    $('#material_category').prepend($('<option>', {
                        value: data.id,
                        text: data.category_title
                    }));

                    $('#material_category1').prepend($('<option>', {
                        value: data.id,
                        text: data.category_title
                    }));

                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });
        });

        // /*Update Record AJAX*/
        // $('#update-product-form-btn').on('click', (function(e) {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     e.preventDefault();
        //     var formData = new FormData($('#edit-product-form')[0]);
        //     $.ajax({
        //         type: 'POST',
        //         url: $('#edit-product-form').attr('action'),
        //         data: formData,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             if (data.status == "success") {
        //                 $(document).ready(function() {
        //                     sessionStorage.setItem("status", "success");
        //                     $('#divMain').load('/item');
        //                 });
        //             } else {
        //                 $(document).ready(function() {
        //                     sessionStorage.setItem("status", "error");
        //                     $('#divMain').load('/item');
        //                 });
        //             }

        //         },
        //         error: function(data) {
        //             console.log("error");
        //             console.log(data);
        //             $(document).ready(function() {
        //                 sessionStorage.setItem("status", "error");
        //                 $('#divMain').load('/item');
        //             });
        //         }
        //     });
        // }));
        /*Delete Product*/
    });

</script>

<script>
    function openCategory(value) {
        if (value == "+ Add new Category") {
            $('#create-material-form').modal('hide');
            $('#add-Category-form').modal('show');
        }
    }

    function closeCategory() {
        $('#add-Category-form').modal('hide');
    }

</script>