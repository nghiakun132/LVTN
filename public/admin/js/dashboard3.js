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
            var salesChart = new Chart($salesChart, {
                type: "bar",
                data: {
                    labels: data.data.map((item) => {
                        return item.date;
                    }),
                    datasets: [
                        {
                            backgroundColor: "#007bff",
                            borderColor: "#007bff",
                            data: data.data.map((item) => item.doanhthu),
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
                    scales: {
                        yAxes: [
                            {
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: "4px",
                                    color: "rgba(0, 0, 0, .2)",
                                    zeroLineColor: "transparent",
                                },
                                ticks: $.extend(
                                    {
                                        beginAtZero: true,

                                        // Include a dollar sign in the ticks
                                        callback: function (value) {
                                            if (value / 1000 >= 1) {
                                                return value.toLocaleString(
                                                    "vi-VN",
                                                    {
                                                        style: "currency",
                                                        currency: "VND",
                                                    }
                                                );
                                            }
                                            return value;
                                        },
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
    // eslint-disable-next-line no-unused-vars

});
