<!-- Edit Modal -->
<div class="modal fade fixed-right" id="edit_<?php echo $rows['bank_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update Blood Bank Details</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Blood Bank Name</label>
                            <input type="hidden" required name="bank_id" value="<?php echo $rows['bank_id']; ?>" class="form-control">
                            <input type="text" required name="bank_name" value="<?php echo $rows['bank_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Blood Bank Location</label>
                            <input type="text" value="<?php echo $rows['bank_location']; ?>" required name="bank_location" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Blood QTY (Litres)</label>
                            <input type="number" value="<?php echo $rows['bank_blood_qty']; ?>" required name="bank_blood_qty" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Officer Incharge</label>
                            <select type="text" required name="bank_officer_id" class="form-control">
                                <option value="<?php echo $rows['officer_id']; ?>"><?php echo $rows['officer_names']; ?></option>
                                <?php
                                $fetch_officers_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM clinical_officer co
                                    INNER JOIN login l ON
                                    l.login_id = co.officer_login_id WHERE officer_id != '{$rows['officer_id']}'"
                                );
                                if (mysqli_num_rows($fetch_officers_sql) > 0) {
                                    while ($officers = mysqli_fetch_array($fetch_officers_sql)) {
                                ?>
                                        <option value="<?php echo $officers['officer_id']; ?>"><?php echo $officers['officer_names']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Update_Bank" class="btn btn-outline-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $rows['bank_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Delete <?php echo $rows['bank_name']; ?> details?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="bank_id" value="<?php echo $rows['bank_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Bank" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->