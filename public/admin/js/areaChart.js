$(function () {
    "use strict";

    var areaChartCanvas = $("#areaChart");
    var mode = "index";
    var intersect = true;
    const url = window.location.href;
    const period = url.split("?").pop();
    const api = "http://127.0.0.1:8000/api/statistic?" + period;
    const options = {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
    };
    fetch(api, options)
        .then((response) => response.json())
        .then((data) => {
            new Chart(
                areaChartCanvas,
                {
                    type: "line",
                    data: {
                        labels: data.data.map((item) => item.date),
                        datasets: [
                            {
                                label: "Doanh thu",
                                backgroundColor: "rgba(60,141,188,0.9)",
                                borderColor: "rgba(60,141,188,0.8)",
                                pointRadius: false,
                                pointColor: "#3b8bba",
                                pointStrokeColor: "rgba(60,141,188,1)",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(60,141,188,1)",
                                data: data.data.map((item) => item.doanhthu),
                            },
                            {
                                label: "Nhập hàng",
                                backgroundColor: "rgba(210, 214, 222, 1)",
                                borderColor: "rgba(210, 214, 222, 1)",
                                pointRadius: false,
                                pointColor: "rgba(210, 214, 222, 1)",
                                pointStrokeColor: "#c1c7d1",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(220,220,220,1)",
                                data: data.data.map((item) => item.nhaphang),
                            },
                        ],
                    },
                },
                {
                    maintainAspectRatio: false,
                    responsive: true,
                    tooltips: {
                        mode: mode,
                        intersect: intersect,
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect,
                    },
                    legend: {
                        display: false,
                    },
                }
            );
        });
});
