<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Total Furnitures</h6>
            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $furniture; ?></span></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Available Furnitures</h6>
            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $available_furniture; ?></span></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Out Of Stock Furnitures</h6>
            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo $out_of_stock; ?></span></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Total Orders</h6>
            <h2 class="m-b-20" data-plugin="counterup"><?php echo $total_orders; ?></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">UnPaid Orders</h6>
            <h2 class="m-b-20" data-plugin="counterup"><?php echo $unpaid; ?></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Paid Orders</h6>
            <h2 class="m-b-20" data-plugin="counterup"><?php echo $paid; ?></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">On Transit Orders</h6>
            <h2 class="m-b-20" data-plugin="counterup"><?php echo $on_transit_orders; ?></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Delivered Orders</h6>
            <h2 class="m-b-20" data-plugin="counterup"><?php echo $delivered_orders; ?></h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card-box tilebox-one">
            <h6 class="text-muted text-uppercase m-b-20">Revenue</h6>
            <h2 class="m-b-20" data-plugin="counterup">Kes <?php echo number_format($revenue); ?></h2>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Orders Summary</h4>
            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>QTY</th>
                        <th>Customer</th>
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
                        WHERE f.furniture_seller_id = '{$seller_id}'"
                    );
                    if (mysqli_num_rows($fetch_records_sql) > 0) {
                        while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                    ?>
                            <tr>
                                <td><?php echo $rows['order_ref_code']; ?></td>
                                <td><?php echo $rows['furniture_name']; ?></td>
                                <td><?php echo $rows['order_qty']; ?></td>
                                <td><?php echo $rows['customer_first_name'] . ' ' . $rows['customer_last_name']; ?></td>
                                <td>Kes <?php echo number_format($rows['order_amount']); ?></td>
                                <td><?php echo $rows['order_status']; ?></td>
                                <td><?php echo $rows['order_delivery_status']; ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div><!-- end col-->
</div>