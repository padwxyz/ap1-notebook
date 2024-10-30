document.addEventListener('DOMContentLoaded', function () {
    // // Earnings Overview Chart
    // const ctxEarnings = document.getElementById('earningsChart').getContext('2d');
    // const earningsChart = new Chart(ctxEarnings, {
    //     type: 'line',
    //     data: {
    //         labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    //         datasets: [{
    //             label: 'Activity',
    //             data: [1, 2, 3, 4, 5, 6, 7],
    //             backgroundColor: 'rgba(54, 162, 235, 0.2)',
    //             borderColor: 'rgba(54, 162, 235, 1)',
    //             borderWidth: 2,
    //             fill: true,
    //             pointBackgroundColor: 'rgba(54, 162, 235, 1)',
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         scales: {
    //             y: {
    //                 beginAtZero: true,
    //                 ticks: {
    //                     callback: function(value) {
    //                         return value.toLocaleString();
    //                     }
    //                 }
    //             }
    //         },
    //         plugins: {
    //             legend: {
    //                 display: false
    //             }
    //         }
    //     }
    // });

    // Revenue Sources Chart
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctxRevenue, {
        type: 'doughnut',
        data: {
            labels: ['To Do', 'Pending', 'In Progress', 'Done', 'Cancel'],
            datasets: [{
                label: 'Activity Range',
                data: [18, 18, 18, 18, 18],
                backgroundColor: [
                    'gray',
                    'yellow',
                    'blue',
                    'green',
                    'red'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
});