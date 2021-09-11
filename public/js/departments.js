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
            $(".alert-success").show();
            $(".alert-success").delay(4000).hide(1);
            $("#contentDepartments").load('/departments');
        },
        error: function (response) {
            $(".alert-danger").show();
            $(".alert-danger").delay(4000).hide(1);
            $("#contentDepartments").load('/departments');
        },
    });
    e.preventDefault();
    return false;
});

$("#saveNewDept").click(function () {
    $("#departmentForm").submit();
});

$("#deptRefresh").click(function () {
    $("#contentDepartments").load("/departments");
});

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
            // $("#deptEditHead").val(department.reports_to);
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
            $(".alert-success").show();
            $(".alert-success").html(
                `Successfully deleted a <a href="#" class="alert-link">Department</a>.`
            );
            $(".alert-success").delay(4000).hide(1);
            $("#contentDepartments").load('/departments');
        },
    });

    e.preventDefault();
    return false;
});

$("#saveEditDept").click(function () {
    $("#EmpEditTypeForm").submit();
});

$("#EmpEditTypeForm").submit(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });

    var id = $("#deptIDHidden").val();
    var formData = new FormData(this);
    $.ajax({
        type: "PUT",
        url: `/departments/${id}`,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            alert(response);
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
