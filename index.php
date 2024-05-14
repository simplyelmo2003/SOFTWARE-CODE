<?php
	session_start();
	include('timestamp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>QR Code Based AMS</title>
	<link rel="icon" href="/MONITORING SYSTEM/image/POLICE LOGO.png" type="image/icon">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="/MONITORING SYSTEM/bootstrap.min.css">
  	<link rel="stylesheet" href="/MONITORING SYSTEM/css/w3.css">
	<link rel="stylesheet" href="/MONITORING SYSTEM/css/font.css">
  	<script src="/MONITORING SYSTEM/instascan.min.js"></script>
  	<script src="/MONITORING SYSTEM/jquery.min.js"></script>
  	<script src="/MONITORING SYSTEM/popper.min.js"></script>
  	<script src="/MONITORING SYSTEM/bootstrap.min.js"></script>

  	<style>
		body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
	</style>


</head>
<body class="w3-light-grey">
<div class="w3-content" style="max-width:1400px">
	

	<!-- Header -->
	<header class="w3-container w3-center w3-padding-8"> 
	  <h1><b>QR CODE BASED ATTENDANCE MONITORING SYSTEM</b></h1>
	  <p>Welcome <span class="w3-tag">TEAM SURFERS</span> , kindly LOG your ATTENDANCE!</p><hr>
	</header> 

	<div class="container-fluid" style="margin-right: 10px">
	  	<h3 class="text-center"><span class="w3-tag"><?php include('time.php'); ?></span></h3>
	</div><br>

	<div class="w3-row">
		<div class="w3-container w3-twothird">
			<div class="w3-margin">
				<div class="w3-container col form-group">
					<div class="text-left">
						<button type="button" class="btn btn-info"><b><i><?php echo $button_name; ?></i></b></button>
					</div>
					<br>
					<div class="container text-left">
						<form action="save_post.php" method="POST" class="form-group">
							<label>Scan QR Code for your attendance!</label>
							<input type="hidden" name="qrvalue" id="qrvalue" class="form-control form-control-lg text-center" placeholder="Scan Qr Code">
						</form>
					</div>


					<div class="table-responsive" id="document">

						<?php

							if (isset($_SESSION['att_success']) && $_SESSION['att_success'] != '') {
								// code...

								$con = mysqli_connect("localhost","root","","ams_db") or die("Error " . mysqli_error($con));
								$currdate = date("y-m-d");
								//$curtime = date("h:i:s:a");
								$query = "SELECT * FROM tbl_attendance WHERE date='$currdate'";
								$query_run = mysqli_query($con, $query);

							

						?>

						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Employee ID</th>
									<th>Date</th>
									<th>Login</th>
									<th>Break Out</th>
									<th>Break In</th>
									<th>Log out</th>
								</tr>
							</thead>
							<tbody>

								<?php

									if (mysqli_num_rows($query_run) > 0) {
										// code...
										while ($row = mysqli_fetch_assoc($query_run)) {
											// code...

								?>

								<tr>
									<td><?php echo $row['emp_id']; ?></td>
									<td><?php echo $row['date']; ?></td>
									<td><?php echo $row['log_in']; ?></td>
									<td><?php echo $row['break_out']; ?></td>
									<td><?php echo $row['break_in']; ?></td>
									<td><?php echo $row['log_out']; ?></td>
								</tr>

								<?php
										}
									}
									else {
										echo "No data found!";
									} 

								} 
								?>

							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	

		<div class="w3-container w3-third">
			<div class="w3-margin w3-margin-top">
				<div class="w3-container">
					<video id="preview" width="100%"></video>
				</div>
			</div>
		</div>
	</div>
</div>


	<script src="/MONITORING SYSTEM/instascan.min.js"></script>
	<script type="text/javascript">
		let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
		Instascan.Camera.getCameras().then(function (cameras) {
			if (cameras.length > 0) {
				scanner.start(cameras[0]);
			} else {
				alert('No camera found.');
			}
		}).catch(function (e) {
			console.error(e);
		});

		scanner.addListener('scan', function(c){
			document.getElementById('qrvalue').value=c;
			document.forms[0].submit();
		});

	</script>




</body>
</html>