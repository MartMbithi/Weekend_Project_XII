<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/config/codeGen.php');
require_once('../app/helpers/furniture.php');
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
                            <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-custom waves-effect waves-light" aria-expanded="false">Add Furniture
                                <span class="m-l-5"><i class="fa fa-plus"></i></span>
                            </button>
                        </div>
                        <h4 class="page-title">Furnitures</h4>
                    </div>
                </div>
            </div>
            <!-- Add Modal -->
            <div class="modal fade fixed-right" id="add_modal" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <div class="text-center">
                                <h6 class="mb-0 text-bold">Register new furniture item</h6>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Seller name</label>
                                        <select type="text" required name="furniture_seller_id" class="form-control">
                                            <option>Select seller</option>
                                            <?php
                                            $fetch_records_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM furniture_seller"
                                            );
                                            if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                            ?>
                                                    <option value="<?php echo $rows['seller_id']; ?>"><?php echo $rows['seller_first_name'] . ' ' . $rows['seller_last_name']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Category</label>
                                        <select type="text" required name="furniture_category_id" class="form-control">
                                            <option>Select category</option>
                                            <?php
                                            $fetch_records_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM furniture_category"
                                            );
                                            if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                            ?>
                                                    <option value="<?php echo $rows['category_id']; ?>"><?php echo $rows['category_name']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Furniture Name</label>
                                        <input type="text" required name="furniture_name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Unit Price</label>
                                        <input type="text" required name="furniture_price" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Furniture Images (Select Multiple)</label>
                                        <input type="file" required name="furniture_image[]" class="form-control" multiple>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Details</label>
                                        <textarea type="text" rows="5" required name="furniture_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="Add_Furniture" class="btn btn-outline-danger">Save</button>
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
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Item Name</th>
                                    <th>Seller</th>
                                    <th>Unit price</th>
                                    <th>Availability</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetch_records_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM furniture f
                                    INNER JOIN furniture_category fc ON fc.category_id = f.furniture_category_id
                                    INNER JOIN furniture_seller fs ON fs.seller_id = f.furniture_seller_id
                                    "
                                );
                                $cnt = 1;
                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $rows['furniture_sku_code']; ?></td>
                                            <td><?php echo $rows['category_name']; ?></td>
                                            <td><?php echo $rows['furniture_name']; ?></td>
                                            <td>
                                                <?php echo $rows['seller_first_name'] . ' ' . $rows['seller_last_name']; ?>
                                            </td>
                                            <td>Kes <?php echo number_format($rows['furniture_price']); ?></td>
                                            <td><?php echo $rows['furniture_status']; ?></td>
                                            <td>
                                                <a data-toggle="modal" href="#view_<?php echo $rows['furniture_id']; ?>" class="badge badge-pill badge-success"><em class="fa fa-eye"></em> View</a>
                                                <a data-toggle="modal" href="#update_<?php echo $rows['furniture_id']; ?>" class="badge badge-pill badge-warning"><em class="fa fa-edit"></em> Edit</a>
                                                <a data-toggle="modal" href="#delete_<?php echo $rows['furniture_id']; ?>" class="badge badge-pill badge-danger"><em class="fa fa-trash"></em> Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                        $cnt = $cnt + 1;
                                        include('../app/modals/furnitures.php');
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