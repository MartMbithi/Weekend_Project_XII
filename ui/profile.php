<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/helpers/users.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>

    <!-- Navigation Bar-->
    <?php require_once('../app/partials/backoffice_header.php'); ?>
    <!-- End Navigation Bar-->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Profile settings - <?php echo $_SESSION['login_id']; ?></h4>
                    </div>
                </div>
            </div>
            <?php if ($_SESSION['login_rank'] == 'Admin') { ?>
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">
                                        Authentication
                                    </a>
                                </li>
                            </ul>
                            <?php
                            $login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);
                            $fetch_records_sql = mysqli_query(
                                $mysqli,
                                "SELECT * FROM administrator a
                            INNER JOIN login l ON
                            l.login_id = a.admin_login_id"
                            );
                            if (mysqli_num_rows($fetch_records_sql) > 0) {
                                while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                            ?>
                                    <div class="tab-content" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="home" aria-labelledby="home-tab">
                                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">First Name</label>
                                                        <input type="text" required name="admin_first_name" value="<?php echo $rows['admin_first_name']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Last Name</label>
                                                        <input type="text" required name="admin_last_name" value="<?php echo $rows['admin_last_name']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Contacts</label>
                                                        <input type="text" required name="admin_phone_number" value="<?php echo $rows['admin_phone_number']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Email</label>
                                                        <input type="text" required name="admin_email" value="<?php echo $rows['admin_email']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Update_Staff_Profile" class="btn btn-outline-danger">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Login Username</label>
                                                        <input type="text" required name="login_username" value="<?php echo $rows['login_username']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">New Password</label>
                                                        <input type="password" required name="new_password" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" required name="confirm_password" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Login Rank</label>
                                                        <input type="text" readonly required name="" value="<?php echo $rows['login_rank']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Update_Auth_Details_Staff" class="btn btn-outline-danger">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div><!-- end col-->
            <?php } else { ?>
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card-box">
                            <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">
                                        Authentication
                                    </a>
                                </li>
                            </ul>
                            <?php
                            $fetch_records_sql = mysqli_query(
                                $mysqli,
                                "SELECT * FROM furniture_seller fs
                                INNER JOIN login l ON l.login_id = fs.seller_login_id
                                WHERE l.login_id = '{$_SESSION['login_id']}'"
                            );
                            if (mysqli_num_rows($fetch_records_sql) > 0) {
                                while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                            ?>
                                    <div class="tab-content" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="home" aria-labelledby="home-tab">
                                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">First Name</label>
                                                        <input type="hidden" required name="seller_id" value="<?php echo $rows['seller_id']; ?>" class="form-control">
                                                        <input type="text" required name="seller_first_name" value="<?php echo $rows['seller_first_name']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Last Name</label>
                                                        <input type="text" required name="seller_last_name" value="<?php echo $rows['seller_last_name']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Contacts</label>
                                                        <input type="text" required name="seller_phone_number" value="<?php echo $rows['seller_phone_number']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Email</label>
                                                        <input type="text" required name="seller_email" value="<?php echo $rows['seller_email']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="">Address</label>
                                                        <input type="text" required name="seller_address" value="<?php echo $rows['seller_address']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Update_Seller" class="btn btn-outline-danger">Save</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Login Username</label>
                                                        <input type="text" required name="login_username" value="<?php echo $rows['login_username']; ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">New Password</label>
                                                        <input type="password" required name="new_password" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" required name="confirm_password" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Login Rank</label>
                                                        <input type="text" readonly required name="" value="<?php echo $rows['login_rank']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" name="Update_Auth_Details_Staff" class="btn btn-outline-danger">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div><!-- end col-->
            <?php } ?>
        </div>

    </div> <!-- container -->

    <!-- Footer -->
    <?php require_once('../app/partials/backoffice_footer.php'); ?>
    <!-- End Footer -->

    </div> <!-- End wrapper -->


    <!-- Scripts -->
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>

</body>

</html>