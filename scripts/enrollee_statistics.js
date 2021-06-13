
$(document).ready(function () {
    
    USER.checkSession();
	ENROLLEE_STATISTICS.getPrograms();
    
	$('#frm_search_stats').submit(function(event) {
        event.preventDefault();
        ENROLLEE_STATISTICS.getEnrolleeStats(this);
    });
    
});

let ENROLLEE_STATISTICS = {

    
    getEnrolleeStats: function (_this) {
        $.ajax({
            url: "../data/EnrolleeData.php?action=getEnrolleeStats",
            type: "post",
            data: new FormData( _this ),
            processData: false,
            contentType: false,
            dataType: "json",
            assync : false, 
            success: function (result) {
				if(window.myBar){
					window.myBar.destroy();
				}
				
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
								text: 'Enrollee Statistics per Year'
							}
						}
					}
				});
				document.getElementById("cnv_enrollee_stats").onclick = function (evt) {
					var activePoints = window.myBar.getElementsAtEvent(evt);
					var firstPoint = activePoints[0];
					//alert(firstPoint);
					
					if (firstPoint !== undefined) {
						year = window.myBar.data.labels[firstPoint._index];
						
						// console.log(label)
						
   						ENROLLEE_STATISTICS.getEnrolleesPassed(year);
						
					}
				};
				
            }
        });
	},
	getEnrolleesPassed: function (year) {
		var program = $("#txt_program").val();
        $.ajax({
            url: "../data/EnrolleeData.php?action=getEnrolleeScores",
			dataType: "json",
			type : 'POST',
			data : {
				year : year,
				program : program
			},
            assync: false,
            success: function (result) {
				
				rowCount = $('#tbl_enrollee_passed_body tr').length;

                if(rowCount > 0)
                {
                    $('#tbl_enrollee_passed').DataTable().destroy();
                }
				row = '';
				for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                    <tr>
                   		<td><a href="../assets/img/enrollees/${data.image}" target="_blank"><img src="../assets/img/students/${data.image}" alt="Avatar" class="avatar"></a></td>
                        <td>${data.name}</td>
                        <td>${data.address}</td>
                        <td>${data.email}</td>
                        <td>${data.phone_number}</td>
                        <td>${data.program}</td>
                        <td>${data.exam_result}</td>
                        <td>${data.remarks}</td>
                    </tr>
                    `;
                }
				
                $("#tbl_enrollee_passed_body").html(row);
                $('#tbl_enrollee_passed').DataTable( {
					dom: 'Bfrtip',
					buttons: [
						{
							extend: 'csv',
							sheetName: 'Exported data'
						}
					],
					"autoWidth": false
				} );
				$('#modal_enrollee_passed').modal()
				
            }
        });
    },
	getPrograms: function () {
        $.ajax({
            url: "../data/ProgramData.php?action=getPrograms",
            dataType: "json",
            success: function (result) {
                var row = `
					<option value="" disabled selected>Please select a program to filter</option>
					<option value="0" >All</option>
					`;

                for (var x = 0; x < result.length; x++) {
                    data = result[x];
                    row += `
                        <option value="${data["abbreviation"]}">${data["program"]}</option>
                    `;
                }
                $("#txt_program").html(row);
            }
        });
    },
}