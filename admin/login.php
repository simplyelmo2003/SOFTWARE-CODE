

<?php
    session_start();
    include('includes/header.php');
    include('includes/conn.php');
?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <img src="/FEL BAKESHOP ATTENDANCE MONITORING SYSTEM/image/wr.jpg" class="mx-auto d-block" style="width:100%"> 
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="code.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            name="emp_id"
                                            placeholder="Enter employee ID">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Password">
                                    </div>
                                    <button name="login_btn" type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small btn btn-danger" href="../index.php">QR CODE REAL TIME ATTENDANCE</a>
                                </div> <br>
                                <?php
                                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                        // code...
                                        echo '<h6 class="text-center text-gray-500"><i> '.$_SESSION['status'].' </i></h6>';
                                        unset($_SESSION['status']);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
    include('includes/scripts.php');
    include('includes/footer.php');
?>
