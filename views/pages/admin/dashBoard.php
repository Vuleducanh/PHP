
    <div id="content" style="background-color: white">
        <div style="width: 100%; margin-top: 50px;">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('http://localhost:8080/spring-mvc/api/dashboard')
            .then(response => response.json())
            .then(data => {
                var monthLabels = data.map(item => item.Month);
                var revenueData = data.map(item => item.Scale);

                var ctx = document.getElementById('revenueChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: monthLabels,
                        datasets: [{
                            label: 'Tăng giảm doanh thu',
                            data: revenueData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 1,
                            fill: true
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });
            })
            .catch(console.error('Error:', error));
    });
    </script>
