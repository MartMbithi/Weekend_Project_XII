<!-- Edit -->
<div class="modal fade fixed-right" id="update_<?php echo $rows['customer_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update staff</h6>
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
                            <input type="hidden" value="<?php echo $rows['customer_id']; ?>" required name="customer_id" class="form-control">
                            <input type="text" value="<?php echo $rows['customer_first_name']; ?>" required name="customer_first_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" value="<?php echo $rows['customer_last_name']; ?>" required name="customer_last_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Contacts</label>
                            <input type="text" value="<?php echo $rows['customer_phone_number']; ?>" required name="customer_phone_number" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" value="<?php echo $rows['customer_email']; ?>" required name="customer_email" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Address</label>
                            <input type="text" value="<?php echo $rows['customer_address']; ?>" required name="customer_address" class="form-control">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Update_Customer" class="btn btn-outline-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit -->

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $rows['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <i class="fa fa-trash fa-3x"></i><br>
                    <h4>Delete customer details</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="login_id" value="<?php echo $rows['login_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Seller" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete -->