$(document).ready(function () {
    x = $('#employmentTypeTable').DataTable();
});

$("#saveEmpType").click(function () { 
    $("#EmpTypeForm").submit();
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