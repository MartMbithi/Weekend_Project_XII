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
                                                        <input type="text" name="customer_address" />
                                                    </span>
                                                    <button class="btn btn-primary" type="submit">Register</button>
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
                                                <form action="#" method="post">
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>First Name*</label>
                                                        <input type="text" name="firstname" placeholder="Enter your first name" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="lastname" placeholder="Enter your last name" required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Email*</label>
                                                        <input type="email" name="email" placeholder="Enter your email add..." required />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Phone Number*</label>
                                                        <input type="text" name="phonenumber" placeholder="Enter your phone number" required />
                                                    </span>
                                                    <span class="ec-register-wrap">
                                                        <label>Address</label>
                                                        <input type="text" name="address" placeholder="Address Line 1" />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>City *</label>
                                                        <span class="ec-rg-select-inner">
                                                            <select name="ec_select_city" id="ec-select-city" class="ec-register-select">
                                                                <option selected disabled>City</option>
                                                                <option value="1">City 1</option>
                                                                <option value="2">City 2</option>
                                                                <option value="3">City 3</option>
                                                                <option value="4">City 4</option>
                                                                <option value="5">City 5</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Post Code</label>
                                                        <input type="text" name="postalcode" placeholder="Post Code" />
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Country *</label>
                                                        <span class="ec-rg-select-inner">
                                                            <select name="ec_select_country" id="ec-select-country" class="ec-register-select">
                                                                <option selected disabled>Country</option>
                                                                <option value="1">Country 1</option>
                                                                <option value="2">Country 2</option>
                                                                <option value="3">Country 3</option>
                                                                <option value="4">Country 4</option>
                                                                <option value="5">Country 5</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-half">
                                                        <label>Region State</label>
                                                        <span class="ec-rg-select-inner">
                                                            <select name="ec_select_state" id="ec-select-state" class="ec-register-select">
                                                                <option selected disabled>Region/State</option>
                                                                <option value="1">Region/State 1</option>
                                                                <option value="2">Region/State 2</option>
                                                                <option value="3">Region/State 3</option>
                                                                <option value="4">Region/State 4</option>
                                                                <option value="5">Region/State 5</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="ec-register-wrap ec-recaptcha">
                                                        <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></span>
                                                        <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                                                        <span class="help-block with-errors"></span>
                                                    </span>
                                                    <span class="ec-register-wrap ec-register-btn">
                                                        <button class="btn btn-primary" type="submit">Register</button>
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