var permissions = {};
var role_strings = ['Customers', 'Employees', 'Suppliers', 'Supplier_Group', 'Inventory', 'Components', 'Products',
                    'Stations', 'Stock_Moves', 'Stock_Traceability', 'Material_Request', 'Request_for_Quotation',
                    'Supplier_Quotation', 'Email_Suppliers', 'Purchase_Order', 'Purchase_Receipt', 'Purchase_Invoice',
                    'Pending_Orders', 'Machine_Manual', 'Work_Center', 'Operations', 'Routings', 'BOM', 'Job_Scheduling',
                    'Sales', 'Payment_Logs', 'Warranty', 'Serial_Numbers', 'Work_Order', 'Delivery', 'Warranty', 'Reports'];

var ROLE_SUCCESS = "#role_success";
var ROLE_FAIL = "#role_fail";
var ROLE_FORM_NOTIF = "#roleNotif";

$(document).ready(function () {
    $('#UserRoleTable').DataTable();
    for(let i=0; i<role_strings.length; i++) {
        var key = role_strings[i];
        permissions[key] = {'view' : 0, 'create' : 0, 'edit' : 0, 'delete' : 0};
    }
});

$(
    `.user-view, .user-create, .user-edit, .user-delete,
    .edit-user-view, .edit-user-create, .edit-user-edit, .edit-user-delete`
).change(function () { 
    var elem_class = $(this).attr('class');
    var needle1 = 'edit-user-';
    var needle2 = 'roleEdit';
    if(elem_class.indexOf(needle1) === -1) {
        needle1 = needle1.replace('edit-', '');
        needle2 = needle2.replace('Edit', '');
    }
    var elem_func = elem_class.replace(needle1, '');
    var tr = $(this).parent('td').parent('tr');
    var tr_id = tr.attr('id');
    var key = tr_id.replace(needle2, '');
    var value = $(this).prop('checked') == true ? 1 : 0;
    permissions[key][elem_func] = value;
});

$(".role-entity").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });
    var id = $(this).attr('value');
    $.ajax({
        type: "GET",
        url: `/roles/${id}`,
        data: id,
        success: function (response) {
            var role = response.role;
            $("#roleEditName").val(role.role_name);
            $("#hiddenRoleID").val(role.id);
            permissions = role.permissions;
            for (let key in permissions) {
                var tr = $(`#roleEdit${key}`);
                var role_prop = permissions[key];
                tr.find('.edit-user-view').prop('checked', getCheckStatus(role_prop.view));
                tr.find('.edit-user-create').prop('checked', getCheckStatus(role_prop.create));
                tr.find('.edit-user-edit').prop('checked', getCheckStatus(role_prop.edit));
                tr.find('.edit-user-delete').prop('checked', getCheckStatus(role_prop.delete));
            }
        }
    });
});

function getCheckStatus(value) {
    return (value === 1) ? true : false; 
}

$("#closeRolePrompt, #closeRoleEditPrompt").click(function () { 
    resetRoleForm();
});

function resetRoleForm() {
    $('.user-view, .user-create, .user-edit, .user-delete').prop('checked', false);
    $('.edit-user-view, .edit-user-create, .edit-user-edit, .edit-user-delete').prop('checked', false);
    $("#roleName").val(null);
    $("#roleEditName").val(null);
    for(var key in permissions) {
        permissions[key]['view'] = 0;
        permissions[key]['create'] = 0;
        permissions[key]['edit'] = 0;
        permissions[key]['delete'] = 0;
    }
    $("#roleNotif").html(null);
}

$("#saveRole").click(function () { 
    var message  = '', role_alert = '';
    if($("input[name='role-check']:checked").length > 0) {
        $("#roleForm").submit();
        message = 'Role successfully developed.';
        role_alert = ROLE_SUCCESS;
    } else {
        if(!$("#roleName").val()) {
            message = 'No name provided for this role.';
        } else {
            message = 'This role has no privileges.';
        }
        role_alert = ROLE_FORM_NOTIF;
    }
    slideAlert(message, role_alert);
});

$("#updateRole").click(function () { 
    var message  = '', role_alert = '';
    if($("input[name='edit-role-check']:checked").length > 0) {
        $("#roleEditForm").submit();
        message = 'Successfully edited role.';
        role_alert = ROLE_SUCCESS;
    } else {
        message = 'Failed to edit role. No privileges have been granted.';
        role_alert = ROLE_FAIL;
    }
    slideAlert(message, role_alert);
});

$("#URRefresh").click(function () { 
    roleRefresh();
});

function roleRefresh() {
    $("#contentRoles").load('/roles');
}

$("#roleForm").submit(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });
    var formData = new FormData(this);
    formData.append('permissions', JSON.stringify(permissions));
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            resetRoleForm();
            $("#newRoleFormPrompt").remove();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            roleRefresh();
        }
    });
    
    e.preventDefault();
    return false;
});

$("#deleteRole").click(function () {
    $("#deleteRoleForm").submit();
    slideAlert('Deleted a role.', ROLE_SUCCESS);
});

$("#deleteRoleForm").submit(function (e) { 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });
    var id = $("#hiddenRoleID").val();
    $.ajax({
        type: "DELETE",
        url: `/roles/${id}`,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log('deleted');
            roleRefresh();
        },
    });
    e.preventDefault();
    return false;
    
});

$("#roleEditForm").submit(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });
    var formData = new FormData(this);
    var id = $("#hiddenRoleID").val();
    formData.append('permissions', JSON.stringify(permissions));
    $.ajax({
        type: $(this).attr('method'),
        url: `/roles/${id}`,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            resetRoleForm();
        }
    });
    
    e.preventDefault();
    return false;
});
