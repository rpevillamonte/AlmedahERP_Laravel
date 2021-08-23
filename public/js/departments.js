$(document).ready(function () {
    x = $('#departmentsTable').DataTable();
    $(".dept-select").selectpicker();
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
            
        }
    });
    e.preventDefault();
    return false;
});

$("#saveNewDept").click(function () { 
    $("#EmpTypeForm").submit();
});

$("#deptRefresh").click(function () { 
    $("#contentDepartments").load('/departments');
});

$(".dept-link").click(function() {
    var id = $(this).attr('value');
    $.ajax({
        type: "GET",
        url: `/departments/${id}`,
        data: id,
        contentType: false, 
        processData: false,
        success: function (response) {
            var department = response.department;
            $("#deptEditID").val(department.department_id);
            $("#deptEditName").val(department.department_name);
            $("#deptIDHidden").val(department.id);
        }
    });
});

$('#deleteDept').click(function () { 
    $("#deleteDeptForm").submit();
});

$("#deleteDeptForm").submit(function (e) { 
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });
    var id = $("#deptIDHidden").val();
    $.ajax({
        type: "DELETE",
        url: `/departments/${id}`,
        data: id,
        contentType: false,
        processData: false,
        success: function (response) {
            
        }
    });

    e.preventDefault();
    return false;
    
});

