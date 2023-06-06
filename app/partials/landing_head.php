 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

     <title>eFurniture Store - One Stop Shop For All Custom Furnitures</title>
     <meta name="author" content="DevlanSolLTD">

     <!-- site Favicon -->
     <link rel="icon" href="../public/landing/images/favicon/favicon.png" sizes="32x32" />
     <link rel="apple-touch-icon" href="../public/landing/images/favicon/favicon.png" />
     <meta name="msapplication-TileImage" content="../public/landing/images/favicon/favicon.png" />

     <!-- css Icon Font -->
     <link rel="stylesheet" href="../public/landing/css/vendor/ecicons.min.css" />

     <!-- css All Plugins Files -->
     <link rel="stylesheet" href="../public/landing/css/plugins/animate.css" />
     <link rel="stylesheet" href="../public/landing/css/plugins/swiper-bundle.min.css" />
     <link rel="stylesheet" href="../public/landing/css/plugins/jquery-ui.min.css" />
     <link rel="stylesheet" href="../public/landing/css/plugins/countdownTimer.css" />
     <link rel="stylesheet" href="../public/landing/css/plugins/slick.min.css" />
     <link rel="stylesheet" href="../public/landing/css/plugins/bootstrap.css" />

     <!-- Main Style -->
     <link rel="stylesheet" href="../public/landing/css/demo1.css" />
     <link rel="stylesheet" href="../public/landing/css/style.css" />
     <link rel="stylesheet" href="../public/landing/css/responsive.css" />

     <!-- Background css -->
     <link rel="stylesheet" id="bg-switcher-css" href="../public/landing/css/backgrounds/bg-4.css">

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