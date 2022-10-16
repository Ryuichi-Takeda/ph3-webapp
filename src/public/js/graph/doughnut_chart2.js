'use strict'
let dataLabelPlugin2 = {
    afterDatasetsDraw: function (chart, easing) {
        //To only draw at the end of animation, check for easing === 1
        let ctx = chart.ctx;
        chart.data.datasets.forEach(function (dataset, i) {
            let dataSum = 0;
            dataset.data.forEach(function (element) {
                dataSum += element;
            });
            let meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                meta.data.forEach(function (element, index) {
                    // Draw the text in black, with the specified font
                    ctx.fillStyle = "rgb(255, 255, 255)";
                    let fontSize = 12;
                    let fontStyle = "normal";
                    let fontFamily = "Helvetica Neue";
                    ctx.font = Chart.helpers.fontString(
                        fontSize,
                        fontStyle,
                        fontFamily
                    );
                    // Just naively convert to string for now
                    let labelString = chart.data.labels[index];
                    let dataString =
                        (
                            Math.round((dataset.data[index] / dataSum) * 1000) /
                            10
                        ).toString() + "%";
                    // Make sure alignment settings are correct
                    ctx.textAlign = "center";
                    ctx.textBaseline = "middle";
                    let padding = 5;
                    let position = element.tooltipPosition();
                    ctx.fillText(
                        labelString,
                        position.x,
                        position.y - fontSize / 2 - padding
                    );
                    ctx.fillText(
                        dataString,
                        position.x,
                        position.y + fontSize / 2 - padding
                    );
                });
            }
        });
    },
};
// Chart
let myDoughnutChart2 = "doughnut_chart_cv";
let chart2 = new Chart(myDoughnutChart2, {
    type: "doughnut",
    data: {
        labels: ["", "", "", ""],
        datasets: [
            {
                label: "Sample",
                backgroundColor: [
                    "rgb(0,66,229)",
                    "rgb(0,112,185)",
                    "rgb(0,189,219)",
                    "rgb(8,205,250)",
                ],
                data: [1, 1, 1, 1],
            },
        ],
    },
    options: {
        //  title: {
        //      display: false,
        //      text: "Sample"
        //  },
        legend: {
            display: false,
        },
        maintainAspectRatio: false,
    },
    plugins: [dataLabelPlugin2],
});