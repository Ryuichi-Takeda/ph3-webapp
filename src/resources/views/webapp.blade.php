<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="webapp" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/webapp.css') }}" />
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
</head>

<body>
    <!-- /.header ここから -->
    <header>
        <div class="header_inner">
            <img src="{{ asset('img/posseLogo.png') }}" alt="POSSE" class="posseLogo" />
            <div class="week_number">nthweek</div>
            <nav class="header_text_container">
                <div class="report_and_posting modal-open">
                    <a href="#modal">
                        <div class="report_and_posting_text">記録・投稿</div>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <!-- /.header ここまで -->
    <!-- /.graph ここから -->
    <div class="graphs">
        <div class="graphs_left">
            <div class="study_hour">
                <div class="study_hour_card">
                    today
                    <p>0</p>
                    <!-- 6 -->
                    <p>hour</p>
                </div>
                <div class="study_hour_card">
                    month
                    <p>0</p>
                    <!-- 12 -->
                    <p>hour</p>
                </div>
                <div class="study_hour_card">
                    total
                    <p>0</p>
                    <p>hour</p>
                </div>
            </div>
            <div class="study_hour_graph">
                <div class="study_hour_graph_card">
                    <canvas id="bar_chart_cv" class="bar_chart">
                        <script>
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
                                    label: '国語のテスト',
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
                        </script>
                    </canvas>
                </div>
            </div>
        </div>
        <div class="graphs_right">
            <div class="πchart">
                <div id="main" class="main"></div>
                <div class="πchart_card">
                    <div class="πchart_card_title">学習言語</div>
                    <canvas id="doughnut_chart1_cv" class="doughnut_chart"></canvas>
                </div>
                <script>
                    var dataLabelPlugin = {
                        afterDatasetsDraw: function(chart, easing) {
                            //To only draw at the end of animation, check for easing === 1
                            var ctx = chart.ctx;
                            chart.data.datasets.forEach(function(dataset, i) {
                                var dataSum = 0;
                                dataset.data.forEach(function(element) {
                                    dataSum += element;
                                });
                                var meta = chart.getDatasetMeta(i);
                                if (!meta.hidden) {
                                    meta.data.forEach(function(element, index) {
                                        // Draw the text in black, with the specified font
                                        ctx.fillStyle = 'rgb(255, 255, 255)';
                                        var fontSize = 12;
                                        var fontStyle = 'normal';
                                        var fontFamily = 'Helvetica Neue';
                                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                                        // Just naively convert to string for now
                                        var labelString = chart.data.labels[index];
                                        var dataString = (Math.round(dataset.data[index] / dataSum * 1000) / 10)
                                            .toString() + "%";
                                        // Make sure alignment settings are correct
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'middle';
                                        var padding = 5;
                                        var position = element.tooltipPosition();
                                        ctx.fillText(labelString, position.x, position.y - (fontSize / 2) -
                                            padding);
                                        ctx.fillText(dataString, position.x, position.y + (fontSize / 2) -
                                            padding);
                                    });
                                }
                            });
                        }
                    };
                    // Chart
                    var myChart = "doughnut_chart1_cv";
                    var chart = new Chart(myChart, {
                        type: 'doughnut',
                        data: {
                            labels: ["", "", "", "", "", "", "", ""],
                            datasets: [{
                                label: "Sample",
                                backgroundColor: [
                                    'rgb(0,66,229)',
                                    'rgb(0,112,185)',
                                    'rgb(0,189,219)',
                                    'rgb(8,205,250)',
                                    'rgb(203,173,240)',
                                    'rgb(108,67,229)',
                                    'rgb(70,9,232)',
                                    'rgb(45,0,186)',
                                ],
                                // data:[
                                data: [
                                    1, 1, 1, 1, 1, 1, 1, 1
                                ],
                            }]
                        },
                        options: {
                            //  title: {
                            //      display: false,
                            //      text: "Sample"
                            //  },
                            legend: {
                                display: false
                            },
                            maintainAspectRatio: false,
                        },
                        plugins: [dataLabelPlugin],
                    });
                </script>
                <div class="πchart_card">
                    <div class="πchart_card_title">学習コンテンツ</div>
                    <canvas id="doughnut_chart_cv" class="doughnut_chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dataLabelPlugin = {
            afterDatasetsDraw: function(chart, easing) {
                //To only draw at the end of animation, check for easing === 1
                var ctx = chart.ctx;
                chart.data.datasets.forEach(function(dataset, i) {
                    var dataSum = 0;
                    dataset.data.forEach(function(element) {
                        dataSum += element;
                    });
                    var meta = chart.getDatasetMeta(i);
                    if (!meta.hidden) {
                        meta.data.forEach(function(element, index) {
                            // Draw the text in black, with the specified font
                            ctx.fillStyle = "rgb(255, 255, 255)";
                            var fontSize = 12;
                            var fontStyle = "normal";
                            var fontFamily = "Helvetica Neue";
                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                            // Just naively convert to string for now
                            var labelString = chart.data.labels[index];
                            var dataString =
                                (
                                    Math.round((dataset.data[index] / dataSum) * 1000) / 10
                                ).toString() + "%";
                            // Make sure alignment settings are correct
                            ctx.textAlign = "center";
                            ctx.textBaseline = "middle";
                            var padding = 5;
                            var position = element.tooltipPosition();
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
        var myChart = "doughnut_chart_cv";
        var chart = new Chart(myChart, {
            type: "doughnut",
            data: {
                labels: ["", "", "", ""],
                datasets: [{
                    label: "Sample",
                    backgroundColor: ["rgb(0,66,229)", "rgb(0,112,185)", "rgb(0,189,219)",
                        'rgb(8,205,250)',
                    ],
                    data: [
                        1, 1, 1, 1
                    ],
                }, ],
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
            plugins: [dataLabelPlugin],
        });
    </script>
    <!-- /.graph ここまで -->
    <!-- /.modal ここから -->
    <div class="modal" id="modal">
        <a href="#!" class="overlay"></a>
        <div class="modal-wrapper" id="modal_wrapper">
            <a href="#!" class="modal-close">✕</a>
            <div id="spinner_box">
                <main class="wrapper">
                    <section class="container" id="spinner_box">
                        <div class="loader-1"></div>
                    </section>
            </div>
            <div class="done" id='done'>
                <div class="awesome">AWESOME!
                </div>
                <div class="done_circle">
                    <div type="checkbox" class="done_checkbottun" name="study_content"></div>
                </div>
                <div class="done_text">記録・投稿</div>
                <!-- <br> -->
                <div>完了しました</div>
            </div>
            <div class="modal-contents" id="modal_contents">
                <a href="#!" class="modal-close">✕</a>
                <div class="modal_left">
                    <h1>学習日</h1>
                    <input class="study_day_record" id="study_day_record" type="text"></input>
                    <h1>学習コンテンツ(複数選択可)</h1>
                    <div class="study_content_check_container">
                        <div class="study_content_check_box">
                            <div class="circle" id="circle1">
                                <div type="checkbox" class="checkbottun" id="checkbottun1" name="study_content"
                                    value="N予備校"></div>
                            </div>
                            <div class="checkbottun_text">N予備校</div>
                        </div>
                        <div class="study_content_check_box">
                            <div class="circle" id="circle2">
                                <div type="checkbox" class="checkbottun" id="checkbottun2" name="study_content"
                                    value="ドットインストール"></div>
                            </div>
                            <div class="checkbottun_text">ドットインストール</div>
                        </div>
                        <div class="study_content_check_box">
                            <div class="circle" id="circle3">
                                <div type="checkbox" class="checkbottun" id="checkbottun3" name="study_content"
                                    value="POSSE課題"></div>
                            </div>
                            <div class="checkbottun_text">POSSE課題</div>
                        </div>
                    </div>
                    <h1>学習言語(複数選択可)</h1>
                    <div class="study_language_check_container">
                        <div class="study_language_check_box">
                            <div class="circle" id="circle4">
                                <div type="checkbox" class="checkbottun" id="checkbottun4" name="study_language"
                                    value="HTML"></div>
                            </div>
                            <div class="checkbottun_text">HTML</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle5">
                                <div type="checkbox" class="checkbottun" id="checkbottun5" name="study_language"
                                    value="CSS"></div>
                            </div>
                            <div class="checkbottun_text">CSS</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle6">
                                <div type="checkbox" class="checkbottun" id="checkbottun6" name="study_language"
                                    value="JavaScript"></div>
                            </div>
                            <div class="checkbottun_text">JavaScript</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle7">
                                <div type="checkbox" class="checkbottun" id="checkbottun7" name="study_language"
                                    value="PHP"></div>
                            </div>
                            <div class="checkbottun_text">PHP</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle8">
                                <div type="checkbox" class="checkbottun" id="checkbottun8" name="study_language"
                                    value="Laravel"></div>
                            </div>
                            <div class="checkbottun_text">Laravel</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle9">
                                <div type="checkbox" class="checkbottun" id="checkbottun9" name="study_language"
                                    value="SQL"></div>
                            </div>
                            <div class="checkbottun_text">SQL</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle10">
                                <div type="checkbox" class="checkbottun" id="checkbottun10" name="study_language"
                                    value="SHELL"></div>
                            </div>
                            <div class="checkbottun_text">SHELL</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle11">
                                <div type="checkbox" class="checkbottun" id="checkbottun11" name="study_language"
                                    value="情報システム基礎知識(その他)"></div>
                            </div>
                            <div class="checkbottun_text">情報システム基礎知識(その他)</div>
                        </div>
                    </div>
                </div>
                <div class="modal_right">
                    <h1>学習時間</h1>
                    <div class="study_hour_record"></div>
                    <h1>Twitter用コメント</h1>
                    <div class="text_area_container">
                        <textarea name="" class="textarea" id="textarea" cols="30" rows="9"></textarea>
                    </div>
                    <div class="Tweet_check_container">
                        <div class="Twitter_share_box">
                            <div class="circle" id="circle12">
                                <div type="checkbox" class="checkbottun" id="checkbottun12" name="Twitter_share"
                                    value="Twitterにシェアする"></div>
                            </div>
                            <div class="checkbottun_text">Twitterにシェアする</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="report_and_posting2_container" id="report_and_posting2_container" onclick="click">
                <div class="report_and_posting2">記録・投稿</div>
            </div>
        </div>
    </div>
    <!-- /.modal ここまで -->
    <script>
        const calendar_container_content = document.getElementById('calendar_container_content');
        const modal_contents = document.getElementById('modal_contents');
        const modal_wrapper = document.getElementById('modal_wrapper');
        const report_and_posting2_container = document.getElementById('report_and_posting2_container');
        const spinner_box = document.getElementById('spinner_box');
        const circle12 = document.getElementById('circle12');
        const done = document.getElementById('done');
        spinner_box.classList.add('none');
        done.classList.add('none');

        function tweet() {
            if (circle12.classList.contains('blue') == true) {
                var textarea = document.getElementById("textarea");
                console.log(textarea.value);
                window.open("https://twitter.com/intent/tweet?text=" + textarea.value);
            } else {}
            spinner_box.classList.add('none');
            done.classList.remove('none');
        }

        function click() {
            modal_wrapper.classList.add('center');
            setTimeout(tweet, 3000);
        }
        report_and_posting2_container.addEventListener('click', function() {
            click();
        });
        report_and_posting2_container.addEventListener('click', () => {
            modal_contents.classList.add('none');
            spinner_box.classList.remove('none');
            report_and_posting2_container.classList.add('none');
        });
        //カレンダー
        var study_day_record = document.getElementById('study_day_record');
        var fp = flatpickr(study_day_record, {
            enableTime: true,
            dateFormat: "Y-m-d", // フォーマットの変更
        });
        for (let i = 1; i < 13; i++) {
            document.getElementById(`circle${i}`).addEventListener('click', () => {
                document.getElementById(`circle${i}`).classList.toggle('blue')
            })
        }
    </script>
    <!-- <script src="js/script.js"></script> -->
    <!-- <script src="js/bar_chart.js"></script>
script src="js/doughnut_chart.js"></script>
script src="js/doughnut_chart2.js"></script> -->
