function loadNewStockMoves(transferId = null) {
    if (transferId == null) {
        $("#contentStockMoves").load("/newstockmoves", function () {
            $("#saveStockTransferCreate").show();
            // $("#saveStockTransfer").show();
            // $("#confirmStockTransfer").show();
        });
    } else {
        $.ajax({
            type: "GET",
            url: `/getStockTransfer/${transferId}`,
            data: transferId,
            processData: false,
            contentType: false,
            success: function (data) {
                $("#contentStockMoves").load("/newstockmoves", function () {
                    console.log(data);
                    $("#tracking_id").attr("disabled", true);
                    $("#tracking_id").val(data["stock_transfer"].tracking_id);
                    $("#move_date").val(data["stock_transfer"].move_date);
                    $("#mat_ordered_id").val(
                        data["stock_moves"].mat_ordered_id
                    );
                    $("#employee_id").val(data["stock_moves"].employee_id);
                    showItemCodeNew(
                        data["stock_moves"].mat_ordered_id,
                        data["stock_transfer"].tracking_id
                    );
                });
            },
        });
    }
}

function loadStockReturn() {
    // $(document).ready(function () {
    //     $("#contentStock").load("/stockmovesreturn");
    // });
    $(document).ready(function () {
        $("#contentStockMoves").load("/returnitems");
    });
}

function loadStockReturnInfo(
    trackingId,
    stockMovesType,
    matOrdered,
    employeeId,
    moveDate,
    status
) {
    $("#contentStockMoves").load("/returnitems", function () {
        $("#tracking_id_ret").val(trackingId);
        $("#stock_moves_type_ret").val(stockMovesType);
        $("#mat_ordered_id_ret").val(matOrdered);
        $("#employee_id_ret").val(employeeId);
        $("#move_date_ret").val(moveDate);
        if (status == "Successfully Returned") {
            $("#saveRet").css("display", "none");
        }
        if (stockMovesType === "Return") {
            // $("#saveCancelButtons").hide().css("visibility", "hidden");
            $("#backButton").css("display", "block");
        }
        showItemsRet(trackingId);
    });
}

function onChangeItemTransQty(itemTransQty, el) {
    let currentRow = $(el).closest("tr");
    let itemCodeFound = currentRow.find("td:nth-child(2)").html();
    // console.log("before pass_val");
    // console.log(itemsTransPassValue);
    // console.log("before real_val");
    // console.log(itemsTrans);
    passValueArray.forEach((itemPV) => {
        if (itemCodeFound === itemPV.item_code) {
            itemPV.qty_received = itemTransQty;
        }
    });

    console.log("pass_val");
    console.log(passValueArray);
    console.log("real_val");
    console.log(itemsTrans);
}

function viewStockTransferItems(id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "GET",
        url: `/view-st-items/${id}`,
        data: id,
        processData: false,
        contentType: false,
        success: function (response) {
            let table = $("#stockTransfer_itemList tbody");
            $("#stockTransfer_itemList tbody tr").remove();
            let itemsR = JSON.parse(response);
            itemsR.forEach((item) => {
                table.append(
                    `
                    <tr>
                        <td>${item.item_code}</td>
                        <td>${item.qty_received}</td>
                    </tr>
                    `
                );
            });
        },
    });
}

function markAsReturn(e) {
    let currentRow = $(e).closest("tr");
    let attr = currentRow
        .find("td:nth-child(1) .form-check .checkbox")
        .is(":checked");
    currentRow
        .find("td:nth-child(9) .btn")
        .attr("disabled", attr ? false : true);
}

function writeRemark(el) {
    $("#remarks").modal("toggle");
    let currentRow = $(el).closest("tr");
    let itemCodeFound = currentRow.find("td:nth-child(2)").html();
    console.log(itemsRet);
    passValueArray.forEach((itemRet) => {
        if (itemCodeFound == itemRet.item_code) {
            console.log(itemRet.remarks);
            $("#remarkText").val(function (text) {
                return itemRet.remarks;
            });
        }
    });
    $("#itemCodeRemark").text(itemCodeFound);
}

function submitRemark() {
    $("#remarks").modal("toggle");
    let text = $("#remarkText").val();
    let itemCode = $("#itemCodeRemark").text();
    passValueArray.forEach((passValueObj) => {
        if (passValueObj.item_code == itemCode) {
            passValueObj["remarks"] = text;
        }
    });
    console.log("new");
    console.log(passValueArray);
}

function showItemsRet(trackingId) {
    $("#itemsRet").empty();
    let itemsTransTable = $("#itemsTrans");
    let itemsRetTable = $("#itemsRet");
    itemsTrans = [];
    passValueArray = [];
    itemsRet = [];
    itemsTransCurrent = [];
    $.ajax({
        type: "GET",
        url: "/showItemsRet/" + trackingId,
        success: function (data) {
            if (data["return_date"]) {
                $("#return_date_ret").val(data["return_date"]);
            }
            let items_list_received = JSON.parse(data["transfer"]);
            items_list_received.forEach((item) => {
                let obj = {
                    item_code: item.item_code,
                    qty_received: item.qty_received,
                    qty_checker: item.qty_checker,
                    source_station: item.source_station,
                    target_station: item.target_station,
                    consumable: item.consumable,
                    item_condition: item.item_condition,
                    transfer_status: item.transfer_status,
                };
                itemsTrans.push(obj);
            });
            itemsTrans.forEach((item) => {
                let obj = {
                    item_code: item.item_code,
                    qty_received: item.qty_received,
                    qty_checker: item.qty_checker,
                    source_station: item.source_station,
                    target_station: item.target_station,
                    consumable: item.consumable,
                    item_condition: item.item_condition,
                    transfer_status: item.transfer_status,
                };
                passValueArray.push(obj);
            });
            console.log(passValueArray);
            console.log(itemsTrans);
            JSON.parse(data["transfer"]).forEach((item) => {
                itemsTransTable.append(
                    `<tr><td>
                          <div class="form-check">
                              <input type="checkbox" class="checkbox form-check-input" onchange="markAsReturn(this)">
                          </div>
                      </td>
                      <td>` +
                        item.item_code +
                        `</td>
                    <td>` +
                        item.qty_received +
                        `</td>
                    <td><input type="number" onchange="onChangeItemTransQty(this.value, this)" class="form-control w-75" max=` +
                        item.qty_received +
                        ` value=` +
                        item.qty_received +
                        `></td>
                    <td>` +
                        item.consumable +
                        `</td>
                    <td>` +
                        item.source_station +
                        `</td>
                    <td>` +
                        item.target_station +
                        `</td>
                    <td>` +
                        item.item_condition +
                        `</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="writeRemark(this)" disabled>Write</button>
                    </td></tr>
                    `
                );
            });

            // if (items_list_received.length == 0) {

            // }

            // -------------
            if (data["return"]) {
                let items_to_be_returned = JSON.parse(data["return"]);
                items_to_be_returned.forEach((item) => {
                    let obj = {
                        item_code: item.item_code,
                        qty_transferred: item.qty_transferred,
                        source_station: item.source_station,
                        target_station: item.target_station,
                        consumable: item.consumable,
                        item_condition: item.item_condition,
                        transfer_status: item.transfer_status,
                        remarks: item.remarks,
                    };
                    itemsRet.push(obj);
                });
                JSON.parse(data["return"]).forEach((item) => {
                    itemsRetTable.append(
                        `<tr><td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </td>
                        <td>` +
                            item.item_code +
                            `</td>
                        <td>` +
                            item.qty_transferred +
                            `</td>
                        <td>` +
                            item.consumable +
                            `</td>
                        <td>` +
                            item.source_station +
                            `</td>
                        <td>` +
                            item.target_station +
                            `</td>
                        <td>` +
                            item.item_condition +
                            `</td></tr>`
                    );
                });

                console.log("ret");
                console.log(itemsRet);
                console.log("trans");
                console.log(itemsTrans);
                console.log("pass");
                console.log(passValueArray);
            }

            if (data["return_logs"]) {
                let sorted_logs = JSON.parse(data["return_logs"]).sort(
                    function (a, b) {
                        return new Date(b.date) - new Date(a.date);
                    }
                );

                sorted_logs.forEach((log, index) => {
                    let date = log.date;
                    $("#return_logs").append(
                        `
                    <div class="alert alert-secondary" role="alert">
                      ` +
                            log.message +
                            `.
                      <p class="card-text"><small class="text-muted">` +
                            date +
                            `</small></p>
                    </div`
                    );
                });
            }
        },
        error: function (data) {
            console.log("error");
            console.log(data);
        },
    });
}
