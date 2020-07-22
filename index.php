<!DOCTYPE html>
<html lang="en">
<head>
  <title>Covid-19 India</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/responsive.css">
  <script type="text/javascript" src="script.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Righteous&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-expand-md my-bg">
		<a href="index.php" class="navbar-brand text-white">COVID-19</a>
		<i class="fa fa-bars navbar-toggler text-white" data-target=".mobile_menu" data-toggle="collapse" style="font-size: 25px;"></i>
		<div class="collapse navbar-collapse mobile_menu">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item mr-5"><a href="index.php" class="nav-link text-white">INDIA</a></li>
				<li class="nav-item mr-5"><a href="assam.php" class="nav-link text-white">ASSAM</a></li>
			</ul>
		</div>
	</nav>

	<!-- header -->
	<h3 class="heading text-center pt-4">India Covid-19 Report</h3>

	<?php

	$data = file_get_contents('https://api.covid19india.org/data.json');
	$coronalive = json_decode($data,true);

	?>
	<!-- total show -->
	<div class="container my-5 d-flex text-center justify-content-around ">
		<div class="border total_show rounded py-sm-3 py-2 px-sm-5 px-2">
			<h4 class="">Confirmed
				<sup><i class="fa fa-info-circle fa_info" style="color: #6D0EB1" title="New Confirmed Cases : <?php echo $coronalive['statewise'][0]['deltaconfirmed'];?>"></i></sup>
			</h4>
			<h5 class=""><?php echo $coronalive['statewise'][0]['confirmed'];?></h5>
		</div>

		<div class="border total_show rounded py-sm-3 py-2 px-sm-5 px-2">
			<h4 class="">Active</h4>
			<h5 class=""><?php echo $coronalive['statewise'][0]['active'];?></h5>
		</div>

		<div class="border total_show rounded py-sm-3 py-2 px-sm-5 px-2">
			<h4 class="">Recovered
				<sup><i class="fa fa-info-circle fa_info" style="color: #6D0EB1" title="New Recovered Cases : <?php echo $coronalive['statewise'][0]['deltarecovered'];?>"></i></sup>
			</h4>
			<h5 class=""><?php echo $coronalive['statewise'][0]['recovered'];?></h5>
		</div>

		<div class="border total_show rounded py-sm-3 py-2 px-sm-5 px-2">
			<h4 class="">Deaths
				<sup><i class="fa fa-info-circle fa_info" style="color: #6D0EB1" title="New Deaths Cases : <?php echo $coronalive['statewise'][0]['deltadeaths'];?>"></i></sup>
			</h4>
			<h5 class=""><?php echo $coronalive['statewise'][0]['deaths'];?></h5>
		</div>
	</div>
	<!-- table -->

	<div class="container my-md-4 my-3">

		<div class="input-group mb-4">
		   <input class="form-control" id="tableSearch" type="search" placeholder="Type State Name">
			<div class="input-group-append">
				<span class="input-group-text my-bg-1">
				<i class="fa fa-search text-white"></i>
				</span>
			</div>
		</div>

	  
	<div class="table-responsive">
	  <table class="table table-bordered w-100">
	    <thead class="my-bg-1 text-white border-0">
	      <tr>
	        <th>State</th>
	        <th>Confirmed</th>
	        <th>Active</th>
	        <th>Recovered</th>
	        <th>Deaths</th>
	      </tr>
	    </thead>
	    <tbody id="myTable">

		<?php

		// echo "<pre>";
		// print_r($coronalive);
		// echo "</pre>";
		//echo $coronalive['statewise'][1]['state'];
		$total_state = count($coronalive['statewise']);

		$i = 1;
		while ($i<$total_state) {
		?>

		<tr>
	        <td><?php echo $coronalive['statewise'][$i]['state'];?>
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
	</div>
	<div class="container-fluid my-bg text-white text-center p-3">
		<h6 class="">Developed By <span class="text-warning">NOWGONG POLYTECHNIC Compute Engineering</span> Depertment</h6>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".fa_info").tooltip({
				placement : 'right'
			});

		});
	</script>
</body>
</html>


