var ctx = document.getElementById('salesChart').getContext('2d');
var salesData = <?php echo json_encode($salesByUser); ?>;

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: Object.keys(salesData),
        datasets: [{
            label: 'Total Sales',
            data: Object.values(salesData),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});