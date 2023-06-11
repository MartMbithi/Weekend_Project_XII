<?php
/*
 *   Crafted On Sun Jun 11 2023
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
require_once('../app/config/checklogin.php');
require_once('../app/config/codeGen.php');
require_once('../app/config/config.php');
require_once('../app/helpers/users.php');
require_once('../app/partials/landing_head.php');
?>

<body class="shop_page">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <?php require_once('../app/partials/landing_header.php'); ?>
    <!-- Header End  -->

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">My Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index">Home</a></li>
                                <li class="ec-breadcrumb-item active">Payments</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User history section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-vendor-card-body">
                    <div class="ec-vendor-card-table">
                        <div class="ec-tab-wrapper ec-tab-wrapper-2">
                            <div class="ec-single-pro-tab-wrapper">
                                <div class="ec-single-pro-tab-nav">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details-2" role="tablist">
                                                Edit Personal Details
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info-2" role="tablist">
                                                Edit Authentication Details
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                $fetch_records_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM customer c
                                    INNER JOIN login l ON l.login_id = c.customer_login_id
                                    WHERE c.customer_login_id = '{$_SESSION['login_id']}'"
                                );
                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                ?>
                                        <div class="tab-content  ec-single-pro-tab-content">
                                            <div id="ec-spt-nav-details-2" class="tab-pane fade show active">
                                                <div class="ec-single-pro-tab-desc">
                                                    <div class="ec-register-wrapper">
                                                        <div class="ec-register-container">
                                                            <div class="ec-register-form">
                                                                <form method="post">
                                                                    <span class="ec-register-wrap ec-register-half">
                                                                        <label>First Name*</label>
                                                                        <input type="hidden" name="customer_id" value="<?php echo $rows['customer_id']; ?>">
                                                                        <input type="text" name="customer_first_name" value="<?php echo $rows['customer_first_name']; ?>" required />
                                                                    </span>
                                                                    <span class="ec-register-wrap ec-register-half">
                                                                        <label>Last Name*</label>
                                                                        <input type="text" value="<?php echo $rows['customer_last_name']; ?>" name="customer_last_name" required />
                                                                    </span>
                                                                    <span class="ec-register-wrap ec-register-half">
                                                                        <label>Email*</label>
                                                                        <input type="email" value="<?php echo $rows['customer_email']; ?>" name="customer_email" required />
                                                                    </span>
                                                                    <span class="ec-register-wrap ec-register-half">
                                                                        <label>Phone Number*</label>
                                                                        <input type="text" value="<?php echo $rows['customer_phone_number']; ?>" name="customer_phone_number" required />
                                                                    </span>
                                                                    <span class="ec-register-wrap">
                                                                        <label>Address</label>
                                                                        <input type="text" name="customer_address" value="<?php echo $rows['customer_address']; ?>" required />
                                                                    </span>
                                                                    <button class="btn btn-primary" name="Update_Customer" type="submit">Save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="ec-spt-nav-info-2" class="tab-pane fade">
                                                <div class="ec-single-pro-tab-moreinfo">
                                                    <div class="ec-register-wrapper">
                                                        <div class="ec-register-container">
                                                            <div class="ec-register-form">
                                                                <form method="post">
                                                                    <span class="ec-register-wrap ec-register-full">
                                                                        <label>Login Username*</label>
                                                                        <input type="text" name="login_username" value="<?php echo $rows['login_username']; ?>" required />
                                                                    </span>
                                                                    <span class="ec-register-wrap ec-register-half">
                                                                        <label>New Password*</label>
                                                                        <input type="password" name="new_password" required />
                                                                    </span>
                                                                    <span class="ec-register-wrap ec-register-half">
                                                                        <label>Confirm Password*</label>
                                                                        <input type="password" name="confirm_password" required />
                                                                    </span>
                                                                    <button class="btn btn-primary" name="Update_Auth_Details_Staff" type="submit">Save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User history section -->

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- Footer Area End -->

    <!-- Vendor JS -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>
</body>

</html>