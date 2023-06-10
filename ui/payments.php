<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/config/codeGen.php');
require_once('../app/helpers/payments.php');
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
                        <h4 class="page-title">Payments</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card-box">
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Payment Ref Code</th>
                                    <th>Order Number</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Date Paid</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetch_records_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM payment p
                                    INNER JOIN orders o ON o.order_id = p.payment_order_id
                                    INNER JOIN customer c ON c.customer_id = o.order_customer_id"
                                );
                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                ?>
                                        <tr>
                                            <td><?php echo $rows['payment_ref_code']; ?></td>
                                            <td><?php echo $rows['order_ref_code']; ?></td>
                                            <td><?php echo $rows['customer_first_name'] . ' ' . $rows['customer_last_name']; ?></td>
                                            <td>Kes <?php echo number_format($rows['order_amount']); ?></td>
                                            <td><?php echo $rows['payment_date']; ?></td>
                                            <td>
                                                <a data-toggle="modal" href="#delete_<?php echo $rows['payment_id']; ?>" class="badge badge-pill badge-danger"><em class="fa fa-trash"></em> Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                        include('../app/modals/payments.php');
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