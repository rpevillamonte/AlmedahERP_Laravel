var ET_SUCCESS = "#et_success_message";
var ET_FAIL = "#et_alert_message";

$(document).ready(function () {
    x = $('#employmentTypeTable').DataTable();
});

$("#saveEmpType").click(function () { 
    var message = '', use_alert = '';
    if($("#empTypeName").val()) {
        $("#EmpTypeForm").submit();
        message = 'Successfully created an employment type.';
        use_alert = ET_SUCCESS;
    }
    else {
        message = 'Failed to create an employment type.';
        use_alert = ET_FAIL;
    }
    slideAlert(message, use_alert);
});

function etRefresh() {
    $("#contentEmploymentType").load('/employmenttype');
}

$("#EmpTypeForm").submit(function (e) { 
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });

    var formData = new FormData(this);

    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log('submitted');
            etRefresh();
        }
    });

    e.preventDefault();
    return false;
});

$(".emp-type").click(function () { 

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });

    var id = $(this).attr('value');

    $.ajax({
        type: 'GET',
        url: `/employmenttype/${id}`,
        data: id,
        contentType: false,
        processData: false,
        success: function (response) {
            var et = response.emp_type;
            $("#hiddenETID").val(et.id);
            $("#editEmpTypeID").val(et.employment_id);
            $("#editEmpTypeName").val(et.employment_type);
        }
    });
    
});

function clearETForm() {
    $("#empTypeID, #empTypeName").val(null);
}

$("#closeEmpTypePrompt").click(function () { 
    clearETForm();
});

$("#closeET").click(function () { 
    $("#hiddenETID, #editEmpTypeID, #editEmpTypeName").val(null);
});

$("#etRefresh").click(function (e) { 
    etRefresh();

    e.preventDefault();
    
});

$("#editEmpType").click(function () { 
    var msg = '', et_alert = '';
    if($('#editEmpTypeName').val()) {
        $("#editEmpTypeForm").submit();
        msg = 'Edited employment type data.';
        et_alert = ET_SUCCESS;
    }
    else {
        flag = false;
        msg = 'Failed to edit employment type data.';
        et_alert = ET_FAIL;
    }
    slideAlert(msg, et_alert);
});

$("#deleteET").click(function (e) { 
    slideAlert('Deleted an employment type.', ET_SUCCESS);
    $("#deleteEmpType").submit();
});

$("#deleteEmpType").submit(function (e) { 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });

    var id = $("#hiddenETID").val();

    $.ajax({
        type: 'DELETE',
        url: `/employmenttype/${id}`,
        data: id,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log('edited');
            etRefresh();
        }
    });

    e.preventDefault();
    return false;
    
});

$("#editEmpTypeForm").submit(function (e) { 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });

    var id = $("#hiddenETID").val();
    var formData = new FormData(this);

    $.ajax({
        type: $(this).attr('method'),
        url: `/employmenttype/${id}`,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log('edited');
            etRefresh();
        }
    });

    e.preventDefault();
    return false;
});