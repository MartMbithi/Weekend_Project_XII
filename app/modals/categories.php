<!-- Edit -->
<div class="modal fade fixed-right" id="update_<?php echo $rows['category_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update categories</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Category Name</label>
                            <input type="hidden" required name="category_id" class="form-control">
                            <input type="text" required name="category_name" value="<?php echo $rows['category_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Category Description</label>
                            <textarea type="text" required name="category_description" class="form-control"><?php echo $rows['category_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Update_Category" class="btn btn-outline-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit -->

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $rows['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <i class="fa fa-trash fa-3x"></i><br>
                    <h4>Delete category details</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="category_id" value="<?php echo $rows['category_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Category" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete -->