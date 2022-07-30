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
