<!-- View -->
<div class="modal fade fixed-right" id="view_<?php echo $rows['furniture_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
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

            </div>
        </div>
    </div>
</div>
<!-- End View -->


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