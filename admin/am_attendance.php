<?php
	session_start();
	include('includes/header.php');
	include('includes/navbar.php');
?>

<div class="container-fluid">
	
<!---Datatables Example--->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Attendances
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addattendance">Add Attendance</button>
		</h6>

	</div>
	<div class="card-body">

		<?php
			if (isset($_SESSION['info']) && $_SESSION['info'] != '') {
				// code...
				echo '<h6> '.$_SESSION['info'].' </h6>';
				unset($_SESSION['info']);
			}
		?>

		<div class="table-responsive">

			<?php
				include('includes/conn.php');
				$query = "SELECT * FROM tbl_attendance ORDER BY date";
				$query_run = mysqli_query($con, $query);
			?>

			<table class="table table-bordered" id="example" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Emp ID</th>
						<th>Date</th>
						<th>Log In</th>
						<th>Break Out</th>
						<th>Break In</th>
						<th>Log Out</th>
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
						<td><?php echo $row['emp_id']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['log_in']; ?></td>
						<td><?php echo $row['break_out']; ?></td>
						<td><?php echo $row['break_in']; ?></td>
						<td><?php echo $row['log_out']; ?></td>
						<td>
							<button type="button" name="edit_am_att" class="btn btn-info edit_am" ><i class='fas fa-edit'></i></button>
							<button type="submit" name="delete_am_att" class="btn btn-danger delete_am"><i class='fas fa-archive'></i></button>
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

<!--ADD Attendance Modal -->

<div class="modal fade" id="addattendance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<label>Employee ID</label>
	      		<input type="text" name="emp_id" class="form-control" placeholder="Enter employee id">
	      		<label>Date</label>
	      		<input type="date" name="date" class="form-control" placeholder="Enter Date">
	      	</div>
	      	<div class="form-group">
	      		<label>Log In</label>
	      		<input type="time" name="log_in" class="form-control" placeholder="Login time">
	      	</div>
	      	<div class="form-group">
	      		<label>Break Out</label>
	      		<input type="time" name="b_out" class="form-control" placeholder=" Break out time">
	      	</div>
	      	<div class="form-group">
	      		<label>Break In</label>
	      		<input type="time" name="b_in" class="form-control" placeholder="Break in time">
	      	</div>
	      	<div class="form-group">
	      		<label>Log Out</label>
	      		<input type="time" name="log_out" class="form-control" placeholder="Log out time">
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="add_att" class="btn btn-primary">Save</button>
	      </div>
      </form>

    </div>
  </div>
</div>

<!--EDIT AM Modal -->

<div class="modal fade" id="edit_att" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="edit_id" id="edit_id">
	      		<input type="text" name="emp_id" id="emp_id" class="form-control" readonly>
	      		<label>Date</label>
	      		<input type="date" name="date" id="date" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Log In</label>
	      		<input type="time" name="log_in" id="log_in" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Break Out</label>
	      		<input type="time" name="b_out" id="b_out" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Break In</label>
	      		<input type="time" name="b_in" id="b_in" class="form-control">
	      	</div>
	      	<div class="form-group">
	      		<label>Log Out</label>
	      		<input type="time" name="log_out" id="log_out" class="form-control">
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="update_att_am" class="btn btn-primary">Update</button>
	      </div>
      </form>

    </div>
  </div>
</div>


<!--DELETE AM Modal -->

<div class="modal fade" id="delete_AM_att" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
	      <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="delete_id_att" id="delete_id_att">
	      		<label>Do you really want to delete this attendance?</label>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="delete_att_id" class="btn btn-danger">Delete</button>
	      </div>
      </form>

    </div>
  </div>
</div>


<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>