console.log(searchlists);
console.log(diffs);

/*
Charts.js用のパラメータを準備

types ...作業区分
result...作業区分と一致するデータのdiffを取得
timelist...resultで得られた配列それぞれの合計値を求める
*/

const labels = [];
const times = [];
const staff_name = [];


Object.keys(searchlists).forEach((keys)=>{
    searchlists[keys].forEach((el)=>{
        staff_name.push(el.staff.name);
    })
})

const chart_staff_name = [...new Set(staff_name)];
const types = [...new Set(diffs.map(x =>x.workType))];
const result = types.map(x => diffs.filter(y => y.workType == x).map(x => x.diff));
const timelist = result.map(x => x.reduce((sum,current) => sum + current));



/*
Charts.jsの設定
*/

const info = {
    labels: types,
    datasets: [{
    label: 'My First dataset',
    data: timelist,
    }]
};

const config = {
    type:'doughnut',
    data: info,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        },
        title: {
            display: true,
            text: chart_staff_name
        }
    },
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
