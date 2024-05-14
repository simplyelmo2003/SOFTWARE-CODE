<?php
	session_start();
	include('includes/conn.php');
	require_once 'phpqrcode/qrlib.php';
	$currdate = date("y-m-d");

//CODE FOR LOGIN
	if (isset($_POST['login_btn'])) 
	{
		// code...
		$emp_id = $_POST['emp_id'];
		$password = $_POST['password'];

		$query = "SELECT * FROM tbl_employee WHERE emp_id='$emp_id' AND password='$password'";
		$query_run = mysqli_query($con, $query);
		$row = mysqli_fetch_array($query_run);

		if ($row['usertype'] == "admin") {
			// code...
			$_SESSION['username'] = $emp_id;
			header('Location: index.php');
		}
		else if ($row['usertype'] == "user") {
			// code...
			$_SESSION['username'] = $emp_id;
			header('Location: user_index.php');
		} else {
			$_SESSION['status'] = 'Invalid ID and password. Please try again!';
			header('Location: login.php');
		}
	}

//CODE OF LOGOUT
	if (isset($_POST['logout_btn'])) {
		// code...
		session_destroy();
		unset($_SESSION['username']);
		header('Location: login.php');
	}


//ADMIN PROFILE CODE
//add admin user
	if (isset($_POST['registerbtn'])) {
		// code...
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['confirmpassword'];

		if ($password == $cpassword) {
			// code...
			$query = "INSERT INTO tbl_adminuser (username, email, password) VALUES ('$username', '$email', '$password')";
			$query_run = mysqli_query($con, $query);
			if ($query_run) {
				// code...
				$_SESSION['success'] = "Admin Profile Added!";
				header('Location: register.php');
			}
			else
			{
				$_SESSION['status'] = "Admin profile not added!";
				header('Location: register.php');
			}
		}
		else
		{
			$_SESSION['status'] = "Password and confirm password not match!";
			header('Location: register.php'); 
		}
	}


//admin user edit code

	if (isset($_POST['update_adminuser'])) {
		// code...

		$id = $_POST['update_id'];
		$username = $_POST['username'];
		$email = $_POST['email']; 
		$password = $_POST['password'];

		$query = "UPDATE tbl_adminuser SET username='$username', email='$email', password='$password' WHERE id='$id' ";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			// code...
			$_SESSION['success'] = "Admin profile udpated successfully!";
			header('Location: register.php');
		}

	}

//delete admin user
	if (isset($_POST['delete_adminuser'])) {
		// code...
		$delete_id = $_POST['deleteuser_id'];

		$query = "DELETE FROM tbl_adminuser WHERE id='$delete_id'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['success'] = "Admin profile sucessfully deleted!";
			header('Location: register.php');
		}
	}


//EMPLOYEE PROFILE CODE

//add employee

	if (isset($_POST['register_emp'])) {
		// code...

		$path = 'image/';
		
		$emp_id = $_POST['emp_id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$department = $_POST['department'];
		$qr_code = $_POST['qr_code'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$usertype = $_POST['usertype'];

		$qrcode = $path.time().$qr_code.".png";
		$qrimage = time().$qr_code.".png";


		if ($password == $cpassword) {
			// code...
		
			$query = "INSERT INTO tbl_employee (emp_id, fname, mname, lname, department, qr_code, password, usertype, qr_image) VALUES ('$emp_id', '$fname', '$mname', '$lname', '$department', '$qr_code', '$password', '$usertype', '$qrimage')";
			$query_run = mysqli_query($con, $query);
			if ($query_run) {
				// code...
				$_SESSION['success'] = "User Profile Added!";
				header('Location: register_emp.php');
			}
			else
			{
				$_SESSION['status'] = "Employee profile not added!";
				header('Location: register_emp.php');
			}
		} else {
			$_SESSION['status'] = "Password and confirm password not match!";
			header('Location: register_emp.php'); 
		}
		//saved qr code to image folder
		QRcode :: png($qr_code, $qrcode, 'H', 4, 4);
	}

//edit employee

	if (isset($_POST['update_employee'])) {
		// code...
		$emp_id = $_POST['emp_id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$department = $_POST['department'];
		$qr_code = $_POST['qr_code'];
		$password = $_POST['password'];
		$update_usertype = $_POST['update_usertype'];

		$query = "UPDATE tbl_employee SET fname='$fname', mname='$mname', lname='$lname', department='$department', qr_code='$qr_code', password='$password', usertype='$update_usertype' WHERE emp_id='$emp_id'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			// code...
			$_SESSION['success'] = "Employee profile udpated successfully!";
			header('Location: register_emp.php');
		}

	}

//delete admin user

	if (isset($_POST['delete_emp'])) {
		// code...
		$delete_id = $_POST['deleteemp_id'];

		$query = "DELETE FROM tbl_employee WHERE emp_id='$delete_id'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['success'] = "Employee profile sucessfully deleted!";
			header('Location: register_emp.php');
		}
	}

//AM ATTENDANCE CODE

//add attendance

	if (isset($_POST['add_att'])) {
		// code...
		$emp_id = $_POST['emp_id'];
		$date = $_POST['date'];
		$login = $_POST['log_in'];
		$breakout = $_POST['b_out'];
		$breakin = $_POST['b_in'];
		$logout = $_POST['log_out'];

		$query = "INSERT INTO tbl_attendance (emp_id, date, log_in, break_out, break_in, log_out) VALUES ('$emp_id', '$date', '$login', '$breakout', '$breakin', '$logout')";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			// code...
			$_SESSION['info'] = "Attendance Added!";
				header('Location: am_attendance.php');
		}
		
	}

//edit attendance

	if (isset($_POST['update_att_am'])) {
		// code...
		$id = $_POST['edit_id'];
		$emp_id = $_POST['emp_id'];
		$date = $_POST['date'];
		$login = $_POST['log_in'];
		$breakout = $_POST['b_out'];
		$breakin = $_POST['b_in'];
		$logout = $_POST['log_out'];

		$query = "UPDATE tbl_attendance SET emp_id='$emp_id', date='$date', log_in='$login', break_out='$breakout', break_in='$breakin', log_out='$logout' WHERE id='$id'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			// code...
			$_SESSION['info'] = "Attendance udpated successfully!";
			header('Location: am_attendance.php');
		}

	}

//delete AM attendance

	if (isset($_POST['delete_att_id'])) {
		// code...
		$delete_id = $_POST['delete_id_att'];

		$query = "DELETE FROM tbl_attendance WHERE id='$delete_id'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['info'] = "Attendance sucessfully deleted!";
			header('Location: am_attendance.php');
		}
	}


//PM ATTENDANCE CODE
//edit employee

	if (isset($_POST['update_att_pm'])) {
		// code...
		$id = $_POST['edit_id'];
		$emp_id = $_POST['emp_id'];
		$date = $_POST['date'];
		$breakin = $_POST['break_in'];
		$timeout = $_POST['time_out'];

		$query = "UPDATE tbl_pm_att SET emp_id='$emp_id', date='$date', breakin='$break_in', timeout='$time_out' WHERE id='$id'";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			// code...
			$_SESSION['info'] = "Attendance udpated successfully!";
			header('Location: pm_attendance.php');
		}

	}


//delete AM attendance

	if (isset($_POST['delete_pm_id'])) {
		// code...
		$delete_id = $_POST['delete_id_att'];

		$query = "DELETE FROM tbl_pm_att WHERE id='$delete_id'";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			// code...
			$_SESSION['info'] = "Attendance sucessfully deleted!";
			header('Location: pm_attendance.php');
		}
	}


//CODE FOR CHANGE PASSWORD
	if (isset($_POST['change_password'])) 
	{
		// code...
		$emp_id = $_POST['emp_id'];
		$old_password = $_POST['password'];
		$new_password = $_POST['npassword'];
		$c_password = $_POST['cpassword'];

		if ($new_password == $c_password) {
			// code...
			$query = "UPDATE tbl_employee SET password='$new_password' WHERE emp_id='$emp_id'";
			$query_run = mysqli_query($con, $query);
			if ($query_run) {
				// code...
				$_SESSION['newpass'] = 'Password was changed!';
				header('Location: user_profile.php');
			} else {
				$_SESSION['failed'] = 'Password not changed!';
				header('Location: user_profile.php');
			}
		} else {
			$_SESSION['failed'] = 'Password not match!';
			header('Location: user_profile.php');
		}
	} 

?>