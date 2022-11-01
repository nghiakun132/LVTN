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

    var $visitorsChart = $("#visitors-chart");
    // eslint-disable-next-line no-unused-vars
    var visitorsChart = new Chart($visitorsChart, {
        data: {
            labels: ["18th", "20th", "22nd", "24th", "26th", "28th", "30th"],
            datasets: [
                {
                    type: "line",
                    data: [100, 120, 170, 167, 180, 177, 160],
                    backgroundColor: "transparent",
                    borderColor: "#007bff",
                    pointBorderColor: "#007bff",
                    pointBackgroundColor: "#007bff",
                    fill: false,
                    // pointHoverBackgroundColor: '#007bff',
                    // pointHoverBorderColor    : '#007bff'
                },
                {
                    type: "line",
                    data: [60, 80, 70, 67, 80, 77, 100],
                    backgroundColor: "tansparent",
                    borderColor: "#ced4da",
                    pointBorderColor: "#ced4da",
                    pointBackgroundColor: "#ced4da",
                    fill: false,
                    // pointHoverBackgroundColor: '#ced4da',
                    // pointHoverBorderColor    : '#ced4da'
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
                                suggestedMax: 200,
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

function formatCurrency(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

// lgtm [js/unused-local-variable]
