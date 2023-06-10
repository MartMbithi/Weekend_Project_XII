<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $rows['payment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <i class="fa fa-trash fa-3x"></i><br>
                    <h4>Delete order details</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="payment_id" value="<?php echo $rows['payment_id']; ?>">
                    <input type="hidden" name="order_id" value="<?php echo $rows['order_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Payment" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete -->