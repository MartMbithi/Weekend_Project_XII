<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/functions/analytics.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>

    <!-- Navigation Bar-->
    <?php require_once('../app/partials/backoffice_header.php'); ?>
    <!-- End Navigation Bar-->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>

            <?php require_once('../app/partials/dashboards/admin.php'); ?>

        </div> <!-- container -->

        <!-- Footer -->
        <?php require_once('../app/partials/backoffice_footer.php'); ?>
        <!-- End Footer -->

    </div> <!-- End wrapper -->


    <!-- Scripts -->
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>

</body>

</html>