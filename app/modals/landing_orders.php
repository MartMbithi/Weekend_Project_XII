<!-- Order -->
<div class="modal fade fixed-right" id="pay_<?php echo $rows['order_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-6 space-t-15">
                            <label for="">Payment Method</label>
                            <input type="hidden" required name="order_id" value="<?php echo $rows['order_id']; ?>" class="form-control">
                            <select type="text" required name="payment_means" class="form-control">
                                <option>Cash on delivery</option>
                                <option>Mpesa</option>
                                <option>Debit / Credit card</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 space-t-15">
                            <label for="">Amount</label>
                            <input type="text" required name="payment_amount" value="<?php echo $rows['order_amount']; ?>" readonly class="form-control">
                        </div>
                        <div class="form-group col-md-3 space-t-15">
                            <label for="">Ref Code</label>
                            <input type="text" readonly required name="payment_ref_code" value="<?php echo $code; ?>" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 space-t-15 text-right">
                        <button type="submit" name="Pay_Order" class="btn btn-primary">Pay Order</button>
                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                    <!-- <div class="text-right">
                        <button type="submit" name="Pay_Order" class="btn btn-outline-danger">Pay Order</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Order -->

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $rows['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <i class="fa fa-trash fa-3x"></i><br>
                    <h4>Delete order details</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="order_id" value="<?php echo $rows['order_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Order" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete -->