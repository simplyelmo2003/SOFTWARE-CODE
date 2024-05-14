<?php
	session_start();
	include('includes/header.php');
	include('includes/navbar.php');
?>

<div class="container-fluid">
	
<!---Datatables Example--->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Admin Profile
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">Add Admin Profile</button>
		</h6>
	</div>
	<div class="card-body">

		<?php
			if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
				// code...
				echo '<h6> '.$_SESSION['success'].' </h6>';
				unset($_SESSION['success'z]);
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
				$query = "SELECT * FROM tbl_adminuser";
				$query_run = mysqli_query($con, $query);
			?>

			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Password</th>
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
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['password']; ?></td>
						<td>
								<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
								<button type="button" name="editadminprofile" class="btn btn-info editbtn" >Edit</button>
								<button type="submit" name="delete_btn" class="btn btn-danger deletebtn">Delete</button>
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

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<label>Username</label>
	      		<input type="text" name="username" class="form-control" placeholder="Enter username" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Email</label>
	      		<input type="text" name="email" class="form-control" placeholder="Enter email" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Password</label>
	      		<input type="text" name="password" class="form-control" placeholder="Enter password" required>
	      	</div>
	      	<div class="form-group">
	      		<label>Confirm Password</label>
	      		<input type="text" name="confirmpassword" class="form-control" placeholder="Confirm Password">
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>


<!--EDIT ADMIN Modal -->

<div class="modal fade" id="editadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="update_id" id="update_id">
	      		<label>Username</label>
	      		<input type="text" name="username" id="username" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Email</label>
	      		<input type="text" name="email" id="email" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Password</label>
	      		<input type="password" name="password" id="password" class="form-control">
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="update_adminuser" class="btn btn-primary">Update</button>
	      </div>
      </form>

    </div>
  </div>
</div>

<!--DELETE Modal -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="deleteuser_id" id="deleteuser_id">
	      		<label>Do you really want to delete this admin user?</label>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="delete_adminuser" class="btn btn-danger">Delete</button>
	      </div>
      </form>

    </div>
  </div>
</div>


<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>