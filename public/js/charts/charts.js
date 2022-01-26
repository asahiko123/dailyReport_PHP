
console.log(searchlists);
console.log(staffs);

const labels = [];

Object.keys(searchlists).forEach(key => {
    searchlists[key].forEach(el => {
        labels.push(el.staff.name);
    })
});

const info = {
    labels: [...(new Set(labels))],
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
