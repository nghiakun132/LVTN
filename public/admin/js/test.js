$("#delete-img").click(function () {
    $("#inputGroupFile04").val("");
});

$("#categories").change(function () {
    let category = $(this).val();
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
            if (data.status) {
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
                        setTimeout(function () {
                            location.reload();
                        }, 1400);
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
                        setTimeout(function () {
                            location.reload();
                        }, 1400);
                    }
                },
                error: function () {},
            });
        }
    });
});
$("#checkAll").click(function () {
    $("input:checkbox").not(this).prop("checked", this.checked);
});

$("#deleteAll").click(function (e) {
    let checkbox = $('input[name="customCheckbox[]"]:checked');
    let checkboxArr = [];
    let _token = $('meta[name="csrf-token"]').attr("content");
    for (let i = 0; i < checkbox.length; i++) {
        checkboxArr.push(checkbox[i].value);
    }
    if (checkboxArr.length <= 0) {
        alert("Vui lòng chọn dữ liệu để xóa");
    } else {
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
                    url: "/panel/comment/delete-all",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        id: checkboxArr,
                        _token: _token,
                    },
                    success: function (data) {
                        if (data.code == 200) {
                            Swal.fire(
                                "Đã xóa!",
                                "Dữ liệu đã được xóa.",
                                "success"
                            );
                            location.reload();
                        }
                    },
                    error: function () {},
                });
            }
        });
    }
});

$("#activeAll").click(function (e) {
    let checkbox = $('input[name="customCheckbox[]"]:checked');
    let checkboxArr = [];
    let _token = $('meta[name="csrf-token"]').attr("content");
    for (let i = 0; i < checkbox.length; i++) {
        checkboxArr.push(checkbox[i].value);
    }
    if (checkboxArr.length <= 0) {
        alert("Vui lòng chọn dữ liệu để xóa");
    } else {
        Swal.fire({
            title: "Bạn có chắc chắn muốn duyệt?",
            text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Có, duyệt nó!",
            cancelButtonText: "Hủy",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/panel/comment/confirm-all",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        id: checkboxArr,
                        _token: _token,
                    },
                    success: function (data) {
                        if (data.code == 200) {
                            Swal.fire(
                                "Đã duyệt!",
                                "Dữ liệu đã được duyệt.",
                                "success"
                            );
                            location.reload();
                        }
                    },
                    error: function () {},
                });
            }
        });
    }
});

$(".user-active").click(function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    Swal.fire({
        title: "Bạn có chắc chắn muốn thay đổi trạng thái?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có, thay đổi nó!",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/panel/user/active",
                data: {
                    id: id,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                success: function (data) {
                    if (data.code == 200) {
                        Swal.fire({
                            title: "Đã duyệt!",
                            text: "Dữ liệu đã được duyệt.",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            timer: 2000,
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                },
                error: function () {
                    Swal.fire("Lỗi!", "Đã có lỗi xảy ra.", "error");
                },
            });
        }
    });
});
