/* global Chart:false */

$(function () {
    "use strict";

    var ticksStyle = {
        fontColor: "#495057",
        fontStyle: "bold",
    };

    var mode = "index";
    var intersect = true;

    var $salesChart = $("#sales-chart");

    const url = window.location.href;
    const period = url.split("?").pop();
    const api = "http://127.0.0.1:8000/api/userAndOrder?" + period;
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
            new Chart($salesChart, {
                type: "bar",
                data: {
                    labels: data.data.map((item) => item.date),
                    datasets: [
                        {
                            backgroundColor: "#007bff",
                            borderColor: "#007bff",
                            data: data.data.map((item) => item.user),
                        },
                        {
                            backgroundColor: "#ced4da",
                            borderColor: "#ced4da",
                            data: data.data.map((item) => item.order),
                        },
                    ],
                },
                options: {
                    maintainAspectRatio: false,
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
                    datasetFill: false,
                    responsive: true,
                    scales: {
                        yAxes: [
                            {
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: "4px",
                                    color: "red",
                                    zeroLineColor: "transparent",
                                },
                                ticks: $.extend(
                                    {
                                        beginAtZero: true,
                                    },
                                    ticksStyle
                                ),
                            },
                        ],
                        xAxes: [
                            {
                                display: true,
                                gridLines: {
                                    display: false,
                                },
                                ticks: ticksStyle,
                            },
                        ],
                    },
                },
            });
        });
});
