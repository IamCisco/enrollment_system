
$(document).ready(function () {
    
    USER.checkSession();
    ENROLLEE_STATISTICS.getEnrolleeStats();
    
});

let ENROLLEE_STATISTICS = {

    
    getEnrolleeStats: function () {
        $.ajax({
            url: "../data/EnrolleeData.php?action=getEnrolleeStats",
            dataType: "json",
            assync: false,
            success: function (result) {
				var barChartData = {
					labels: result.year,
					datasets: [{
						label: 'Total Count',
						backgroundColor: "#3D8EB9",
						borderColor: "#3D8EB9",
						borderWidth: 1,
						data: result.total_count
					}, {
						label: 'Total Accepted',
						backgroundColor: "#7CEECE",
						borderColor: "#7CEECE",
						borderWidth: 1,
						data: result.total_accepted
					}, {
						label: 'Total Rejected',
						backgroundColor: "#EB6361",
						borderColor: "#EB6361",
						borderWidth: 1,
						data: result.total_rejected
					}, {
						label: 'Total Passed',
						backgroundColor: "#897FBA",
						borderColor: "#897FBA",
						borderWidth: 1,
						data: result.total_passed
					}, {
						label: 'Total Failed',
						backgroundColor: "#E01931",
						borderColor: "#E01931",
						borderWidth: 1,
						data: result.total_failed
					}]
		
				};
				var ctx = document.getElementById('cnv_enrollee_stats').getContext('2d');
				window.myBar = new Chart(ctx, {
					type: 'bar',
					data: barChartData,
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						},
						responsive: true,
						plugins: {
							legend: {
								position: 'top',
							},
							title: {
								display: true,
								text: 'Chart.js Bar Chart'
							}
						}
					}
				});
            }
        });
    },
} 