<?php
/*
 *   Crafted On Sun May 21 2023
 *   Author Martin Mbithi (martin@devlan.co.ke)
 *   
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/helpers/users.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php require_once('../app/partials/backoffice_loader.php'); ?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?php require_once('../app/partials/backoffice_header.php'); ?>

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require_once('../app/partials/backoffice_sidebar.php'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <?php
        $login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);
        $fetch_records_sql = mysqli_query(
            $mysqli,
            "SELECT * FROM clinical_officer co
            INNER JOIN login l ON
            l.login_id = co.officer_login_id
            WHERE officer_login_id = '{$login_id}'"
        );
        if (mysqli_num_rows($fetch_records_sql) > 0) {
            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
        ?>

                <!--**********************************
            Content body start
        ***********************************-->
                <div class="content-body">
                    <div class="container-fluid">
                        <div class="page-titles">
                            <h4>Profile</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                            </ol>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="profile card card-body px-3 pt-3 pb-0">
                                    <div class="profile-head">
                                        <div class="photo-content">
                                            <div style="background-size: cover; background-position: center; min-height: 250px;
                                            width: 100%;background: url(../public/landing/images/home_1_slider_1.jpg);">
                                            </div>
                                        </div>
                                        <div class="profile-info">
                                            <div class="profile-photo">
                                                <img src="../public/backoffice/images/profile/no-profile.png" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <div class="profile-details">
                                                <div class="profile-name px-3 pt-2">
                                                    <h4 class="text-primary mb-0"><?php echo $rows['officer_names']; ?></h4>
                                                    <p><?php echo $rows['login_rank']; ?></p>
                                                </div>
                                                <div class="profile-email px-2 pt-2">
                                                    <h4 class="text-muted mb-0"><?php echo $rows['officer_email']; ?></h4>
                                                    <p>Email</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-tab">
                                            <div class="custom-tab-1">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a href="#my-posts" data-toggle="tab" class="nav-link active show">
                                                            Personal Details
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#about-me" data-toggle="tab" class="nav-link">
                                                            Authentication Details
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="my-posts" class="tab-pane fade active show">
                                                        <br>
                                                        <!-- Update Personal Details -->
                                                        <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Full names</label>
                                                                    <input type="text" required name="officer_names" value="<?php echo $rows['officer_names']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Contacts</label>
                                                                    <input type="text" required name="officer_contacts" value="<?php echo $rows['officer_contacts']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Email</label>
                                                                    <input type="text" required name="officer_email" value="<?php echo $rows['officer_email']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Adddress</label>
                                                                    <input type="text" required name="officer_address" value="<?php echo $rows['officer_address']; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" name="Update_Profile" class="btn btn-outline-danger">Update Profile</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div id="about-me" class="tab-pane fade">
                                                        <br>
                                                        <!-- Update Auth Details -->
                                                        <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="">Login Username</label>
                                                                    <input type="email" required name="login_username" value="<?php echo $rows['login_username']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">New Password</label>
                                                                    <input type="password" required name="new_password" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Confirm Password</label>
                                                                    <input type="password" required name="confirm_password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" name="Update_Auth_Details" class="btn btn-outline-danger">Update Passwords</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--**********************************
            Content body end
        ***********************************-->
        <?php }
        } ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <?php require_once('../app/partials/backoffice_footer.php'); ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!-- Required vendors -->
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>