<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
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
                        <h4 class="page-title">Furniture Sellers Reports</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card-box">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                /* Pull Staffs */
                                $fetch_records_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM furniture_seller fs
                                    INNER JOIN login l ON l.login_id = fs.seller_login_id"
                                );
                                $cnt =  1;
                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $rows['seller_first_name'] . ' ' . $rows['seller_last_name']; ?></td>
                                            <td><?php echo $rows['seller_email']; ?></td>
                                            <td><?php echo $rows['seller_phone_number']; ?></td>
                                            <td><?php echo $rows['seller_address']; ?></td>

                                        </tr>
                                <?php
                                        $cnt = $cnt + 1;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col-->

            </div>

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