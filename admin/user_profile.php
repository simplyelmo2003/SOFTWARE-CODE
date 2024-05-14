<?php
	session_start();
	include('includes/header.php');
	//require_once 'phpqrcode/qrlib.php';
	include('includes/conn.php');

	$username = $_SESSION['username'];
	$query = "SELECT * FROM tbl_employee WHERE emp_id='$username'";
	$query_run = mysqli_query($con, $query);
	$row = mysqli_fetch_array($query_run);

	if ($row['usertype'] == "admin") {
		include('includes/navbar.php');
	} else {
		include('includes/user_navbar.php');
	}
?>



<div class="container mt-3">
  <h4>User Profile</h4> <hr>
  <form>
    <div class="row">
      <div class="col-sm-4">
      	<label>Employee ID</label>
        <input type="text" class="form-control" name="email" value="<?php echo $row['emp_id'] ?>" readonly>
      </div>
    </div> <br>
    <div class="row">
      <div class="col">
      	<label>First Name</label>
        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'] ?>" readonly>
      </div>
      <div class="col">
      	<label>Middle Name</label>
        <input type="text" class="form-control" name="mname" value="<?php echo $row['mname'] ?>" readonly>
      </div>
      <div class="col">
      	<label>Last Name</label>
        <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'] ?>" readonly>
      </div>
    </div> <hr>
    <div class="row">
    	<div class="col-sm-4">
    		<label>Department</label>
    		<input type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>" readonly>
    	</div>
    	<div class="col-sm-4">
    		<label>QR Image</label>
    		<?php
    			echo "<img src='image/{$row['qr_image']}'>";
    		?>
    	</div>
    </div> <hr>
    <div class="row">
    	<div class="col-sm-4">
    		<label>Password</label>
    		<input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>" readonly>
    	</div>
    </div> <br>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changepass">Change Password</button> <br>

    	<?php
			if (isset($_SESSION['newpass']) && $_SESSION['newpass'] != '') {
				// code...
				echo '<h6> '.$_SESSION['newpass'].' </h6>';
				unset($_SESSION['newpass']);
			}
			if (isset($_SESSION['failed']) && $_SESSION['failed'] != '') {
				// code...
				echo '<h6> '.$_SESSION['failed'].' </h6>';
				unset($_SESSION['failed']);
			}
		?>

  </form>
</div>
<br>

<!-- change password modal -->

<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="emp_id" class="form-control" value="<?php echo $row['emp_id'] ?>" >
	      	</div>
	      	<div class="form-group">
	      		<label>Old Password</label>
	      		<input type="text" name="password" class="form-control" value="<?php echo $row['password'] ?>" readonly>
	      	</div>
	      	<div class="form-group">
	      		<label>New Password</label>
	      		<input type="password" name="npassword" class="form-control" placeholder="New Password" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Confirm New Password</label>
	      		<input type="password" name="cpassword" class="form-control" placeholder="Confirm New Password" required>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
	      </div>
      </form>
    </div>
  </div>
</div>


<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>