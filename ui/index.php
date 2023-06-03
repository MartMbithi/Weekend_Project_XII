<?php
/*
 *   Crafted On Mon May 15 2023
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
require_once('../app/partials/landing_head.php');
?>

<body>

    <!-- Preloader & Header -->
    <?php require_once('../app/partials/landing_navigation.php'); ?>
    <!-- End Preloader & Header -->

    <!--  HOME SLIDER BLOCK  -->

    <section class="section-banner">

        <div class="container wow fadeInUp">

            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="banner-content">
                        <h2>
                            Welcome to Blood Donor Information Management System
                        </h2>
                        <a href="register" class="btn btn-slider">Register as Donor</a>
                    </div>
                </div> <!-- end .col-md-12  -->
            </div>

        </div>

    </section>

    <!--  SECTION DONATION PROCESS -->

    <section class="section-content-block section-process">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading"><span>Donation</span> Process</h2>
                    <p class="section-subheading">The donation process from the time you arrive center until the time you leave</p>
                </div> <!-- end .col-sm-10  -->

            </div> <!--  end .row  -->

            <div class="row wow fadeInUp">

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                    <div class="process-layout">

                        <figure class="process-img">

                            <img src="../public/landing/images/process_1.jpg" alt="process" />
                            <div class="step">
                                <h3>1</h3>
                            </div>
                        </figure> <!-- end .process-img  -->

                        <article class="process-info">
                            <h2>Registration</h2>
                            <p>You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process.</p>
                        </article>

                    </div> <!--  end .process-layout -->

                </div> <!--  end .col-lg-3 -->



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                    <div class="process-layout">

                        <figure class="process-img">
                            <img src="../public/landing/images/process_2.jpg" alt="process" />
                            <div class="step">
                                <h3>2</h3>
                            </div>
                        </figure> <!-- end .cau<h5 class="step">1</h5>se-img  -->

                        <article class="process-info">
                            <h2>Screening</h2>
                            <p>A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process.</p>
                        </article>

                    </div> <!--  end .process-layout -->

                </div> <!--  end .col-lg-3 -->


                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                    <div class="process-layout">

                        <figure class="process-img">
                            <img src="../public/landing/images/process_3.jpg" alt="process" />
                            <div class="step">
                                <h3>3</h3>
                            </div>
                        </figure> <!-- end .process-img  -->

                        <article class="process-info">
                            <h2>Donation</h2>
                            <p>After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes.</p>
                        </article>

                    </div> <!--  end .process-layout -->

                </div> <!--  end .col-lg-3 -->



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                    <div class="process-layout">

                        <figure class="process-img">
                            <img src="../public/landing/images/process_4.jpg" alt="process" />
                            <div class="step">
                                <h3>4</h3>
                            </div>
                        </figure> <!-- end .process-img  -->

                        <article class="process-info">
                            <h2>Refreshment</h2>
                            <p>You can also stay in sitting room until you feel strong enough to leave our center. You will receive awesome drink from us in donation zone. </p>
                        </article>

                    </div> <!--  end .process-layout -->

                </div> <!--  end .col-lg-3 -->

            </div> <!--  end .row -->

        </div> <!--  end .container  -->

    </section> <!--  end .section-process -->

    <section class="section-content-block cta-section-3">
        <div class="container wow fadeIn animated">
            <div class="row">
                <div class="col-md-12">
                    <div class="cta-content text-center">
                        <h2>Join with us and save life</h2>
                        <a class="btn-cta-3" href="register">Become a donor</a>
                    </div>
                </div> <!-- end .col-md-12 -->
            </div> <!-- end .row  -->
        </div> <!-- end .container  -->
    </section> <!-- end cta-section  -->


    <!-- START FOOTER  -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- END FOOTER  -->

    <!-- Scripts -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>
</body>



</html>