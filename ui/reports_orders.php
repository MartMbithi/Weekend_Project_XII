<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/config/codeGen.php');
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
                        <h4 class="page-title">Orders Reports</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card-box">
                        <?php if ($_SESSION['login_rank'] == 'Admin') { ?>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>QTY</th>
                                        <th>Customer</th>
                                        <th>Seller</th>
                                        <th>Cost</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    /* Pull Orders */
                                    $fetch_records_sql = mysqli_query(
                                        $mysqli,
                                        "SELECT * FROM orders o INNER JOIN customer c ON c.customer_id = o.order_customer_id
                                    INNER JOIN furniture f ON f.furniture_id = o.order_furniture_id
                                    INNER JOIN furniture_seller fs  ON fs.seller_id = f.furniture_seller_id"
                                    );
                                    if (mysqli_num_rows($fetch_records_sql) > 0) {
                                        while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $rows['order_ref_code']; ?></td>
                                                <td><?php echo $rows['furniture_name']; ?></td>
                                                <td><?php echo $rows['order_qty']; ?></td>
                                                <td><?php echo $rows['customer_first_name'] . ' ' . $rows['customer_last_name']; ?></td>
                                                <td><?php echo $rows['seller_first_name'] . ' ' . $rows['seller_last_name']; ?></td>
                                                <td>Kes <?php echo number_format($rows['order_amount']); ?></td>
                                                <td><?php echo $rows['order_status']; ?></td>
                                                <td><?php echo $rows['order_delivery_status']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>QTY</th>
                                        <th>Customer</th>
                                        <th>Seller</th>
                                        <th>Cost</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    /* Pull Orders */
                                    $fetch_records_sql = mysqli_query(
                                        $mysqli,
                                        "SELECT * FROM orders o INNER JOIN customer c ON c.customer_id = o.order_customer_id
                                        INNER JOIN furniture f ON f.furniture_id = o.order_furniture_id
                                        INNER JOIN furniture_seller fs  ON fs.seller_id = f.furniture_seller_id
                                        WHERE fs.seller_login_id = '{$_SESSION['login_id']}'"
                                    );
                                    if (mysqli_num_rows($fetch_records_sql) > 0) {
                                        while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $rows['order_ref_code']; ?></td>
                                                <td><?php echo $rows['furniture_name']; ?></td>
                                                <td><?php echo $rows['order_qty']; ?></td>
                                                <td><?php echo $rows['customer_first_name'] . ' ' . $rows['customer_last_name']; ?></td>
                                                <td><?php echo $rows['seller_first_name'] . ' ' . $rows['seller_last_name']; ?></td>
                                                <td>Kes <?php echo number_format($rows['order_amount']); ?></td>
                                                <td><?php echo $rows['order_status']; ?></td>
                                                <td><?php echo $rows['order_delivery_status']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        <?php } ?>
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