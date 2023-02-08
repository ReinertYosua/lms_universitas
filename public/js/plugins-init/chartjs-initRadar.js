(function ($) {
    "use strict";

    //radar chart
    var ctx = document.getElementById("radarChart");
    ctx.height = 150;
        
    let score="{{ json_encode($x) }}";
    console.log(score);
   
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ["Active", "Reflective", "Sensing", "Intuitive", "Visual", "Verbal", "Sequential", "Global"],
            datasets: [
                {
                    label: "Gaya Belajar",
                    data: [65, 59, 66, 45, 56, 55, 40],
                    borderColor: "rgba(117, 113, 249, 0.6)",
                    borderWidth: "1",
                    backgroundColor: "rgba(117, 113, 249, 0.4)"
                },
                // {
                //     label: "My Second dataset",
                //     data: [28, 12, 40, 19, 63, 27, 87],
                //     borderColor: "rgba(117, 113, 249, 0.7",
                //     borderWidth: "1",
                //     backgroundColor: "rgba(117, 113, 249, 0.5)"
                // }
            ]
        },
        options: {
            legend: {
                position: 'top'
            },
            scale: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });

})(jQuery);



let draw = Chart.controllers.line.prototype.draw;
Chart.controllers.line = Chart.controllers.line.extend({
    draw: function () {
        draw.apply(this, arguments);
        let nk = this.chart.chart.ctx;
        let _stroke = nk.stroke;
        nk.stroke = function () {
            nk.save();
            nk.shadowColor = '#ddd';
            nk.shadowBlur = 10;
            nk.shadowOffsetX = 0;
            nk.shadowOffsetY = 4;
            _stroke.apply(this, arguments)
            nk.restore();
        }
    }
});

(nk = document.getElementById("canvas")).height = 150;
myChart = new Chart(nk, {
    type: 'line',
    data: {
        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "Mon"],
        datasets: [{
            data: [100, 70, 150, 120, 300, 250, 400, 300],
            borderWidth: 4,
            borderColor: "rgba(117, 113, 249, 0.9)",
            pointBackgroundColor: "#FFF",
            pointBorderColor: "rgba(117, 113, 249, 0.9)",
            pointHoverBackgroundColor: "#FFF",
            pointHoverBorderColor: "rgba(117, 113, 249, 0.9)",
            pointRadius: 0,
            pointHoverRadius: 6,
            fill: !1
        },
        {
            data: [20, 70, 300, 120, 180, 220, 450, 250],
            borderWidth: 4,
            borderColor: "#4d7cff",
            pointBackgroundColor: "#FFF",
            pointBorderColor: "#4d7cff",
            pointHoverBackgroundColor: "#FFF",
            pointHoverBorderColor: "#4d7cff",
            pointRadius: 0,
            pointHoverRadius: 6,
            fill: !1
        }
        ]
    },
    options: {
        responsive: !0,
        legend: {
            display: !1
        },
        scales: {
            xAxes: [{
                display: !1,
                gridLines: {
                    display: !1
                }
            }],
            yAxes: [{
                display: !1,
                ticks: {
                    padding: 10,
                    stepSize: 100,
                    max: 600,
                    min: 0
                },
                gridLines: {
                    display: !0,
                    drawBorder: !1,
                    lineWidth: 1,
                    zeroLineColor: "#e5e5e5"
                }
            }]
        }
    },
});


