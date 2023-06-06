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
                            <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-custom waves-effect waves-light" aria-expanded="false">Add Staff
                                <span class="m-l-5"><i class="fa fa-plus"></i></span>
                            </button>
                        </div>
                        <h4 class="page-title">Staffs</h4>
                    </div>
                </div>
            </div>
            <!-- Add Modal -->
            <div class="modal fade fixed-right" id="add_modal" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <div class="text-center">
                                <h6 class="mb-0 text-bold">Register new system user</h6>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">First Name</label>
                                        <input type="text" required name="admin_first_name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Last Name</label>
                                        <input type="text" required name="admin_last_name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Contacts</label>
                                        <input type="text" required name="admin_phone_number" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input type="text" required name="admin_email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Login Password</label>
                                        <input type="password" required name="new_password" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Confirm Password</label>
                                        <input type="password" required name="confirm_password" class="form-control">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="Add_Staff_Details" class="btn btn-outline-danger">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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