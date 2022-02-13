// transferred qty array and materials ordered array
function getQtyFromMatOrdered(tqCode, moArray) {
    if (moArray) {
        let objFound = moArray.find((moObj) => moObj.item_code == tqCode);
        if (objFound) return parseInt(objFound.qty_received);
        else return 0;
    }
    return 0;
}

function getQuantityFromMatOrdered(work_order_no) {
    let dataToReturn;
    $.ajax({
        url: "/getQtyFromMatOrdered/" + work_order_no,
        type: "get",
        async: false,
        success: function (data) {
            dataToReturn = JSON.parse(data);
        },
        error: function (request, error) {},
    });
    return dataToReturn;
}
function loadWorkOrderInfoWithoutSales(workOrderDetails) {
    let percentage_array = [];
    let materials_complete = [];
    let item_complete = [];
    let transferred_qty = JSON.parse(workOrderDetails.transferred_qty);
    let productCode = Object.keys(
        JSON.parse(workOrderDetails.transferred_qty)
    )[0];
    console.log(productCode);
    let materials_qty = getQuantityFromMatOrdered(
        workOrderDetails.work_order_no
    );
    console.log(materials_qty);
    $(document).ready(function () {
        $("#contentWorkOrder").load("/loadWorkOrderInfo", function () {
            $("#startWorkOrder").on("click", function () {
                startWorkOrder(workOrderDetails["work_order_no"]);
            });
            $("#plannedStartDate").change(function (event) {
                event.preventDefault();
                onDateChange(
                    workOrderDetails["work_order_no"],
                    "planned_start_date",
                    this.value
                );
            });
            $("#plannedEndDate").on("change", function () {
                onDateChange(
                    workOrderDetails["work_order_no"],
                    "planned_end_date",
                    this.value
                );
            });
            $("#componentName").text(
                workOrderDetails.product_code ?? workOrderDetails.component_code
            );
            $("#componentStatus").text(workOrderDetails.work_order_status);
            $("#forProduct").attr(
                "value",
                Object.keys(JSON.parse(workOrderDetails.transferred_qty))[0]
            );
            $("#quantityPurchased").attr(
                "value",
                Object.values(
                    JSON.parse(workOrderDetails.transferred_qty)
                )[0][0].quantity_purchased
            );
            if (workOrderDetails.product_code) {
                $.ajax({
                    url:
                        "/getBomId/" +
                        workOrderDetails.product_code +
                        "/" +
                        "Product",
                    type: "get",
                    success: function (data) {
                        $("#bomNumber").val(data);
                    },
                    error: function (request, error) {},
                });
            } else {
                $.ajax({
                    url:
                        "/getBomId/" +
                        workOrderDetails.product_code +
                        "/" +
                        "Component",
                    type: "get",
                    success: function (data) {
                        $("#bomNumber").val(data);
                    },
                    error: function (request, error) {},
                });
            }

            if (workOrderDetails.work_order_status == "Pending") {
                $("#startWorkOrder").prop("disabled", true);
            }
            if (workOrderDetails.real_start_date) {
                $("#actualStartDate").attr(
                    "value",
                    workOrderDetails.real_start_date
                );
            }
            if (workOrderDetails.planned_start_date) {
                $("#plannedStartDate").attr(
                    "value",
                    workOrderDetails.planned_start_date
                );
            }
            if (workOrderDetails.planned_end_date) {
                $("#plannedEndDate").attr(
                    "value",
                    workOrderDetails.planned_end_date
                );
            }

            Object.values(
                JSON.parse(workOrderDetails.transferred_qty)
            )[0].forEach((el, index) => {
                let sequence = index + 1;
                let required_qty = el.required_qty;
                let tq;
                if (transferred_qty[productCode].length > index) {
                    tq =
                        transferred_qty[productCode][index].transferred_qty +
                        getQtyFromMatOrdered(
                            transferred_qty[productCode][index].item_code,
                            materials_qty
                        );

                    if (
                        transferred_qty[productCode][index].transferred_qty >=
                        required_qty
                    ) {
                        materials_complete.push(true);
                        percentage_array.push(100);
                        item_complete.push("");
                    } else if (
                        transferred_qty[productCode][index].transferred_qty <
                        required_qty
                    ) {
                        materials_complete.push(false);
                        percentage_array.push(
                            required_qty /
                                transferred_qty[productCode][index]
                                    .transferred_qty
                        );
                    }
                } else {
                    tq = "n/a";
                }

                $("#requiredItems").append(
                    `
                <tr>
                  <td>
                    <div class="row m-1">
                      <div class="d-flex justify-content-start">
                        <label for="" class="ml-5">` +
                        sequence +
                        `</label>
                      </div>
                    </div>
                  </td>
                  <td>` +
                        el["item_code"] +
                        `</td>
                  <td>Test` +
                        index +
                        `</td>
                  <td>` +
                        required_qty +
                        `</td>
                  <td>` +
                        tq +
                        `</td>
                  
               </tr>`
                );
            });
            let percentage = 0;
            percentage_array.forEach((el) => {
                percentage += el;
            });
            percentage /= 2;
            $("#progressWorkOrder").css("width", percentage + "%");
            let item_complete_count = item_complete.length;
            $("#itemReadyWorkOrder").text(item_complete_count + " Items Ready");

            console.log("mat_complete" + materials_complete);

            if (workOrderDetails.product_code) {
                if (materials_complete.includes(false)) {
                    $("#startWorkOrder").prop("disabled", true);
                } else if (workOrderDetails.work_order_status == "Pending") {
                    $.ajax({
                        url:
                            "/checkUpdateStatus/" +
                            workOrderDetails.work_order_no +
                            "/" +
                            productCode,
                        type: "get",
                        success: function (data) {
                            console.log(data);
                            if (data.work_order_status == "Completed") {
                                $("#startWorkOrder").prop("disabled", false);
                                $("#componentStatus").text(
                                    data.work_order_status
                                );
                            }
                        },
                        error: function (request, error) {},
                    });
                }
            } else {
                if (materials_complete.includes(false)) {
                    $("#startWorkOrder").prop("disabled", true);
                } else if (workOrderDetails.work_order_status == "Pending") {
                    $.ajax({
                        url: "/updateStatus/" + workOrderDetails.work_order_no,
                        type: "get",
                        success: function (data) {
                            console.log(data);
                            $("#startWorkOrder").prop("disabled", false);
                            $("#componentStatus").text(data.work_order_status);
                        },
                        error: function (request, error) {},
                    });
                }
            }
        });
    });
}

function loadWorkOrderInfo(
    workOrderDetails,
    transferredQty,
    itemName,
    salesOrderId,
    productCode,
    quantity
) {
    let percentage_array = [];
    let item_complete = [];
    // let planned_dates = JSON.parse(dates);
    console.log(workOrderDetails);
    $("#requiredItems").html("");
    transferred_qty = JSON.parse(transferredQty);
    console.log("TQ");
    console.log(transferred_qty[productCode]);
    materials_qty = JSON.parse(quantity);
    console.log("mat_qty");
    console.log(materials_qty);
    materials_complete = [];
    // $("#startWorkOrder").click(startWorkOrder());
    $(document).ready(function () {
        $("#contentWorkOrder").load("/loadWorkOrderInfo", function () {
            $("#startWorkOrder").on("click", function () {
                startWorkOrder(workOrderDetails["work_order_no"]);
            });
            $("#plannedStartDate").change(function (event) {
                event.preventDefault();
                onDateChange(
                    workOrderDetails["work_order_no"],
                    "planned_start_date",
                    this.value
                );
            });
            $("#plannedEndDate").on("change", function () {
                onDateChange(
                    workOrderDetails["work_order_no"],
                    "planned_end_date",
                    this.value
                );
            });
            $("#componentName").text(itemName);
            $("#componentStatus").text(workOrderDetails.work_order_status);
            $("#forProduct").attr("value", productCode);

            if (workOrderDetails.work_order_status == "Pending") {
                $("#startWorkOrder").prop("disabled", true);
            }
            if (workOrderDetails.real_start_date) {
                $("#actualStartDate").attr(
                    "value",
                    workOrderDetails.real_start_date
                );
            }
            if (workOrderDetails.planned_start_date) {
                $("#plannedStartDate").attr(
                    "value",
                    workOrderDetails.planned_start_date
                );
            }
            if (workOrderDetails.planned_end_date) {
                $("#plannedEndDate").attr(
                    "value",
                    workOrderDetails.planned_end_date
                );
            }

            if (workOrderDetails.product_code) {
                $.ajax({
                    url:
                        "/getBomId/" +
                        workOrderDetails.product_code +
                        "/" +
                        "Product",
                    type: "get",
                    success: function (data) {
                        $("#bomNumber").val(data);
                    },
                    error: function (request, error) {},
                });
            } else {
                $.ajax({
                    url:
                        "/getBomId/" +
                        workOrderDetails.product_code +
                        "/" +
                        "Component",
                    type: "get",
                    success: function (data) {
                        $("#bomNumber").val(data);
                    },
                    error: function (request, error) {},
                });
            }
            $.ajax({
                url:
                    "/getRawMaterialsWork/" +
                    itemName +
                    "/" +
                    salesOrderId +
                    "/" +
                    productCode,
                type: "GET",
                success: function (datas) {
                    $("#quantityPurchased").attr(
                        "value",
                        datas["quantity_purchased"]
                    );
                    console.log("below are the datas");
                    console.log(datas);
                    for (let [index, rawMat] of JSON.parse(
                        datas["item_code"]
                    ).entries()) {
                        let sequence = index + 1;
                        let required_qty =
                            parseInt(datas["component_qty"]) *
                            datas["quantity_purchased"] *
                            parseInt(rawMat["item_qty"]);
                        let tq;

                        if (transferred_qty[productCode].length > index) {
                            tq =
                                transferred_qty[productCode][index]
                                    .quantity_avail +
                                getQtyFromMatOrdered(
                                    transferred_qty[productCode][index]
                                        .item_code,
                                    materials_qty
                                );

                            if (
                                transferred_qty[productCode][index]
                                    .quantity_avail >= required_qty
                            ) {
                                materials_complete.push(true);
                                percentage_array.push(100);
                                item_complete.push("");
                            } else if (
                                transferred_qty[productCode][index]
                                    .quantity_avail < required_qty
                            ) {
                                materials_complete.push(false);
                                percentage_array.push(
                                    required_qty /
                                        transferred_qty[productCode][index]
                                            .quantity_avail
                                );
                            }
                        } else {
                            tq = "n/a";
                        }

                        $("#requiredItems").append(
                            `
                        <tr>
                          <td>
                            <div class="row m-1">
                              <div class="d-flex justify-content-start">
                                <label for="" class="ml-5">` +
                                sequence +
                                `</label>
                              </div>
                            </div>
                          </td>
                          <td>` +
                                rawMat["item_code"] +
                                `</td>
                          <td>Test` +
                                index +
                                `</td>
                          <td>` +
                                required_qty +
                                `</td>
                          <td>` +
                                tq +
                                `</td>
                       </tr>`
                        );
                    }

                    let percentage = 0;
                    percentage_array.forEach((el) => {
                        percentage += el;
                    });
                    percentage /= 2;
                    $("#progressWorkOrder").css("width", percentage + "%");
                    let item_complete_count = item_complete.length;
                    $("#itemReadyWorkOrder").text(
                        item_complete_count + " Items Produced"
                    );
                    console.log("mat_complete" + materials_complete);

                    if (workOrderDetails.product_code) {
                        if (materials_complete.includes(false)) {
                            $("#startWorkOrder").prop("disabled", true);
                        } else if (
                            workOrderDetails.work_order_status == "Pending"
                        ) {
                            $.ajax({
                                url:
                                    "/checkUpdateStatus/" +
                                    workOrderDetails.work_order_no +
                                    "/" +
                                    productCode,
                                type: "get",
                                success: function (data) {
                                    console.log(data);
                                    $("#startWorkOrder").prop(
                                        "disabled",
                                        false
                                    );
                                    $("#componentStatus").text(
                                        data.work_order_status
                                    );
                                },
                                error: function (request, error) {},
                            });
                        }
                    } else {
                        if (materials_complete.includes(false)) {
                            $("#startWorkOrder").prop("disabled", true);
                        } else if (
                            workOrderDetails.work_order_status == "Pending"
                        ) {
                            $.ajax({
                                url:
                                    "/updateStatus/" +
                                    workOrderDetails.work_order_no,
                                type: "get",
                                success: function (data) {
                                    console.log(data);
                                    $("#startWorkOrder").prop(
                                        "disabled",
                                        false
                                    );
                                    $("#componentStatus").text(
                                        data.work_order_status
                                    );
                                },
                                error: function (request, error) {},
                            });
                        }
                    }
                },
                error: function (request, error) {
                    alert("Request: " + error);
                },
            });
            console.log(materials_complete);
        });
    });
}
