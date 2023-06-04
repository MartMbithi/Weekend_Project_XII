<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/helpers/auth.php');
require_once('../app/partials/landing_head.php');
?>

<body>
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
                            <h2 class="ec-breadcrumb-title">Create Account</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                <li class="ec-breadcrumb-item active">Create Account</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec login page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Sign Up</h2>
                        <h2 class="ec-title">Sign Up</h2>
                    </div>
                </div>
                <div class="ec-tab-wrapper ec-tab-wrapper-2">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details-2" role="tablist">
                                        Create Customer Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info-2" role="tablist">
                                        Create Furniture Seller Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            <div id="ec-spt-nav-details-2" class="tab-pane fade show active">
                                <div class="ec-single-pro-tab-desc">
                                    <div class="ec-register-wrapper">
                                        <div class="ec-register-container">
                                            <div class="ec-register-form">
                                                <form method="post">
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>First Name*</label>
                                                        <input type="text" name="customer_first_name" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="customer_last_name" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Email*</label>
                                                        <input type="email" name="customer_email" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Phone Number*</label>
                                                        <input type="text" name="customer_phone_number" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Login password*</label>
                                                        <input type="password" name="new_password" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Confirm password*</label>
                                                        <input type="password" name="confirm_password" required />
                                                    </span>
                                                    <span class="ec-register-wrap">
                                                        <label>Address</label>
                                                        <input type="text" name="customer_address"  />
                                                    </span>
                                                    <button class="btn btn-primary" name="Customer_Signup" type="submit">Register</button>
                                                    </span>
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
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>First Name*</label>
                                                        <input type="text" name="seller_first_name" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="seller_last_name" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Email*</label>
                                                        <input type="email" name="seller_email" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Phone Number*</label>
                                                        <input type="text" name="seller_phone_number" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Login password*</label>
                                                        <input type="password" name="new_password" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Confirm password*</label>
                                                        <input type="password" name="confirm_password" required />
                                                    </span>
                                                    <span class="ec-register-wrap">
                                                        <label>Address</label>
                                                        <input type="text" name="seller_address" required />
                                                    </span>
                                                    <button class="btn btn-primary" name="Seller_Signup" type="submit">Register</button>
                                                    </span>
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
    </section>

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- Footer Area End -->


    <!-- Scripts -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>

</body>


</html>