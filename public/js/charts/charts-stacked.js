console.log(searchlists);
console.log(searchAll);
console.log(diffs);

/*
Charts.js用のパラメータを準備

types_stacked ...作業区分
result...作業区分と一致するデータのdiffを取得
timelist_stacked...resultで得られた配列それぞれの合計値を求める
*/


const staff_stacked = [...new Set(searchAll.map(x =>x.staff.name))];
const workType_stacked = [...new Set(searchAll.map(x => x.work_div.work_type.work_type))];
console.log(workType_stacked);
// const result_stacked = types_stacked.map(x => diffs.filter(y => y.workType == x).map(x => x.diff));
// const timelist_stacked = result_stacked.map(x => x.reduce((sum,current) => sum + current));



/*
Charts.jsの設定
*/

const info_stacked = {
    labels: staff_stacked,
    datasets: [
        {
        label: 'Dataset 1',
        data: [30, 28, 26, 35, 38, 40, 41, 28, 27, 30, 32, 31],
        borderWidth:1,
        backgroundColor: "#121554",
        borderColor: "#121554",
        },
        {
        label: 'Dataset 2',
        data: [15, 14, 13, 17, 19, 20, 25, 14, 13, 15, 16, 15],
        borderWidth:1,
        backgroundColor: "#1d3681",
        borderColor: "#1d3681",
        },
        {
        label: 'Dataset 3',
        data: [20, 20, 20, 20, 20, 20, 20, 20, 20, 20,20,20],
        borderWidth:1,
        backgroundColor: "#2e70a7",
        borderColor: "#2e70a7",
        },
    ]
};

const config_stacked = {
    type: 'bar',
    data: info_stacked,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Chart.js Bar Chart - Stacked'
            },
        },
        responsive: true,
        scales: {
            xAxes: [{
                stacked: true, //積み上げ棒グラフにする設定
                categoryPercentage:0.4 //棒グラフの太さ
            }],
            yAxes: [{
                stacked: true //積み上げ棒グラフにする設定
            }]
        }
    }
};

const myChart_stacked = new Chart(
    document.getElementById('myChart-stacked'),
    config_stacked
);
