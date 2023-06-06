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
                        <div class="btn-group float-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="modal" aria-expanded="false">Add Staff
                                <span class="m-l-5"><i class="fa fa-plus"></i></span>
                            </button>
                        </div>
                        <h4 class="page-title">Staffs</h4>
                    </div>
                </div>
            </div>
            <!-- Add Modal -->
            
            <!-- End Modal -->
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card-box">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                /* Pull Staffs */
                                $fetch_records_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM administrator a
                                    INNER JOIN login l ON l.login_id = a.admin_login_id"
                                );
                                $cnt = $cnt + 1;
                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $rows['admin_first_name'] . ' ' . $rows['admin_last_name']; ?></td>
                                            <td><?php echo $rows['admin_email']; ?></td>
                                            <td><?php echo $rows['admin_phone_number']; ?></td>
                                            <td>
                                                <a data-toggle="modal" href="#update_<?php echo $rows['admin_id']; ?>" class="badge badge-pill badge-warning"><em class="fa fa-edit"></em> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $rows['admin_id']; ?>" class="badge badge-pill badge-danger"><em class="fa fa-trash"></em> Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                        $cnt = $cnt + 1;
                                        require_once('../app/modals/staffs.php');
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