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
