<?php

/* Delete Payment */
if (isset($_POST['Delete_Payment'])) {
    $payment_id = mysqli_real_escape_string($mysqli, $_POST['payment_id']);
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);

    /* Delete */
    $delete_sql = "DELETE FROM payment WHERE payment_id = '{$payment_id}'";
    $update_sql = "UPDATE orders SET order_status = 'Pending' WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $delete_sql) && mysqli_query($mysqli, $update_sql)) {
        $success = "Payment deleted";
    } else {
        $err = "Failed, please try again";
    }
}
