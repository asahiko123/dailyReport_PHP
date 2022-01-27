
console.log(searchlists);
console.log(staffs);
console.log(diffs);

const labels = [];
const times = [];


Object.keys(searchlists).forEach(key => {
    searchlists[key].forEach(el => {
        labels.push(el.work_div.work_type.work_type);
    })
});

Object.keys(diffs).forEach((key) => {
    diffs[key].forEach(el => {

        times.push(el.diff);
    })
})

console.log(times);

const info = {
    labels: [...(new Set(labels))],
    datasets: [{
    label: 'My First dataset',
    data: times,
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
            title: {
                display: true,
                text: 'Charts.js Doughnut'
            }
        }
    },
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
