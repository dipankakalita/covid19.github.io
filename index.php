<!DOCTYPE html>
<html lang="en">

<head>
	<title>Covid-19 India</title>
	<link rel="shortcut icon" href="icon/192px.png" type="image/x-icon">
	<!-- <link rel="manifest" href="manifest.json"> -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="theme-color" content="#004080"> -->
	<link rel="apple-touch-icon" href="icon/192px.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Righteous&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="mdbootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="mdbootstrap/css/mdb.min.css">
	<script src="mdbootstrap/js/jquery.min.js"></script>
	<script src="mdbootstrap/js/popper.min.js"></script>
	<script src="mdbootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script type="text/javascript" src="script.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-md blue-gradient shadow sticky-top">
		<a href="index.php" class="navbar-brand text-white ml-lg-5 font-weight-bold">COVID-19</a>
		<i class="fa fa-bars navbar-toggler text-white" data-target=".mobile_menu" data-toggle="collapse"
			style="font-size: 25px;"></i>
		<div class="collapse navbar-collapse mobile_menu">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item font-weight-bold mr-5"><a href="index.php" class="nav-link text-white">INDIA</a>
				</li>
				<li class="nav-item  font-weight-bold  mr-5"><a href="assam.php" class="nav-link text-white">ASSAM</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- header -->
	<h3 class="heading text-center pt-4 text-uppercase">India Covid-19 Report</h3>

	<?php

	$data = file_get_contents('https://api.covid19india.org/data.json');
	$coronalive = json_decode($data,true);

	// print_r($coronalive);
	?>


	<!-- total show -->
	<div class="container-fluid text-center my-5">
		<div class="row  d-flex justify-content-center">
			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInLeft">
				<h4 class="font-weight-bold text-info">Confirmed
					<sup><i class="fa fa-info-circle fa_info" style="color: #00ccff"
							title="New Confirmed Cases : <?php echo $coronalive['statewise'][0]['deltaconfirmed'];?>"></i></sup>
				</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['confirmed'];?></h5>
			</div>

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show rounded shadow py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInDown">
				<h4 class="font-weight-bold text-warning">Active</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['active'];?></h5>
			</div>

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show rounded shadow py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInUp">
				<h4 class="font-weight-bold text-success">Recovered
					<sup><i class="fa fa-info-circle fa_info" style="color: #00cc66"
							title="New Recovered Cases : <?php echo $coronalive['statewise'][0]['deltarecovered'];?>"></i></sup>
				</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['recovered'];?></h5>
			</div>

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show rounded shadow py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInRight">
				<h4 class="font-weight-bold text-danger">Deaths
					<sup><i class="fa fa-info-circle fa_info" style="color: #ff0000"
							title="New Deaths Cases : <?php echo $coronalive['statewise'][0]['deltadeaths'];?>"></i></sup>
				</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['deaths'];?></h5>
			</div>
		</div>

	</div>
	<!-- table -->

	<div class="input-group mb-4 mx-auto">
		<input class="form-control rounded-pill" id="tableSearch" type="search" placeholder="Type State Name">
	</div>

	<div class="container my-md-4 my-3  ">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="table-responsive">
					<table class="table table-bordered w-100 table-striped">
						<thead class="my-bg-1 blue-gradient text-white border-0">
							<tr class="text-uppercase font-weight-bold">
								<th class="font-weight-bold">State</th>
								<th class="font-weight-bold">Confirmed</th>
								<th class="font-weight-bold">Active</th>
								<th class="font-weight-bold">Recovered</th>
								<th class="font-weight-bold">Deaths</th>
							</tr>
						</thead>
						<tbody id="myTable">

							<?php

				// echo "<pre>";
				// print_r($coronalive);
				// echo "</pre>";
				// echo $coronalive['statewise'][1]['state'];
				$total_state = count($coronalive['statewise']);

				$i = 1;
				while ($i<$total_state) {

				?>

							<tr class="hoverable">
								<td class="font-weight-bold"><?php echo $coronalive['statewise'][$i]['state'];?>
									<sup><i class="fa fa-info-circle fa_info" style="color: #6D0EB1"
											title="Last Updated In : <?php echo $coronalive['statewise'][$i]['lastupdatedtime'];?>"></i></sup>
								</td>
								<td><?php echo $coronalive['statewise'][$i]['confirmed'];?></td>
								<td><?php echo $coronalive['statewise'][$i]['active'];?></td>
								<td><?php echo $coronalive['statewise'][$i]['recovered'];?></td>
								<td><?php echo $coronalive['statewise'][$i]['deaths'];?></td>
							</tr>

							<?php
					$i++;
				}

				?>

						</tbody>
					</table>
				</div>

			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="position: sticky; top:50px;" class="wow animated zoomIn">
					<p class="h3 blue-gradient rounded-lg p-lg-2  text-uppercase text-center m-lg-2 m-md-2 m-2">Statewise Daily Data</p>

					<select class="browser-default custom-select justify-content-center" id="locality-dropdown"
						name="locality"></select>
					<canvas class="chartcanvas rounded-lg shadow mt-lg-4 mt-md-4 mt-sm-4 mt-4"
						id="ConfirmedChart"></canvas>
					<!-- <canvas id="ActiveChart"></canvas> -->
					<canvas class="chartcanvas shadow rounded-lg mt-lg-4 mt-md-4 mt-sm-4 mt-4"
						id="RecoveredChart"></canvas>
					<canvas class="chartcanvas shadow rounded-lg mt-lg-4 mt-md-4 mt-sm-4 mt-4" id="DeathChart"></canvas>
				</div>

			</div>
		</div>
	</div>


	<div class="container-fluid blue-gradient text-white text-center p-3">
		<h6 class="">Developed By <span class="text-dark font-weight-bold text-capitalize">Nowgong Polytechnic CSE
				Department</span> </h6>
	</div>







	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".fa_info").tooltip({
				placement: 'right'
			});

		});
		// console.clear();

		//disable right click
		var message = "Function Disabled!";
		///////////////////////////////////
		function clickIE4() {
			if (event.button == 2) {
				alert(message);
				return false;
			}
		}

		function clickNS4(e) {
			if (document.layers || document.getElementById && !document.all) {
				if (e.which == 2 || e.which == 3) {
					alert(message);
					return false;
				}
			}
		}
		if (document.layers) {
			document.captureEvents(Event.MOUSEDOWN);
			document.onmousedown = clickNS4;
		} else if (document.all && !document.getElementById) {
			document.onmousedown = clickIE4;
		}
		document.oncontextmenu = new Function("alert(message);return false")
		// ->
		//disable right click



		// API URL
		var url = "https://api.covid19india.org/data.json";
		//API URL
		// SELECT OPTION
		let dropdown = $('#locality-dropdown');
		dropdown.empty();
		dropdown.append('<option selected="true" value="TT">Total</option>');
		dropdown.prop('selectedIndex', 0);
		// Populate dropdown with list of provinces
		$.getJSON(url, function (data) {
			// console.log(data);

			$.each(data.statewise, function (key, entry) {

				dropdown.append($('<option></option>').attr('value', entry.statecode).text(entry.state));
			});
			//default selected
			var selectedvalue = $('#locality-dropdown').val();
			const apiurl = 'https://api.covid19india.org/states_daily.json';
			$.getJSON(apiurl, function (data) {
				var dateArray = [];
				// var dailycase =[];
				var confirmed = [];
				// var active=[];
				var recovered = [];
				var death = [];

				$.each(data.states_daily, function (id, value) {
					var keyid = selectedvalue.toLowerCase();
					// console.log(keyid, value[keyid]);
					for (let x in value) {
						if (dateArray.indexOf(value['date']) === -1) {
							dateArray.push(value['date']);
						}
						if (x === keyid) {
							// console.log(x, value[x], value['date']);

							if (value.status == "Confirmed") {
								confirmed.push(value[keyid]);
							}

							if (value.status == "Recovered") {
								recovered.push(value[keyid]);
							}
							if (value.status == "Deceased") {
								death.push(value[keyid]);
							}
						}
					}
				});
				// console.log(dateArray);
				// console.log(data);
				// console.log(confirmed);
				drawChart(dateArray, "ConfirmedChart", confirmed, "Confirmed Cases", "#fcb503");
				drawChart(dateArray, "RecoveredChart", recovered, "Recovered Cases", "#33cc33");
				drawChart(dateArray, "DeathChart", death, "Death Cases", "#ff3300");

			});
			//default selected
		});



		// SELECT OPTION

		//LINE CHART
		$('#locality-dropdown').on('change', function () {
			// console.log($(this).val());
			selectedvalue = $(this).val();
			const apiurl = 'https://api.covid19india.org/states_daily.json';
			$.getJSON(apiurl, function (data) {
				var dateArray = [];
				// var dailycase =[];
				var confirmed = [];
				// var active=[];
				var recovered = [];
				var death = [];

				$.each(data.states_daily, function (id, value) {
					var keyid = selectedvalue.toLowerCase();
					// console.log(keyid, value[keyid]);
					for (let x in value) {
						if (dateArray.indexOf(value['date']) === -1) {
							dateArray.push(value['date']);
						}
						if (x === keyid) {
							// console.log(x, value[x], value['date']);

							if (value.status == "Confirmed") {
								confirmed.push(value[keyid]);
							}

							if (value.status == "Recovered") {
								recovered.push(value[keyid]);
							}
							if (value.status == "Deceased") {
								death.push(value[keyid]);
							}
						}
					}
				});
				// console.log(dateArray);
				// console.log(data);
				// console.log(confirmed);
				drawChart(dateArray, "ConfirmedChart", confirmed, "Confirmed Cases", "#fcb503");
				drawChart(dateArray, "RecoveredChart", recovered, "Recovered Cases", "#33cc33");
				drawChart(dateArray, "DeathChart", death, "Death Cases", "#ff3300");

			});
		});


		function drawChart(labelArray, chartType, chartData, chartLabel, bgcolor) {
			var ConfirmedChart = document.getElementById(chartType).getContext("2d");
			var confirmchart = new Chart(ConfirmedChart, {
				type: 'line',
				data: {
					labels: labelArray,
					datasets: [{
							label: chartLabel,
							data: chartData,
							backgroundColor: bgcolor,
							// minBarLenth: 100
						}

					]
				},
				options: {}
			});
		}

		//LINE CHART 

	</script>
</body>

</html>
