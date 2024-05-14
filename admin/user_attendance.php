<?php
	session_start();
	include('includes/header.php');
	include('includes/user_navbar.php');
?>

<div class="container-fluid">
	
<!---Datatables Example--->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Attendance Log</h6>
	</div>
	<div class="card-body">


		<div class="table-responsive">

			<?php
				include('includes/conn.php');
				$username = $_SESSION['username'];
				$query = "SELECT * FROM tbl_attendance WHERE emp_id='$username' ORDER BY date";
				$query_run = mysqli_query($con, $query);
			?>

			<table id="example" class="display table table-bordered" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Emp ID</th>
						<th>Date</th>
						<th>Log In</th>
						<th>Break Out</th>
						<th>Break In</th>
						<th>Log Out</th>
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




<?php
	include('includes/scripts.php');
	include('includes/footer.php');
?>

