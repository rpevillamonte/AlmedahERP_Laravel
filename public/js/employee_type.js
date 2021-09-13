$(document).ready(function () {
    x = $('#employmentTypeTable').DataTable();
});

$("#saveEmpType").click(function () { 
    if(!$("#empTypeName").val()) {
        $("#EmpTypeForm").submit();
    }
});

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

$("#closeEmpTypePrompt").click(function () { 
    $("#empTypeID, #empTypeName").val(null);
    
});

$("#closeET").click(function () { 
    $("#hiddenETID, #editEmpTypeID, #editEmpTypeName").val(null);
});