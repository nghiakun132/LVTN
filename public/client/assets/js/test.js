function runSpeechRecognition() {
    var output = document.getElementById("output");
    var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
    var recognition = new SpeechRecognition();
    recognition.lang = "vi-VN";
    recognition.onstart = function () {
        output.setAttribute("value", "Đang nhận dạng...");
    };
    recognition.onspeechend = function () {
        recognition.stop();
    };
    recognition.onresult = function (event) {
        var transcript = event.results[0][0].transcript;
        output.setAttribute("value", transcript);
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
//   z-index: 1000;
//     color: blue;
//     position: fixed;
//     top: 0px;
//     margin-left: 0px;
//     width: 1348px;
//     left: 0px;
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
