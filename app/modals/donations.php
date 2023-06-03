<!-- Edit Modal -->
<div class="modal fade fixed-right" id="edit_<?php echo $rows['donation_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update Blood Donation Details</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Donation date</label>
                            <input type="hidden" name="donation_id" value="<?php echo $rows['donation_id']; ?>">
                            <input type="date" value="<?php echo $rows['donation_date_time']; ?>" required name="donation_date_time" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Blood QTY (Millimeters)</label>
                            <input type="number" value="<?php echo $rows['donation_blood_amount']; ?>" required name="donation_blood_amount" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Blood status</label>
                            <select type="text" required name="donation_blood_status" class="form-control">
                                <?php if ($rows['donation_blood_status'] == 'Healthy') { ?>
                                    <option>Healthy</option>
                                    <option>Contaminated</option>
                                <?php } else { ?>
                                    <option>Contaminated</option>
                                    <option>Healthy</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Update_Donation" class="btn btn-outline-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $rows['donation_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Delete <?php echo $rows['blood_donor_names']; ?> details?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="donation_id" value="<?php echo $rows['donation_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Donation" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->