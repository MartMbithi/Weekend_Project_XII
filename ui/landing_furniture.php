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
require_once('../app/config/config.php');
/* require_once('../app/config/checklogin.php');
 */
require_once('../app/partials/landing_head.php');
?>

<body class="product_page">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <?php require_once('../app/partials/landing_header.php'); ?>
    <!-- Header End  -->

    <?php
    $today = strtotime(date('d M Y'));
    $fetch_records_sql = mysqli_query(
        $mysqli,
        "SELECT * FROM furniture f
        INNER JOIN furniture_category fc ON fc.category_id = f.furniture_category_id
        INNER JOIN furniture_seller fs ON fs.seller_id = f.furniture_seller_id
        WHERE f.furniture_id = '{$_GET['view']}'
        "
    );
    if (mysqli_num_rows($fetch_records_sql) > 0) {
        while ($rows = mysqli_fetch_array($fetch_records_sql)) {
    ?>
            <!-- Ec breadcrumb start -->
            <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row ec_breadcrumb_inner">
                                <div class="col-md-6 col-sm-12">
                                    <h2 class="ec-breadcrumb-title"></h2>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <!-- ec-breadcrumb-list start -->
                                    <ul class="ec-breadcrumb-list">
                                        <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                        <li class="ec-breadcrumb-item"><a href="landing_furniture">Furnitures</a></li>
                                        <li class="ec-breadcrumb-item active"><?php echo $rows['furniture_name']; ?></li>
                                    </ul>
                                    <!-- ec-breadcrumb-list end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ec breadcrumb end -->


            <section class="ec-page-content section-space-p">
                <div class="container">
                    <div class="row">
                        <div class="ec-pro-rightside ec-common-rightside col-lg-12 order-lg-last col-md-12 order-md-first">

                            <!-- Single product content Start -->
                            <div class="single-pro-block">
                                <div class="single-pro-inner">
                                    <div class="row">
                                        <div class="single-pro-img">
                                            <div class="single-product-scroll">
                                                <div class="single-product-cover">
                                                    <?php
                                                    $fetch_images_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM furniture_images WHERE 
                                                        furniture_image_furniture_id = '{$rows['furniture_id']}'
                                                        ORDER BY RAND()"
                                                    );
                                                    if (mysqli_num_rows($fetch_images_sql) > 0) {
                                                        while ($images = mysqli_fetch_array($fetch_images_sql)) {
                                                    ?>
                                                            <div class="single-slide zoom-image-hover">
                                                                <img class="img-responsive" src="../storage/<?php echo $images['furniture_image']; ?>" alt="">
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </div>
                                                <div class="single-nav-thumb">
                                                    <?php
                                                    $fetch_images_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM furniture_images WHERE 
                                                        furniture_image_furniture_id = '{$rows['furniture_id']}'
                                                        ORDER BY RAND()"
                                                    );
                                                    if (mysqli_num_rows($fetch_images_sql) > 0) {
                                                        while ($images = mysqli_fetch_array($fetch_images_sql)) {
                                                    ?>
                                                            <div class="single-slide">
                                                                <img class="img-responsive" src="../storage/<?php echo $images['furniture_image']; ?>" alt="">
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-pro-desc">
                                            <div class="single-pro-content">
                                                <h5 class="ec-single-title"><?php echo $rows['furniture_name']; ?></h5>
                                                <div class="ec-single-desc">
                                                    <?php echo $rows['furniture_description']; ?>
                                                </div>
                                                <form method="post">
                                                    <div class="ec-single-price-stoke">
                                                        <div class="ec-single-price">
                                                            <span class="ec-single-ps-title">As low as</span>
                                                            <span class="new-price">Ksh <?php echo number_format($rows['furniture_price']); ?></span>
                                                        </div>
                                                        <div class="ec-single-stoke">
                                                            <?php if ($rows['furniture_status'] == 'Available') { ?>
                                                                <span class="ec-single-ps-title text-success">IN STOCK</span>
                                                            <?php } else { ?>
                                                                <span class="ec-single-ps-title text-danger">OUT OF STOCK</span>
                                                            <?php } ?>
                                                            <span class="ec-single-sku">SKU#: <?php echo $rows['furniture_sku_code']; ?></span>
                                                        </div>
                                                    </div>
                                                    <?php if ($_SESSION['login_rank'] == 'Customer') {
                                                        /* Pull Customer Details */
                                                        
                                                    ?>

                                                        <div class="ec-single-qty">
                                                            <?php if ($rows['furniture_status'] == 'Available') { ?>
                                                                <!-- Hide This -->
                                                                <input type="hidden" name="order_customer_id" value="<?php echo $customer_id; ?>">
                                                                <input type="hidden" name="order_ref_code" value="<?php echo $refs; ?>">
                                                                <input type="hidden" name="order_estimated_delivery_date" value="<?php echo date('d M Y', strtotime("+7 day", $today)); ?>">
                                                                <input type="hidden" name="order_estimated_delivery_date" value="<?php echo date('d M Y', strtotime("+7 day", $today)); ?>">
                                                                <div class="qty-plus-minus">
                                                                    <input class="qty-input" type="text" name="order_qty" value="1" />
                                                                </div>
                                                                <div class="ec-single-cart ">
                                                                    <button class="btn btn-primary">Order Item</button>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="ec-single-cart ">
                                                                    <button class="btn btn-danger">Out of stock</button>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="ec-single-qty">
                                                            <?php if ($rows['furniture_status'] == 'Available') { ?>
                                                                <div class="ec-single-cart ">
                                                                    <a href="login" class="btn btn-primary">Login To Order Item</a>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="ec-single-cart ">
                                                                    <button class="btn btn-danger">Out of stock</button>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php }
    } ?>

    <!-- Related Product Start -->
    <section class="section ec-releted-product section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Top Rated Custom Furnitures</h2>
                        <p class="sub-title">Related Funrnitures</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-b-30">
                <!-- Related Product Content -->
                <?php
                $fetch_records_sql = mysqli_query(
                    $mysqli,
                    "SELECT * FROM furniture f
                INNER JOIN furniture_category fc ON fc.category_id = f.furniture_category_id
                INNER JOIN furniture_seller fs ON fs.seller_id = f.furniture_seller_id
                WHERE fc.category_id = '{$_GET['cat']}' AND f.furniture_id != '{$_GET['view']}'
                "
                );
                if (mysqli_num_rows($fetch_records_sql) > 0) {
                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                            <div class="ec-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="landing_furniture?view=<?php echo $rows['furniture_id']; ?>" class="image">
                                            <?php
                                            $fetch_images_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM furniture_images WHERE 
                                                furniture_image_furniture_id = '{$rows['furniture_id']}'
                                                ORDER BY RAND() LIMIT 1 "
                                            );
                                            if (mysqli_num_rows($fetch_images_sql) > 0) {
                                                while ($images = mysqli_fetch_array($fetch_images_sql)) {
                                            ?>
                                                    <img class="main-image" src="../storage/<?php echo $images['furniture_image']; ?>" alt="Product" />
                                                    <img class="hover-image" src="../storage/<?php echo $images['furniture_image']; ?>" alt="Product" />
                                            <?php }
                                            } ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <h5 class="ec-pro-title">
                                        <a href="landing_furniture?view=<?php echo $rows['furniture_id']; ?>&cat=<?php echo $rows['category_id']; ?>">
                                            <?php echo $rows['furniture_name']; ?>
                                        </a>
                                    </h5>
                                    <span class="ec-price">
                                        <span class="old-price">Kes <?php echo  number_format($rows['furniture_price'] + '5000'); ?></span>
                                        <span class="new-price">Kes <?php echo  number_format($rows['furniture_price']); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
    <!-- Related Product end -->

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>
    <!-- Footer Area End -->

    <!-- Vendor JS -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>

</body>

</html>