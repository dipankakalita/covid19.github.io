<!DOCTYPE html>
<html lang="en">

<head>
	<title>Covid-19 Assam</title>
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
				<li class="font-weight-bold nav-item mr-5"><a href="index.php" class="nav-link text-white">INDIA</a>
				</li>
				<li class="nav-item mr-5 font-weight-bold"><a href="assam.php" class="nav-link text-white">ASSAM</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- header -->
	<h3 class="heading text-center pt-4 text-uppercase">Assam Covid-19 Report</h3>
	<?php

	$all = file_get_contents('https://api.covid19india.org/data.json');
	$allreport = json_decode($all,true);

	
	?>
	<!-- total show -->
	<div class="container-fluid text-center my-5">
		<div class="row  d-flex justify-content-center">

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInLeft">
				<h4 class="font-weight-bold text-info">Confirmed</h4>
				<h5 class="font-weight-bold"><?php echo $allreport['statewise'][13]['confirmed'];?></h5>
			</div>

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInDown">
				<h4 class="font-weight-bold text-warning">Active</h4>
				<h5 class="font-weight-bold"><?php echo $allreport['statewise'][13]['active'];?></h5>
			</div>

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInUp">
				<h4 class="font-weight-bold text-success">Recovered</h4>
				<h5 class="font-weight-bold"><?php echo $allreport['statewise'][13]['recovered'];?></h5>
			</div>

			<div
				class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 wow animated fadeInRight">
				<h4 class="font-weight-bold text-danger">Deaths</h4>
				<h5 class="font-weight-bold"><?php echo $allreport['statewise'][13]['deaths'];?></h5>
			</div>
		</div>
	</div>
	<!-- table -->
	<div class="input-group mb-4 mx-auto">
		<input class="form-control rounded-pill" id="tableSearch" type="search" placeholder="Type District Name">
	</div>
	<div class="container my-md-4 my-3">

		<div class="row">
			<div class="col-lg-8">
				<div class="table-responsive">
					<table class="table table-bordered w-100 table-striped">
						<thead class="my-bg-1 blue-gradient text-white border-0">
							<tr class="text-uppercase font-weight-bold">
								<th class="font-weight-bold">District</th>
								<th class="font-weight-bold">Confirmed</th>
								<th class="font-weight-bold">Active</th>
								<th class="font-weight-bold">Recovered</th>
								<th class="font-weight-bold">Deaths</th>
							</tr>
						</thead>
						<tbody id="myTable">

							<?php

		$data = file_get_contents('https://api.covid19india.org/state_district_wise.json');
		$coronalive = json_decode($data,true);

		// echo "<pre>";
		// print_r($coronalive);
		// echo "</pre>";

		// echo "<pre>";
		// print_r($coronalive['Assam']['districtData']);
		// echo "</pre>";



		$dis_name = array_keys($coronalive['Assam']['districtData']);
		$total_dis = count($dis_name);

		$i = 1;
		while ($i<$total_dis-1) {
		?>

							<tr class="hoverable">
								<td class="font-weight-bold"><?php echo $dis_name[$i];?></td>
								<td><?php echo $coronalive['Assam']['districtData'][$dis_name[$i]]['confirmed'];?></td>
								<td><?php echo $coronalive['Assam']['districtData'][$dis_name[$i]]['active'];?></td>
								<td><?php echo $coronalive['Assam']['districtData'][$dis_name[$i]]['recovered'];?></td>
								<td><?php echo $coronalive['Assam']['districtData'][$dis_name[$i]]['deceased'];?></td>
							</tr>

							<?php
			$i++;
		}

	    ?>

						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-4">
				<div style="position: sticky; top:50px;" class="wow animated zoomIn">
				<p class="h3 blue-gradient rounded-lg p-lg-2  text-uppercase text-center m-lg-2 m-md-2 m-2">Districtwise Data</p>

					<canvas class="chartcanvas rounded-lg shadow mt-lg-4 mt-md-4 mt-sm-4 mt-4"
						id="ConfirmedChart"></canvas>
					<canvas class="chartcanvas rounded-lg shadow mt-lg-4 mt-md-4 mt-sm-4 mt-4"
						id="ActiveChart"></canvas>
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

		//chart
		var apiurl = "https://api.covid19india.org/state_district_wise.json";
		$.getJSON(apiurl, function (data) {
			var districts = [];
			var state = [];
			var confirmed = [];
			var active = [];
			var recovered = [];
			var death = [];

			// console.log(data);
			$.each(data, function (id, value) {
				var keyid = "Assam";

				if (id == keyid) {

					for (let x in value) {
						if (x === "districtData") {
							delete value[x]['Airport Quarantine']
							delete value[x]['Unknown']

							for (let dist in value[x]) {

								districts.push(dist);
								confirmed.push(value[x][dist]['confirmed']);
								active.push(value[x][dist]['active']);
								recovered.push(value[x][dist]['recovered']);
								death.push(value[x][dist]['deceased']);
							}

						}
					}
				}



			});
			drawChart(districts, "ConfirmedChart", confirmed, "Confirmed Cases", "#fcb503");
			drawChart(districts, "ActiveChart", active, "Active Cases", "#0099ff");
			drawChart(districts, "RecoveredChart", recovered, "Recovered Cases", "#33cc33");
			drawChart(districts, "DeathChart", death, "Death Cases", "#ff3300");

		});
		//chart
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

	</script>
</body>

</html>
