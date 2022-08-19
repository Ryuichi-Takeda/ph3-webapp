'use strict'
function show_graph() {
    var ctx = document.getElementById("bar_chart_cv").getContext('2d');
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "", "2", "", "4", "",
                "6", "", "8", "", "10",
                "", "12", "", "14", "",
                "16", "", "18", "", "20",
                "", "22", "", "24", "",
                "26", "", "28", "", "30"
            ],
            datasets: [{
                label: "系列Ａ",
                data: [
                    1, 2, 5, 1, 3,
                    1, 2, 5, 1, 3,
                    1, 2, 5, 1, 3,
                    1, 2, 5, 1, 3,
                    1, 2, 5, 1, 3,
                    1, 2, 5, 1, 3,
                ],
                backgroundColor: "rgba(0,112,184)",
                // borderColor: "rgb(0,112,184)",
                // borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            scales: { // 軸設定
                xAxes: [ // Ｘ軸設定
                    {
                        scaleLabel: { // 軸ラベル
                            display: true, // 表示設定
                            //labelString: '横軸ラベル',    // ラベル
                            fontColor: "black", // 文字の色
                            fontSize: 16 // フォントサイズ
                        },
                        gridLines: { // 補助線
                            display: false,
                            //color: "rgba(255, 0, 0, 0.2)", // 補助線の色
                        },
                        ticks: { // 目盛り
                            // min: 0,                        // 最小値
                            // max: 30,                       // 最大値
                            // stepSize: 2,                   // 軸間隔
                            fontColor: "black", // 目盛りの色
                            fontSize: 5 // フォントサイズ
                        }
                    }
                ],
                yAxes: [ // Ｙ軸設定
                    {
                        scaleLabel: { // 軸ラベル
                            display: true, // 表示の有無
                            //labelString: '縦軸ラベル',     // ラベル
                            fontFamily: "sans-serif",
                            fontColor: "black", // 文字の色
                            fontFamily: "sans-serif",
                            fontSize: 16 // フォントサイズ
                        },
                        gridLines: { // 補助線
                            // display:false,
                            color: "rgba(255,255,255)", // 補助線の色
                            zeroLineColor: "black" // y=0（Ｘ軸の色）
                        },
                        ticks: { // 目盛り
                            min: 0, // 最小値
                            max: 10, // 最大値
                            stepSize: 2, // 軸間隔
                            fontColor: "black", // 目盛りの色
                            fontSize: 14 // フォントサイズ
                        }
                    }
                ]
            }
        }
    });
}
show_graph();
// データ --- (*1)
const bar_chart_data = {
    labels: [
        'A', 'B', 'C', 'D', 'E',
        'A', 'B', 'C', 'D', 'E',
        'A', 'B', 'C', 'D', 'E',
        'A', 'B', 'C', 'D', 'E',
        'A', 'B', 'C', 'D', 'E'
    ],
    datasets: [{
        label: '学習時間',
        data: [
            0.1, 1, 5, 3, 6, 2,
            0.1, 1, 5, 3, 6, 2,
            0.1, 1, 5, 3, 6, 2,
            0.1, 1, 5, 3, 6, 2,
            0.1, 1, 5, 3, 6, 2
        ],
        backgroundColor: [
            'blue', 'blue', 'blue', 'blue', 'blue',
            'blue', 'blue', 'blue', 'blue', 'blue',
            'blue', 'blue', 'blue', 'blue', 'blue',
            'blue', 'blue', 'blue', 'blue', 'blue',
            'blue', 'blue', 'blue', 'blue', 'blue'
        ]
    }]
} // グラフを描画 --- (*2)
const bar_chart_ctx = document.getElementById('bar_chart_cv')
const bar_chart_cv = new Chart(bar_chart_ctx, {
    type: 'bar', // グラフの種類
    data: bar_chart_data, // データ 
    options: {}
}) // オプション 