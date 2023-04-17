<?php include_once('loginchk.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<script>
		$(document).ready(function() {
			$("#profile-tail").hide();
			$("#profile-icon").click(function() {
				$("#profile-tail").toggle();
			});
		});
	</script>
	<!--===============================================================================================-->
	<style>
		.jumbotron::after {
			content: '';
		}

		body {
			min-height: 100vh;
		}

		.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6 {
			line-height: 1.1;
		}

		#profile-tail::after {
			content: "";
			position: absolute;
			bottom: 100%;
			left: 53%;
			margin-left: -8px;
			border-width: 8px;
			border-style: solid;
			border-color: transparent transparent #666 transparent;
		}

		#profile-tail {
			position: absolute;
			display: inline-block;
			right: -41px;
			top: 55px;
			border: 1px solid #ddd;
			padding: 2px 10px;
			text-align: center;
			border-radius: 4px;
		}

		.dropdown-item:hover {
			background: #007bff;
			color: #fff;
		}

		.graph-section-heading {
			background: #0e5263;
			color: #fff;
			padding: 5px;
			margin-bottom: 45px;
			margin-top: 45px;
			font-size: 30px;
			box-shadow: 1px 2px 3px #111;
		}

		#graph-table1 tr td {
			font-weight: 900;
		}

		.graph-section {
			margin-top: 40px;
			margin-bottom: 80px;
		}
	</style>
</head>

<body>

	<?php include_once('header.php'); ?>
	<?php include_once('menubar.php'); ?>


	<div class="container ">
		<br>
		<br>
		<h4 class="text-center">National Council of Educational Research and Training (NCERT)</h4>
		<br><br>
		<p style="text-align: justify;">
			NCERT through its major constituents viz (i) National Institute of Education (NIE) New Delhi,
			(ii) Regional Institutes of Education located at Ajmer, Bhopal, Bhubaneswar, Mysuru and
			Umiam (Meghalaya), (iii) Central Institute of Educational Technology (CIET) New Delhi (iv) and
			Pandit Sundarlal Sharma Central Institute of Vocational Education (PSSCIVE) Bhopal identify
			educational needs, prepare project designs, conducts research, development, training and
			extension programs for the quality improvements in school education and teacher education.
		</p>
		<br>

		<p style="text-align: justify;">
			Planning and Monitoring Division (PMD) acts as a clearing house with respect to the academic
			programs/activities of the NCERT. The division is also responsible to collect necessary
			information regarding the PAC/PAB approved programs of NCERT periodically. The division is
			obliged to submit reports and reply to various queries to Ministry of Education. This portal is
			created with the objectives to ensure the effective monitoring of the programs, easy updating of
			the progress of programs and quick retrieval of essential information.
		</p>

		<h4 style="color: #1f5598d6; text-shadow: 0px 1px 1px #a6a6a6; margin-bottom: 15px; margin-top: 40px;">Programmes Details for the financial year 2020 - 21</h4>
		<table class="table" id="graph-table1">
			<tr>
				<td>Total programmes </td>
				<td>1048</td>
			</tr>
			<tr>
				<td>New Registered programmes </td>
				<td>1024</td>
			</tr>
			<tr>
				<td>Ongoing programmes </td>
				<td>12</td>
			</tr>
			<tr>
				<td>Carried over programmes </td>
				<td>12</td>
			</tr>
		</table>

		<div class="graph-section">
			<div class="row">
				<div class="col"><img src="./images/g1.png"></div>
				<div class="col"><img src="./images/g2.png"></div>
			</div>
		</div>
		<div class="graph-section">
			<div class="row">
				<div class="col"><img src="./images/g3.png" style="width:100%;"></div>
			</div>
		</div>
	</div>
	<?php include_once("footer.php") ?>
</body>
</html>