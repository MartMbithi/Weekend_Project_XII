<?php
/*
 *   Crafted On Wed May 17 2023
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

/* Login */
if (isset($_POST['Login'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));

    /* Process login */
    $login_sql = "SELECT * FROM login WHERE login_username = '{$login_username}' AND login_password = '{$login_password}'";
    $res = mysqli_query($mysqli, $login_sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['login_id'] = $row['login_id'];
        $_SESSION['login_rank'] = $row['login_rank'];

        /* Seperate After Auth Pages */
        if ($row['login_rank'] == 'Customer') {
            /* Customer Pages */
            $_SESSION['success'] = 'Logged in successfully';
            header('Location: index');
            exit;
        } else if ($row['login_rank'] == 'Seller') {
            /* Seller Pages */
            $_SESSION['success'] = 'Logged in successfully';
            header('Location: dashboard');
            exit;
        } else {
            /* Admin Pages */
            $_SESSION['success'] = 'Logged in successfully';
            header('Location: dashboard');
            exit;
        }
    } else {
        $_SESSION['err'] = 'Incorrect login details';
        header('Location: login');
        exit;
    }
}

/* Register - Customer */
if (isset($_POST['Customer_Signup'])) {
    $customer_first_name  = mysqli_real_escape_string($mysqli, $_POST['customer_first_name']);
    $customer_last_name = mysqli_real_escape_string($mysqli, $_POST['customer_last_name']);
    $customer_email = mysqli_real_escape_string($mysqli, $_POST['customer_email']);
    $customer_phone_number = mysqli_real_escape_string($mysqli, $_POST['customer_phone_number']);
    $customer_address = mysqli_real_escape_string($mysqli, $_POST['customer_address']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));


    /* Check Passwords  */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {
        /* Prevent Duplications */
        $duplication_checker = "SELECT * FROM login WHERE login_username = '{$customer_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "Email already exists";
        } else {
            /* Persist Auth */
            $auth_sql = "INSERT INTO login (login_username, login_password, login_rank)
            VALUES('{$customer_email}', '{$new_password}', 'Customer')";

            if (mysqli_query($mysqli, $auth_sql)) {
                /* Get Customer Login ID */
                $customer_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persit Customer Details */
                $add_customer = "INSERT INTO customer (customer_login_id, customer_first_name, customer_last_name, customer_email, customer_phone_number, customer_address)
                VALUES('{$customer_login_id}', '{$customer_first_name}', '{$customer_last_name}', '{$customer_email}', '{$customer_phone_number}', '{$customer_address}')";

                if (mysqli_query($mysqli, $add_customer)) {
                    $_SESSION['success'] = "Your account has been created, proceed to login";
                    header('Location: login');
                    exit;
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $err = "Failed to create customer account, try again later";
            }
        }
    }
}


/* Register - Furniture Seller  */
if (isset($_POST['Seller_Signup'])) {
    $seller_first_name = mysqli_real_escape_string($mysqli, $_POST['seller_first_name']);
    $seller_last_name = mysqli_real_escape_string($mysqli, $_POST['seller_last_name']);
    $seller_email = mysqli_real_escape_string($mysqli, $_POST['seller_email']);
    $seller_phone_number = mysqli_real_escape_string($mysqli, $_POST['seller_phone_number']);
    $seller_address = mysqli_real_escape_string($mysqli, $_POST['seller_address']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));


    /* Check Passwords */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {
        /* Prevent Duplications */
        $duplication_checker = "SELECT * FROM login WHERE login_username = '{$seller_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "Email already exists";
        } else {
            /* Persist seller auth */
            $auth_sql = "INSERT INTO login (login_username, login_password, login_rank)
            VALUES('{$seller_email}', '{$confirm_password}', 'Seller')";
            if (mysqli_query($mysqli, $auth_sql)) {
                /* Get Seller ID */
                $seller_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persist Seller */
                $seller_sql = "INSERT INTO furniture_seller (seller_login_id, seller_first_name, seller_last_name, seller_email, seller_phone_number, seller_address)
                VALUES('{$seller_login_id}', '{$seller_first_name}', '{$seller_last_name}', '{$seller_email}', '{$seller_phone_number}', '{$seller_address}')";

                if (mysqli_query($mysqli, $seller_sql)) {
                    $_SESSION['success'] = "Your account has been created, proceed to login";
                    header('Location: login');
                    exit;
                } else {
                    $err = "Failed creating your account, please try again";
                }
            } else {
                $err = "Failed creating your account, please try again";
            }
        }
    }
}

/* Reset Password Step 1 */
if (isset($_POST['Reset_Password_1'])) {
    $login_username  = mysqli_real_escape_string($mysqli, $_POST['login_username']);

    /* Check If Login Username Exists */
    $username_checker = "SELECT * FROM login WHERE login_username = '{$login_username}'";
    $res = mysqli_query($mysqli, $username_checker);
    if (mysqli_num_rows($res) > 0) {
        /* Redirect to reset password step 2 */
        $_SESSION['success'] = "Login username verified, proceed to reset password";
        header('Location: confirm_password');
        exit;
    } else {
        $err = "Login username does not exist";
    }
}

/* Reset Password Step 2 */
if (isset($_POST['Reset_Password_Step_2'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_SESSION['login_username']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check Passwords Compatibility */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {
        /* Persist */
        $update_passwords = "UPDATE login SET login_password = '{$confirm_password}' WHERE login_username = '{$login_username}'";

        if (mysqli_query($mysqli, $update_passwords)) {
            /* Redirect to login */
            $_SESSION['success'] = "Login password updated, proceed to login";
            header('Location: login');
            exit;
        } else {
            $err = "Failed to update password, please try again";
        }
    }
}
