<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <style>
  .jumbotron::after{
  	content: '';
  }
  body{
  	min-height: 100vh;
  }
  </style>
</head>
<body>

<script language="Javascript" src="js/md5.js"></script>
<script language="Javascript">
//history.go(1); // disable the browser's back button
</script>

<?php include_once('header.php'); ?>

<div class="container" style="border-bottom:1px solid #ddd; padding: 0;">
	<nav class="navbar navbar-expand-sm bg-light">
		<!-- Links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#">Home</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Initialization</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Add/Edit User</a>
				<a class="dropdown-item" href="#">Add/Edit Department</a>
			</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Program</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Report</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Profile</a>
			</li>
			
		</ul>
		<ul class="navbar-nav ml-auto mr-1">
			<li class="nav-item">
				<a class="nav-link" href="#">Logout</a>
			</li>
		</ul>
		<!-- Brand/logo -->
		<a class="navbar-brand" href="#">
			<img src="bird.jpg" alt="logo" style="width:40px;">
		</a>
	</nav>
</div>
<div class="container p-l-0 p-t-3" style="justify-content: center; float: none; color: #000;">
	<h6>Welcome Ajay Verma, PMD, NCERT</h6>
</div>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
	<h4 style="color: #1f5598d6; text-shadow: 0px 1px 1px #a6a6a6; margin-bottom: 8px">Planning & Monitoring Division (PMD)</h4>
	<p style="text-align: justify;">
	The Planning and Monitoring Division (PMD) was created with the purpose of coordinating the process of programme formulation, monitoring, evaluation and submitting periodic reports of programmes to the MHRD. It acts as a clearing house in respect to the academic programmes/activities of NCERT and evaluates all Programme Advisory Committee (PAC) approved programmes. It bears the responsibility of designing pertinent strategies of the Council and issue proper guidelines for the implementation of its various programmes. To achieve its objectives, PMD issues guidelines, prepares various documents for dissemination of information, monitors the progress of programmes approved by Programme Advisory Committee (PAC).
	</p>
	<p style="text-align: justify;">
	Apart from regular activities, PMD is also engaged in carrying out research, development, training and extension programmes in the areas of project planning, implementation, monitoring, and evaluation. The Division has undertaken research studies on the functioning of DIETs, case studies of MCD schools in Delhi and is presently conducting research study on ‘no detention policy’. The development and the training programmes of the division concentrate on improving the efficiency of DIET faculty in the area of project planning, implementation, monitoring and evaluation. The Division also has been organising courses for post graduate teachers/lecturers in economics on blended mode (face-to-face and online). Teachers from various States/UTs namely, Jammu and Kashmir, Rajasthan, Haryana, Himachal Pradesh, Uttarakhand, Punjab, Sikkim, Chhattisgarh, Jharkhand and Madhya Pradesh have benefitted from such programme. The Division is in the process of converting the course into MOOC platform.
	</p>
	<p style="text-align: justify;">
	The Planning and Monitoring Division (PMD) was created with the purpose of coordinating the process of programme formulation, monitoring, evaluation and submitting periodic reports of programmes to the MHRD. It acts as a clearing house in respect to the academic programmes/activities of NCERT and evaluates all Programme Advisory Committee (PAC) approved programmes. It bears the responsibility of designing pertinent strategies of the Council and issue proper guidelines for the implementation of its various programmes. To achieve its objectives, PMD issues guidelines, prepares various documents for dissemination of information, monitors the progress of programmes approved by Programme Advisory Committee (PAC).
	</p>

<!-- 	<h5 align="center"><u>Overall status of financial year: 2020-21</u></h5>
	<table class="table table-hover" style="max-width: 540px; margin: auto;">
		<thead class="thead-dark">
			<tr>
				<th>Programmes</th>
				<th>New</th>
				<th>Ongoing</th>
				<th>Carried over</th>
				<th>Total</th>
				<th>Budget Proposed</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Research</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
			</tr>
			<tr>
				<td>Development</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
			</tr>
			<tr>
				<td>Training</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
			</tr>
			<tr>
				<td>Extention</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
			</tr>
			<tr>
				<td>Others</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
				<td>11</td>
			</tr>
			<tr class="bg-dark text-white">
				<td>Total</td>
				<td>110</td>
				<td>110</td>
				<td>110</td>
				<td>110</td>
				<td>110</td>
			</tr>
		</tbody>
	</table> -->

</div>


<?php include_once("footer.php") ?>

</body>
</html>
