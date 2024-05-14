<?php
session_start();
include('timestamp.php');

$con = mysqli_connect("localhost","root","","ams_db") or die("Error " . mysqli_error($con));

if (isset($_POST['qrvalue'])) {

	$qrvalue = $_POST['qrvalue'];
	date_default_timezone_set("Singapore");
	$date = date("y-m-d");
	$curtime = date("h:i:s:a");

	$sql = "SELECT * FROM tbl_employee WHERE qr_code = '$qrvalue'"; 
	$sql_run = mysqli_query($con, $sql);


	if (mysqli_fetch_array($sql_run) && $button_name == "Log In") {
		// code...

		$query = "INSERT INTO tbl_attendance (emp_id, date, log_in, break_out, break_in, log_out) VALUES ('$qrvalue', '$date', '$curtime', '00:00:00', '00:00:00', '00:00:00')";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['att_success'] = $qrvalue . '<br>' . "Your attendance was logged at   " . $curtime . " . Thank you!";
			header('Location: index.php');
		}
		else {
			$_SESSION['att_status'] = "Attendance unsuccessfull!";
			header('Location: index.php');
		}

	} else {
		$_SESSION['att_status'] = "Attendance unsuccessfull! You are not registered.";
			header('Location: index.php');
	}

	if ($button_name == "Break Out") {
		// code...

		$query = "UPDATE tbl_attendance SET break_out='$curtime' WHERE emp_id='$qrvalue' AND date='$date'"; 
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['att_success'] = $qrvalue . '<br>' . "Your attendance was logged at  " . $curtime . " . Thank you!";
			header('Location: index.php');
		}
		else {
			$_SESSION['att_status'] = "Attendance unsuccessfull!";
			header('Location: index.php');
		}

	} else {
		$_SESSION['att_status'] = "Attendance unsuccessfull! You are not registered.";
			header('Location: index.php');
	}

	if ($button_name == "Break In") {
		// code...

		$query = "UPDATE tbl_attendance SET break_in='$curtime' WHERE emp_id='$qrvalue' AND date='$date'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['att_success'] = $qrvalue . '<br>' . "Your attendance was logged at  " . $curtime . " . Thank you!";
			header('Location: index.php');
		}
		else {
			$_SESSION['att_status'] = "Attendance unsuccessfull!";
			header('Location: index.php');
		}

	} else {
		$_SESSION['att_status'] = "Attendance unsuccessfull! You are not registered.";
			header('Location: index.php');
	}

	if ($button_name == "Log Out") {
		// code...

		$query = "UPDATE tbl_attendance SET log_out='$curtime' WHERE emp_id='$qrvalue' AND date='$date'"; 
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['att_success'] = $qrvalue . '<br>' . "Your attendance was logged at  " . $curtime . " . Thank you!";
			header('Location: index.php');
		}
		else {
			$_SESSION['att_status'] = "Attendance unsuccessfull!";
			header('Location: index.php');
		}

	} else {
		$_SESSION['att_status'] = "Attendance unsuccessfull! You are not registered.";
			header('Location: index.php');
	} 
	
}
?>



