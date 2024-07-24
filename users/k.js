document.addEventListener('DOMContentLoaded', (event) => {
    var ctx1 = document.getElementById('tasksChart').getContext('2d');
    var tasksChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Completed', 'On Hold', 'On Progress', 'Pending'],
            datasets: [{
                label: 'Tasks',
                data: [32, 25, 25, 18],
                backgroundColor: ['#28a745', '#ffc107', '#007bff', '#dc3545'],
            }]
        },
        options: {
            responsive: true
        }
    });

    var ctx2 = document.getElementById('workLogChart').getContext('2d');
    var workLogChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5'],
            datasets: [{
                label: 'Work Log',
                data: [20, 30, 20, 15, 15],
                backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'],
            }]
        },
        options: {
            responsive: true
        }
    });

    var ctx3 = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['Oct 2021', 'Nov 2021', 'Dec 2021', 'Jan 2022', 'Feb 2022', 'Mar 2022'],
            datasets: [
                {
                    label: 'Achieved',
                    data: [10, 9, 11, 12, 10, 11],
                    borderColor: '#007bff',
                    fill: false
                },
                {
                    label: 'Target',
                    data: [12, 11, 12, 12, 11, 12],
                    borderColor: '#dc3545',
                    fill: false
                }
            ]
        },
        options: {
            responsive: true
        }
    });
});
