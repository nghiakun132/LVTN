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
                    '<option value="' +
                        data.color_id +
                        '">' +
                        color +
                        "</option>"
                );
            }
        },
    });
});
