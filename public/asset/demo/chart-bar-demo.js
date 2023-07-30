// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
	type: "bar",
	data: {
		labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September", "Oktober", "November", "Desember"],
		datasets: [
			{
				label: "Total Pendapatan",
				backgroundColor: "rgba(2,117,216,1)",
				borderColor: "rgba(2,117,216,1)",
				data: [],
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					time: {
						unit: "month",
					},
					gridLines: {
						display: false,
					},
					ticks: {
						maxTicksLimit: 12,
					},
				},
			],
			yAxes: [
				{
					ticks: {
						min: 0,
						max: 100000,
						maxTicksLimit: 20,
					},
					gridLines: {
						display: true,
					},
				},
			],
		},
		legend: {
			display: false,
		},
	},
});
