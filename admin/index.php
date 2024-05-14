

<?php
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="../index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-qrcode fa-sm text-white-50"></i> REAL TIME ATTENDANCE</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total # of Employee</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                                <?php 
                                                    $query = "SELECT emp_id FROM tbl_employee ORDER BY emp_id";
                                                    $query_run = mysqli_query($con, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1><b>' . $row . '</b></h1>';
                                                ?>                                                    

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total # of Attendance
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $query = "SELECT emp_id FROM tbl_attendance  ORDER BY emp_id";
                                                            $query_run = mysqli_query($con, $query);

                                                            $row = mysqli_num_rows($query_run);
                                                            echo '<h1><b>' . $row . '</b></h1>';
                                                        ?>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<?php
    include('includes/scripts.php');
    include('includes/footer.php');
?>
