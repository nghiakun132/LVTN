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

$(".js-delete-event").click(function (e) {
    e.preventDefault();
    let url = $(this).attr("data-url");
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có, xóa nó!",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                data: {
                    id: $(this).attr("data-id"),
                },
                type: "GET",
                success: function (data) {
                    if (data.code == 200) {
                        Swal.fire("Đã xóa!", "Dữ liệu đã được xóa.", "success");
                        // location.reload();
                    }
                },
                error: function () {},
            });
        }
    });
});

$(".delete_product").click(function (e) {
    e.preventDefault();
    let url = $(this).attr("data-url");
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có, xóa nó!",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                data: {
                    id: $(this).attr("data-id"),
                },
                type: "GET",
                success: function (data) {
                    if (data.code == 200) {
                        Swal.fire("Đã xóa!", "Dữ liệu đã được xóa.", "success");
                    }
                },
                error: function () {},
            });
        }
    });
});
