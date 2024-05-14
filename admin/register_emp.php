<?php
	session_start();
	include('includes/header.php');
	include('includes/navbar.php');
?>

<div class="container-fluid">
	
<!---Datatables Example--->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Employee Profile
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addemployee">Add Employee</button>
		</h6>
	</div>
	<div class="card-body">

		<?php
			if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
				// code...
				echo '<h6> '.$_SESSION['success'].' </h6>';
				unset($_SESSION['success']);
			}
			if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
				// code...
				echo '<h6> '.$_SESSION['status'].' </h6>';
				unset($_SESSION['status']);
			}
		?>

		<div class="table-responsive">

			<?php
				include('includes/conn.php');
				$query = "SELECT * FROM tbl_employee";
				$query_run = mysqli_query($con, $query);
			?>

			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Emp_ID</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Department</th>
						<th>QR Code</th>
						<th>Password</th>
						<th>User Type</th>
						<th>QR Image</th>
						<th>Action</th>

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
						<td><?php echo $row['fname']; ?></td>
						<td><?php echo $row['mname']; ?></td>
						<td><?php echo $row['lname']; ?></td>
						<td><?php echo $row['department']; ?></td>
						<td><?php echo $row['qr_code']; ?></td>
						<td><?php echo $row['password']; ?></td>
						<td><?php echo $row['usertype']; ?></td>
						<td><?php echo $row['qr_image']; ?></td>
						<td>
								<button type="button" name="editemployee" class="btn btn-info edit_emp" ><i class='fas fa-edit'></i></button>
								<button type="submit" name="delete_btn" class="btn btn-danger delete_emp"><i class='fas fa-archive'></i></button>
						</td>
					</tr>
					<?php
							}
						}
						else {
							echo "No data found!";
						} 
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- ADD Modal -->

<div class="modal fade" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<label>Employee ID</label>
	      		<input type="text" name="emp_id" class="form-control" placeholder="Emp_ID" required>
	      	</div>
	      	<div class="form-group">
	      		<label>First Name</label>
	      		<input type="text" name="fname" class="form-control" placeholder="First Name" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Middle Name</label>
	      		<input type="text" name="mname" class="form-control" placeholder="Middle Name" >
	      	</div>
	      	<div class="form-group">
	      		<label>Last Name</label>
	      		<input type="text" name="lname" class="form-control" placeholder="Last Name" required>


	      	</div>
	      	<div class="form-group">
	      		<label>Department</label>
	      		<input type="text" name="department" class="form-control" placeholder="Department" required>

	      	</div>
	      	<div class="form-group">
	      		<label>QR Code</label>
	      		<input type="text" name="qr_code" class="form-control" placeholder="QR Code" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Password</label>
	      		<input type="password" name="password" class="form-control" placeholder="Password" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Confirm Password</label>
	      		<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
	      		</div>
	      	<div class="form-group">
	      		<label>User Type</label>
	      		<select class="form-select" name="usertype" required>
	      			<option value="admin">Admin</option>
	      			<option value="user">User</option>
	      		</select>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="register_emp" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!--EDIT ADMIN Modal -->

<div class="modal fade" id="editemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i>Update Employee Profile</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="emp_id" id="emp_id" class="form-control">
	      		<label>First Name</label>
	      		<input type="text" name="fname" id="fname" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Middle Name</label>
	      		<input type="text" name="mname" id="mname" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Last Name</label>
	      		<input type="text" name="lname" id="lname" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Department</label>
	      		<input type="text" name="department" id="department" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Qr Code</label>
	      		<input type="text" name="qr_code" id="qr_code" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Password</label>
	      		<input type="password" name="password" id="password" class="form-control">
	      	</div>
	      		<label>User Type</label>
	      		<select class="form-select" name="update_usertype" id="update_usertype">
	      			<option value="admin">Admin</option>
	      			<option value="user">User</option>
	      		</select>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="update_employee" class="btn btn-primary">Update</button>
	      </div>
      </form>

    </div>
  </div>
</div>


<!--DELETE Modal -->

<div class="modal fade" id="deleteemp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="deleteemp_id" id="deleteemp_id">
	      		<label>Do you really want to delete this employee?</label>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="delete_emp" class="btn btn-danger">Delete</button>
	      </div>
      </form>

    </div>
  </div>
</div>

<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>