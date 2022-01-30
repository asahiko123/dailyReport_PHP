/*
Charts.js用のパラメータを準備
*/


const staff_stacked = [...new Set(searchAll.map(x =>x.staff.name))];
const workType_stacked = [...new Set(searchAll.map(x => x.work_div.work_type.work_type))];


const groupByworkType = diffAll.reduce((result,current) =>{
    if(!result.hasOwnProperty(current.workType)){
        result[current.workType]={};
    }
    result[current.workType][current.staff] =current.diff;

    return result;
},{});



const datasets = workType_stacked.map(value => {
    
    return {
        label:value,
        data: staff_stacked.map(x => groupByworkType[value][x])
    }
});


/*
Charts.jsの設定
*/

const info_stacked = {
    labels: staff_stacked,
    datasets: datasets
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
