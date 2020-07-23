<!DOCTYPE html>
<html lang="en">
<head>
  <title>Covid-19 India</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Righteous&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="mdbootstrap/css/mdb.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/responsive.css">
  <script type="text/javascript" src="script.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-md blue-gradient shadow sticky-top">
		<a href="index.php" class="navbar-brand text-white ml-lg-5 font-weight-bold">COVID-19</a>
		<i class="fa fa-bars navbar-toggler text-white" data-target=".mobile_menu" data-toggle="collapse" style="font-size: 25px;"></i>
		<div class="collapse navbar-collapse mobile_menu">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item font-weight-bold mr-5"><a href="index.php" class="nav-link text-white">INDIA</a></li>
				<li class="nav-item  font-weight-bold  mr-5"><a href="assam.php" class="nav-link text-white">ASSAM</a></li>
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
		<div class="row  d-flex justify-content-center" >
			<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 ">
				<h4 class="font-weight-bold text-info">Confirmed
					<sup><i class="fa fa-info-circle fa_info" style="color: #00ccff" title="New Confirmed Cases : <?php echo $coronalive['statewise'][0]['deltaconfirmed'];?>"></i></sup>
				</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['confirmed'];?></h5>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show rounded shadow py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 " >
				<h4 class="font-weight-bold text-warning">Active</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['active'];?></h5>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show rounded shadow py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 " >
				<h4 class="font-weight-bold text-success">Recovered
					<sup><i class="fa fa-info-circle fa_info" style="color: #00cc66" title="New Recovered Cases : <?php echo $coronalive['statewise'][0]['deltarecovered'];?>"></i></sup>
				</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['recovered'];?></h5>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show rounded shadow py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 " >
				<h4 class="font-weight-bold text-danger">Deaths
					<sup><i class="fa fa-info-circle fa_info" style="color: #ff0000" title="New Deaths Cases : <?php echo $coronalive['statewise'][0]['deltadeaths'];?>"></i></sup>
				</h4>
				<h5 class="font-weight-bold"><?php echo $coronalive['statewise'][0]['deaths'];?></h5>
			</div>
		</div>
	
	</div>
	<!-- table -->

	<div class="container my-md-4 my-3">

		<div class="input-group mb-4 mx-auto">
		   <input class="form-control rounded-pill" id="tableSearch" type="search" placeholder="Type State Name">
		  
			<!-- <div class="input-group-append">
			<span class="input-group-text my-bg-1">
				<i class="fa fa-search text-white"></i>
				</span>
			</div> -->
		</div>

	  
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
						<sup><i class="fa fa-info-circle fa_info" style="color: #6D0EB1" title="Last Updated In : <?php echo $coronalive['statewise'][$i]['lastupdatedtime'];?>"></i></sup>
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

<div class="container my-lg-5 my-md-4 my-sm-3 my-3">
<canvas id="myChart"></canvas>
</div>
			
	</div>
	<div class="container-fluid blue-gradient text-white text-center p-3">
		<h6 class="">Developed By <span class="text-dark font-weight-bold text-capitalize">Nowgong Polytechnic CSE Depertment</span> </h6>
	</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".fa_info").tooltip({
				placement : 'right'
			});

		});




		//LINE CHART

var url = "https://api.covid19india.org/data.json";

$.getJSON(url, function (data) {
  console.log(data);

  var state = []
  var confirmed = []
  var recovered = []
  var death = []

  $.each(data.statewise, function (id, obj) {
    state.push(obj.state)
    confirmed.push(obj.confirmed)
    recovered.push(obj.recovered)
    death.push(obj.deaths)
  })


  state.shift();
  confirmed.shift();
  recovered.shift();
  death.shift();

  console.log(state)


  var myChart = document.getElementById("myChart").getContext("2d");
  var chart = new Chart(myChart, {
    type: 'line',


    data: {
      labels: state,
      datasets: [{
          label: "Confirmed Cases",
          data: confirmed,
          backgroundColor: "#fcb503",
          minBarLenth: 100
        },
        {
          label: "Recovered Cases",
          data: recovered,
          backgroundColor: "#03fc45",
          minBarLenth: 100
        },
        {
          label: "Deaths",
          data: death,
          backgroundColor: "#fc0303",
          minBarLenth: 100
        },

      ]
    },
    options: {}
  })


})

//LINE CHART 
	</script>
</body>
</html>


