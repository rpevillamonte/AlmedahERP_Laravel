var DEPT_SUCCESS = "#dept_success";
var DEPT_FAIL = "#dept_fail";

$(document).ready(function () {
    x = $("#departmentsTable").DataTable();
    $(".dept-select").selectpicker();
});

$("#departmentForm").submit(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });

    var formData = new FormData(this);

    $.ajax({
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            deptRefresh();
        },
    });
    e.preventDefault();
    return false;
});

$("#saveNewDept").click(function () {
    var msg = '', dept_alert = '';
    var flag = true;
    if($("#deptName").val() && $("#deptHead").val() !== 'non') {
        msg = 'Successfully created a department.';
        dept_alert = DEPT_SUCCESS;
        flag = false;
        $("#departmentForm").submit();
    } else {
        msg = 'Failed to create a department. ';
        if (!$("#deptName").val() && $("#deptHead").val() == 'non') {
            msg = msg.concat('No information provided.');
        } 
        else {
            if (!$("#deptName").val()) msg = msg.concat('No department name provided.');
            else if($("#deptHead").val() == 'non') msg = msg.concat('No indicated department head.');
        } 
        dept_alert = DEPT_FAIL;
    }
    slideAlert(msg, dept_alert);
    if (flag) deptFormRefresh();
});

$("#deptRefresh").click(function () {
    deptRefresh();
});

function deptFormRefresh() {
    $("#deptName").val(null);
    $("#deptHead").val('non');
    $("#deptHead").selectpicker('refresh');
}

function deptRefresh() {
    $("#contentDepartments").load("/departments");
}

$(".dept-link").click(function () {
    var id = $(this).attr("value");
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
            $("#deptEditHead").val(department.reports_to);
            $("#deptEditHead").selectpicker('refresh');
            $("#deptIDHidden").val(department.id);
        },
    });
});

$("#deleteDept").click(function () {
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
            slideAlert('Removed a department.', DEPT_SUCCESS);
        },
    });
    deptRefresh();
    e.preventDefault();
    return false;
});

$("#saveEditDept").click(function () {
    var msg = '', dept_alert = '';
    if($("#deptEditName").val() && $("#deptEditHead").val() !== 'non') {
        $("#editDepartment").submit();
        msg = 'Successfully edited department data.';
        dept_alert = DEPT_SUCCESS;
    } else {
        msg = 'Failed to edit department data.';
        dept_alert = DEPT_FAIL;
    }
    slideAlert(msg, dept_alert);
});

function deptEditRefresh() {
    $("#deptEditID").val(null);
    $("#deptEditName").val(null);
    $("#deptEditHead").val('non');
    $("#deptEditHead").selectpicker('refresh');
    $("#deptIDHidden").val(null); 
}

$("#closeEditDept").click(function () { 
    deptEditRefresh();
});

$("#editDepartment").submit(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });

    var id = $("#deptIDHidden").val();
    var formData = new FormData(this);
    $.ajax({
        type: $(this).attr('method'),
        url: `/departments/${id}`,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            deptRefresh();
            // alert(response);
            // $(".alert-success").show();
            // $(".alert-success").html(
            //     `Successfully deleted a <a href="#" class="alert-link">Department</a>.`
            // );
            // $(".alert-success").delay(4000).hide(1);
        },
    });
    e.preventDefault();
    return false;
});
