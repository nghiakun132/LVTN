$("#delete-img").click(function () {
    $("#inputGroupFile04").val("");
});

$("#categories").change(function () {
    var category = $(this).val();
    $.ajax({
        url: "/panel/brand/get-brand-by-category",
        method: "GET",
        data: {
            category: category,
        },
        success: function (data) {
            if (data) {
                $("#brands").html(data);
            } else {
                $("#brands").html(
                    "<option value='0'>Không có thương hiệu </option>"
                );
            }
        },
    });
});

$("#submitFormAddGroup").click(function (e) {
    e.preventDefault();
    let name = $("#group_name").val();
    $.ajax({
        url: "/panel/product/add-group-product",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            name: name,
        },
        success: function (data) {
            if (data.status == true) {
                $("#addGroup").modal("hide");
                $("#groups").append(
                    "<option value='" +
                        data.group_id +
                        "'>" +
                        name +
                        "</option>"
                );
            }
        },
    });
});

$("#submitFormAddColor").click(function (e) {
    e.preventDefault();
    let color = $("#color_name").val();
    $.ajax({
        url: "/panel/product/add-color-product",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            color: color,
        },
        success: function (data) {
            if (data.status == true) {
                $("#addColor").modal("hide");
                $("#colors").append(
                    '<option value="' + data.color + '">' + color + "</option>"
                );
            }
        },
    });
});

let itemDetail = document.querySelectorAll(".item-detail");

itemDetail.forEach((item) => {
    return (item.innerHTML = item.innerHTML.replace(/\n/g, "<br>"));
});

$("#submitAddSupplier").click(function (e) {
    e.preventDefault();
    let name = $("#s_name").val();
    let phone = $("#s_phone").val();
    let address = $("#s_address").val();
    let email = $("#s_email").val();
    $.ajax({
        url: "/panel/supplier/",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            s_name: name,
            s_phone: phone,
            s_address: address,
            s_email: email,
        },
        success: function (data) {
            if (data.status == true) {
                $("#addSupplier").modal("hide");
                $("#suppliers").append(
                    '<option value="' + data.s_id + '">' + name + "</option>"
                );
            }
        },
    });
});
