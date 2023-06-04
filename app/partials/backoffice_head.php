<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="DevLanSol">

    <!-- App Favicon -->
    <link rel="icon" href="../public/landing/images/favicon/favicon.png" sizes="32x32" />

    <!-- App title -->
    <title>eFurniture Store - One Stop Shop For All Custom Furnitures</title>
    <!-- DataTables -->
    <link href="../public/backoffice/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/backoffice/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../public/backoffice/plugins/morris/morris.css">

    <!-- Switchery css -->
    <link href="../public/backoffice/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="../public/backoffice/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="../public/backoffice/css/style.css" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="../public/backoffice/js/modernizr.min.js"></script>

    <!-- Sweet Alets -->

    <!-- Sweet alerts -->
    <link rel="stylesheet" href="../public/landing/js/sweetalert2/sweetalert2.min.css">

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