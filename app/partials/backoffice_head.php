<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Blood Donor Information Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../public/landing/images/favicon.png">
    <!-- Style css -->
    <link href="../public/backoffice/css/style.css" rel="stylesheet">
    <!-- Popoins css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Datatable -->
    <link href="../public/backoffice/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Sweet Alerts -->
    <link href="../public/backoffice/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../public/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <!-- Data Table CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['err'])) {
        $err = $_SESSION['err'];
        unset($_SESSION['err']);
    }
    ?>
</head>