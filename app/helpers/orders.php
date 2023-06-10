<?php
/* Update Order */
if (isset($_POST['Update_Order'])) {
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);
    $order_qty = mysqli_real_escape_string($mysqli, $_POST['order_qty']);
    $order_amount = mysqli_real_escape_string($mysqli, ($order_qty * $_POST['furniture_price']));
    $order_delivery_status = mysqli_real_escape_string($mysqli, $_POST['order_delivery_status']);
    $order_estimated_delivery_date = mysqli_real_escape_string($mysqli, $_POST['order_estimated_delivery_date']);

    /* Persist */
    $update_sql = "UPDATE orders SET order_qty = '{$order_qty}', order_amount  = '{$order_amount}', order_delivery_status = '{$order_delivery_status}', 
    order_estimated_delivery_date = '{$order_estimated_delivery_date}' WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Order updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Order */
if (isset($_POST['Delete_Order'])) {
    $order_id  = mysqli_real_escape_string($mysqli, $_POST['order_id']);

    /* Persist */
    $delete_sql = "DELETE FROM orders WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Order deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Pay Order */
if (isset($_POST['Pay_Order'])) {
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);
    $payment_means = mysqli_real_escape_string($mysqli, $_POST['payment_means']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_date = mysqli_real_escape_string($mysqli, date('d M Y'));
    $payment_ref_code = mysqli_real_escape_string($mysqli, $_POST['payment_ref_code']);

    /* Persist */
    $add_sql = "INSERT INTO payment(payment_order_id, payment_means, payment_amount, payment_date, payment_ref_code)
    VALUES('{$order_id}', '{$payment_means}', '{$payment_amount}', '{$payment_date}', '{$payment_ref_code}')";
    $update_sql  = "UPDATE order SET order_status = 'Paid' WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $add_sql) && mysqli_query($mysqli, $update_sql)) {
        $success  = "Order paid";
    } else {
        $err = "Failed, please try again";
    }
}
