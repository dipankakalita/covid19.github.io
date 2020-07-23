<!DOCTYPE html>
<html lang="en">
<head>
  <title>Covid-19 Assam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Righteous&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="mdbootstrap/css/mdb.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
				<li class="font-weight-bold nav-item mr-5"><a href="index.php" class="nav-link text-white">INDIA</a></li>
				<li class="nav-item mr-5 font-weight-bold"><a href="assam.php" class="nav-link text-white">ASSAM</a></li>
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
	<div class="row  d-flex justify-content-center" >

		<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 ">
			<h4 class="font-weight-bold text-info">Confirmed</h4>
			<h5 class="font-weight-bold"><?php echo $allreport['statewise'][14]['confirmed'];?></h5>
		</div>

		<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 ">
			<h4 class="font-weight-bold text-warning">Active</h4>
			<h5 class="font-weight-bold"><?php echo $allreport['statewise'][14]['active'];?></h5>
		</div>

		<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 ">
			<h4 class="font-weight-bold text-success">Recovered</h4>
			<h5 class="font-weight-bold"><?php echo $allreport['statewise'][14]['recovered'];?></h5>
		</div>

		<div class="col-lg-2 col-md-4 col-sm-4 col-4 total_show shadow rounded py-sm-3 py-2 px-sm-3 px-2 mx-lg-4 mx-sm-3 mx-3 my-sm-2 my-2 ">
			<h4 class="font-weight-bold text-danger">Deaths</h4>
			<h5 class="font-weight-bold"><?php echo $allreport['statewise'][14]['deaths'];?></h5>
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
	      <tr  class="text-uppercase font-weight-bold">
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
		while ($i<$total_dis) {
		?>

		<tr>
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
	<div class="container-fluid blue-gradient text-white text-center p-3">
		<h6 class="">Developed By <span class="text-dark font-weight-bold text-capitalize">Nowgong Polytechnic CSE Depertment</span> </h6>
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


