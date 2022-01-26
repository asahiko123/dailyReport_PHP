
console.log(searchlists);
console.log(staffs);

Object.keys(searchlists).forEach(key => {
    searchlists[key].forEach(el => {
        console.log(el.staff_id);
    })
});



const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];

const DATA_COUNT = 5;
const NUMBER_CFG = {count : DATA_COUNT,min :0,max :100};

const info = {
    labels: labels,
    datasets: [{
    label: 'My First dataset',
    data: [0, 10, 5, 2, 20, 30, 45],
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
