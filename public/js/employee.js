function EditEmployee(employee_id) {
    console.log(employee_id);
    $(document).ready(function () {
        $.ajax({
            url: "/getEmployeeDetails/" + employee_id,
            type: "get",
            success: function (data) {
                console.log(data);
                $("#contentEmployee").load("/editemployee", function () {
                    $("#employeeID").val(data["employee_id"]);
                    $("#fname").val(data["first_name"]);
                    $("#lname").val(data["last_name"]);
                    $("#memberGender").val(data["gender"]);
                    $("#bday").val(data["date_of_birth"]);
                    $("#employeeID").val(data["employee_id"]);
                    $("#position").val(data["position"]);

                    $("#eType").val(getEmpType(data["employment_id"]));

                    $("#deptID").val(data["department_id"]);
                    $("#Hdate").val(data["hired_date"]);
                    $("#Salary").val(data["salary"]);
                    $("#salaryTerm").val(data["salary_term"]);
                    $("#roleID").val(data["role_id"]);
                    $("#Email").val(data["email"]);

                    setCheckbox(data["is_admin"]);

                    $("#contactno").val(data["contact_number"]);
                    $("#statusEdit").val(data["status"]);
                    $("#Address").val(data["address"]);
                });
            },
            error: function (request, error) {},
        });
    });
}

function getEmpType(employment_type) {
    if (employment_type == "EMP-FT") {
        return "Full-Time";
    } else if (employment_type == "EMP-C") {
        return "Contract";
    } else if (employment_type == "EMP-P") {
        return "Probation";
    } else if (employment_type == "EMP-PT") {
        return "Part-Time";
    }
}

function setCheckbox(is_admin) {
    if (is_admin) {
        $("#isadmin").prop("checked", true);
    } else {
        $("#isadmin").prop("checked", false);
    }
}

$("#editemployee").on("submit", function (e) {
    e.preventDefault();
    let id = $("#employeeID").val();
    console.log("edits" + id);
    $.ajax({
        type: "PUT",
        url: "/update-employee/" + id,
        data: $("#editemployee").serialize(),
        success: function (response) {
            console.log(response);
            successNotification(
                "Employee SuccessFully Updated!",
                "editemployee-success"
            );
        },
        error: function () {
            console.log("ERROR");
            dangerNotification(
                "There was a problem upon updating Employee",
                "editemployee-danger"
            );
        },
    });
});

$("#addemployee").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/create-employee",
        data: $("#addemployee").serialize(),
        success: function (response) {
            console.log(response);
            successNotification(
                "Employee SuccessFully Added!",
                "addemployee-success"
            );
            $("#addemployee")[0].reset();
        },
        error: function () {
            console.log("ERROR");
            dangerNotification(
                "There was a problem upon creating an employee!",
                "addemployee-danger"
            );
        },
    });
});

$("#isadmin").on("change", function () {
    $("#isadmin").val(this.checked ? 1 : 0);
    console.log($("#isadmin").val());
});

$("#is_admin").on("change", function () {
    $("#is_admin").val(this.checked ? 1 : 0);
    console.log($("#is_admin").val());
});

function dangerNotification(text, name) {
    $("#" + name).show();
    $("#" + name).html(text);
    $("#" + name)
        .delay(4000)
        .hide(1);
}

function successNotification(text, name) {
    $("#" + name).show();
    $("#" + name).html(text);
    $("#" + name)
        .delay(4000)
        .hide(1);
}

function togglePassword(name) {
    var x = document.getElementById(name);
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
