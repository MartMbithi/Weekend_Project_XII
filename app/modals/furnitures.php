<!-- View -->
<div class="modal fade fixed-right" id="view_<?php echo $rows['furniture_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Furniture Details</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-muted" align="justify">
                    <?php echo $rows['furniture_description']; ?>
                </p>
                <hr>
                <div class="port text-center m-b-20">
                    <div class="portfolioContainer">
                        <?php
                        $fetch_images_sql = mysqli_query(
                            $mysqli,
                            "SELECT * FROM furniture_images WHERE 
                            furniture_image_furniture_id = '{$rows['furniture_id']}'"
                        );
                        if (mysqli_num_rows($fetch_images_sql) > 0) {
                            while ($images = mysqli_fetch_array($fetch_images_sql)) {
                        ?>
                                <div class="gallery-box natural">
                                    <div class="thumb">
                                        <a href="../storage/<?php echo $images['furniture_image']; ?>" class="image-popup" title="Screenshot-1">
                                            <img src="../storage/<?php echo $images['furniture_image']; ?>" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End View -->

<!-- Order -->
<div class="modal fade fixed-right" id="order_<?php echo $rows['furniture_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Order this item</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Customer name</label>
                            <input type="hidden" required name="furniture_price" value="<?php echo $rows['furniture_price']; ?>" class="form-control">
                            <input type="hidden" required name="order_furniture_id" value="<?php echo $rows['furniture_id']; ?>" class="form-control">
                            <select type="text" required name="order_customer_id" class="form-control">
                                <option>Select customer</option>
                                <?php
                                $fetch_customer_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM customer"
                                );
                                if (mysqli_num_rows($fetch_customer_sql) > 0) {
                                    while ($customers = mysqli_fetch_array($fetch_customer_sql)) {
                                ?>
                                        <option value="<?php echo $customers['customer_id']; ?>"><?php echo $customers['customer_first_name'] . ' ' . $customers['customer_last_name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Items quantity</label>
                            <input type="number" required name="order_qty" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Delivery date</label>
                            <input type="date" required name="order_estimated_delivery_date" class="form-control">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Add_Order" class="btn btn-outline-danger">Add Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Order -->

<!-- Edit -->
<div class="modal fade fixed-right" id="update_<?php echo $rows['furniture_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update item details</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Furniture Name</label>
                            <input type="hidden" required name="furniture_id" value="<?php echo $rows['furniture_id']; ?>" class="form-control">
                            <input type="text" required name="furniture_name" value="<?php echo $rows['furniture_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Unit Price</label>
                            <input type="text" required name="furniture_price" value="<?php echo $rows['furniture_price']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Item status</label>
                            <select type="text" required name="furniture_status" class="form-control">
                                <?php if ($rows['furniture_status'] == 'Available') { ?>
                                    <option>Availabile</option>
                                    <option>Out of stock</option>
                                <?php } else { ?>
                                    <option>Out of stock</option>
                                    <option>Availabile</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Details</label>
                            <textarea type="text" rows="5" required name="furniture_description" class="form-control"><?php echo $rows['furniture_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Update_Furniture" class="btn btn-outline-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit -->

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $rows['furniture_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <i class="fa fa-trash fa-3x"></i><br>
                    <h4>Delete item details</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="furniture_id" value="<?php echo $rows['furniture_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Furniture" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete -->