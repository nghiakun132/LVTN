function runSpeechRecognition() {
    var output = document.getElementById("output");
    var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
    var recognition = new SpeechRecognition();
    recognition.lang = "vi-VN";
    recognition.onstart = function () {
        // output.setAttribute("value", "Đang nhận dạng...");
        return Swal.fire({
            title: "Mời bạn nói..............",
            showConfirmButton: false,
            timer: 3000,
            icon: "question",
            iconHtml:
                '<img src="https://img.icons8.com/color/96/000000/microphone.png" style="width: 100px; height:80px"/>',
            allowOutsideClick: false,
            customClass: {
                icon: "no-border",
            },
            width: "300px",
            padding: "3em",
        });
    };
    recognition.onspeechend = function () {
        recognition.stop();
    };

    recognition.onresult = function (event) {
        var transcript = event.results[0][0].transcript;
        Swal.fire({
            title: transcript,
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
        });
        output.setAttribute("value", transcript);
        setTimeout(() => {
            $("#form-search-top").submit();
        }, 2000);
    };
    recognition.start();
}

$("document").ready(function () {
    $(".hero__categories ul").slideToggle(400);
    $(".hero__categories ul").css("padding", "0");
});

$(".hero__categories__all").on("click", function () {
    $(".hero__categories ul").css("padding", "0");
    $(".hero__categories ul").slideToggle(400);
});

$("document").ready(function () {
    window.addEventListener("scroll", function () {
        if (window.scrollY > 666) {
            $(".back-to-top").css("display", "block");
        } else {
            $(".back-to-top").css("display", "none");
        }
    });

    $(".back-to-top").click(function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});

$(".search_input").on("focus", function () {
    $("body").css("overflow", "hidden");
    $(".autocomplete-suggestions").css("display", "block");
});

$(".search_input").on("blur", function () {
    $("body").css("overflow", "auto");
    $(".autocomplete-suggestions").css("display", "none");
});

$(".search_input").keyup(function () {
    var query = $(this).val();
    if (query != "") {
        // var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/searchAjax",
            method: "GET",
            data: { search: query },
            success: function (data) {
                $(".autocomplete-suggestions").fadeIn();
                $(".autocomplete-suggestions").html(data);
            },
        });
    }
});

$("#forgot-password").click(function (e) {
    e.preventDefault();
    let email = $("#email3").val();
    if (validateForm(email)) {
        $.ajax({
            url: "/quen-mat-khau",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { email: email },
            success: function (data) {
                if (data.code == 200) {
                    Swal.fire({
                        title: "Đã gửi tới email của bạn",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                } else {
                    Swal.fire({
                        title: "Email không tồn tại",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
                console.log(data);
            },
        });
    }
});

function validateForm(email) {
    if (email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (email.indexOf("@") == -1) {
        alert("Email invalid");
        return false;
    }

    return true;
}

$("#view-more").click(function (e) {
    let des = $("#description");
    if (des[0].children[0].classList.contains("description-block")) {
        des[0].children[0].classList.remove("description-block");
        des[0].children[1].classList.add("description-block-full");
        $("#view-more").text("Thu gọn");
    } else {
        des[0].children[0].classList.add("description-block");
        des[0].children[1].classList.remove("description-block-full");
        $("#view-more").text("Xem thêm");
    }
});

$("#quick-buy").click(function (e) {
    console.log("click");
});

$("#add-to-cart").click(function (e) {
    if ($("#add-to-cart").data("id") == 0) {
        $("#login").modal({
            backdrop: "static",
            keyboard: false,
        });
        return;
    }
    if (
        $("#product-quantity").val() == 0 ||
        $("#product-quantity").val() == ""
    ) {
        Swal.fire({
            title: "Số lượng phải lớn hơn 0",
            icon: "error",
            showConfirmButton: false,
            timer: 2000,
        });
        return;
    }
    if ($("#product-quantity").val() > $("#product-quantity").data("max")) {
        Swal.fire({
            title:
                "Số lượng không được lớn hơn " +
                $("#product-quantity").attr("max"),
            icon: "error",
            showConfirmButton: false,
            timer: 2000,
        });

        $("#product-quantity").val($("#product-quantity").data("max"));

        return;
    }

    $.ajax({
        url: "/gio-hang/them-gio-hang",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            product_id: $('input[name="pro_id"]').val(),
            quantity: $("#product-quantity").val(),
            price: $('input[name="pro_price"]').val(),
        },
        success: function (data) {
            if (data.code == 200) {
                Swal.fire({
                    title: data.message,
                    icon: "success",
                    showConfirmButton: true,
                    confirmButtonText: "Xem giỏ hàng",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/gio-hang";
                    }
                });
            } else {
                Swal.fire({
                    title: data.message,
                    icon: "error",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
        },
    });
});

$(".update_cart").click(function () {
    Swal.fire({
        title: "Bạn có chắc muốn cập nhật giỏ hàng?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Cập nhật",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            const id = $(this).data("id");
            const quantity = $(".pro_quantity" + id).val();
            $.ajax({
                url: "/gio-hang/cap-nhat",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: id,
                    quantity: quantity,
                },
                success: function (data) {
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (data) {
                    Swal.fire({
                        title: data.responseJSON.message,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                },
            });
        }
    });
});

$(".delete-cart").click(function () {
    Swal.fire({
        title: "Bạn có chắc muốn xóa sản phẩm này?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            const id = $(this).data("id");
            $.ajax({
                url: "/gio-hang/xoa",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: id,
                },
                success: function (data) {
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (data) {
                    Swal.fire({
                        title: data.responseJSON.message,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                },
            });
        }
    });
});

$("#update-all").click(function () {
    Swal.fire({
        title: "Bạn có chắc muốn cập nhật giỏ hàng không?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Cập nhật",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            const cartId = [];
            const id = $('input[name="cart_id"]');
            id.each(function (index, value) {
                cartId.push({
                    id: $(this).val(),
                    quantity: $(".pro_quantity" + $(this).val()).val(),
                });
            });
            $.ajax({
                url: "/gio-hang/cap-nhat-tat-ca",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    cart: cartId,
                },
                success: function (data) {
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (data) {
                    Swal.fire({
                        title: data.responseJSON.message,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                },
            });
        }
    });
});

$("#delete-all").click(function () {
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa tất cả sản phẩm?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/gio-hang/xoa-tat-ca",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                },
                error: function (data) {
                    Swal.fire({
                        title: data.responseJSON.message,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                },
            });
        }
    });
});

$("#comment-form").submit(function (e) {
    e.preventDefault();
    const check = $("#btn-submit").data("check");
    if (check == 0) {
        $("#login").modal({
            backdrop: "static",
            keyboard: false,
        });
    } else {
        if ($("#content").val() == "") {
            return Swal.fire({
                title: "Nội dung không được để trống",
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            });
        }

        const data = $("#comment-form").serialize();

        $.ajax({
            url: $("#comment-form").attr("action"),
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: data,
            success: function (data) {
                if (data.code == 200) {
                    $("#content").val("");
                    Swal.fire({
                        title: "Đã gửi bình luận chờ duyệt",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                } else {
                    Swal.fire({
                        title: "Đã có lỗi xảy ra",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
            },
        });
    }
});

$(".item-comment").mouseover(function (e) {
    $(this).find(".replyCommentHolder").css("display", "block");
});

$(".item-comment").mouseout(function (e) {
    $(this).find(".replyCommentHolder").css("display", "none");
});

$(".btnReplyComment").click(function (e) {
    e.preventDefault();
    const check = $(".btnReplyComment").data("check");
    if (check == 0) {
        $("#login").modal({
            backdrop: "static",
            keyboard: false,
        });
    } else {
        if ($(".replyComment" + $(this).data("id")).val() == "") {
            return Swal.fire({
                title: "Nội dung không được để trống",
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            });
        }
        const data = {
            content: $(".replyComment" + $(this).data("id")).val(),
            parent_id: $(this).data("id"),
        };
        $.ajax({
            url: $("#comment-form").attr("action"),
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: data,
            success: function (data) {
                if (data.code == 200) {
                    $(".replyComment" + $(this).data("id")).val("");
                    Swal.fire({
                        title: "Đã gửi bình luận chờ duyệt",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                } else {
                    Swal.fire({
                        title: "Đã có lỗi xảy ra",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                }
            },
        });
    }
});
$(".btn-delete-coupon").click(function (e) {
    e.preventDefault();
    const disable = $(this).attr("disabled");
    if (disable == "disabled") {
        return;
    }
    $.ajax({
        url: "/huy-ma-giam-gia",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            if (data.code == 200) {
                Swal.fire({
                    title: data.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                });
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        },
        error: function (data) {
            Swal.fire({
                title: data.responseJSON.message,
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            });
        },
    });
});

$(".delivery_method").change(function (e) {
    const fee = $(this).data("fee");
    $("#fee").text(parseInt(fee).toLocaleString("vi-VN") + "đ");
    // $("#total").text(parseInt($("#total").data("total")) + parseInt(fee));
    const total = $("#total").data("total");
    const totalFee = parseInt(total) + parseInt(fee);
    $("#total").text(parseInt(totalFee).toLocaleString("vi-VN") + "đ");
});
$("#add-wishlist").click(function (e) {
    e.preventDefault();
    if ($("#add-to-cart").data("id") == 0) {
        $("#login").modal({
            backdrop: "static",
            keyboard: false,
        });
    }
    const id = $(this).data("id");
    $.ajax({
        url: "/them-san-pham-yeu-thich",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            id: id,
        },
        success: function (data) {
            if (data.code == 200) {
                Swal.fire({
                    title: data.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
        },
        error: function (data) {
            Swal.fire({
                title: data.responseJSON.message,
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            });
        },
    });
});

$(".delete-wishlist").click(function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    $.ajax({
        url: "/xoa-san-pham-yeu-thich",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            id: id,
        },
        success: function (data) {
            if (data.code == 200) {
                Swal.fire({
                    title: data.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                });
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        },
        error: function (data) {
            Swal.fire({
                title: data.responseJSON.message,
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            });
        },
    });
});

$("#form-cancel").submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();
    $.ajax({
        url: "/tai-khoan/don-hang-cua-toi/huy-don-hang",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: data,
        success: function (data) {
            if (data.code == 200) {
                Swal.fire({
                    title: data.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                });
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        },
        error: function (data) {
            Swal.fire({
                title: data.responseJSON.message,
                icon: "error",
                showConfirmButton: false,
                timer: 2000,
            });
        },
    });
});
