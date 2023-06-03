<!-- Edit Modal -->
<div class="modal fade fixed-right" id="edit_<?php echo $rows['patient_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update Patient Details</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Full names</label>
                            <input type="hidden" value="<?php echo $rows['patient_id']; ?>" required name="patient_id" class="form-control">
                            <input type="text" required name="patient_names" value="<?php echo $rows['patient_names']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Contacts</label>
                            <input type="text" required name="patient_contacts" value="<?php echo $rows['patient_contacts']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" required name="patient_email" value="<?php echo $rows['patient_email']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Blood group</label>
                            <select type="text" required name="patient_blood_group" class="form-control">
                                <option><?php echo $rows['patient_blood_group']; ?></option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O-</option>
                                <option>O+</option>
                                <option>AB-</option>
                                <option>AB+</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Adddress</label>
                            <input type="text" required name="patient_address" value="<?php echo $rows['patient_address']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="Update_Patient" class="btn btn-outline-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $rows['patient_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Delete <?php echo $rows['patient_names']; ?> details?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="login_id" value="<?php echo $rows['login_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Patient" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->