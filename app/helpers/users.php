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


/* Update Passwords Details */
if (isset($_POST['Update_Auth_Details_Staff'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check If Passwords Match */
    if ($confirm_password != $new_password) {
        $err = "Please enter matching passwords";
    } else {
        /* Change Passwords */
        $update_auth = "UPDATE login SET login_username = '{$login_username}', login_password = '{$confirm_password}'
        WHERE login_id = '{$login_id}'";

        if (mysqli_query($mysqli, $update_auth)) {
            $success = "Passwords updated";
        } else {
            $err =  "Failed, please try again";
        }
    }
}

/* Update Staff Profile */
if (isset($_POST['Update_Staff_Profile'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);
    $admin_first_name = mysqli_real_escape_string($mysqli, $_POST['admin_first_name']);
    $admin_last_name = mysqli_real_escape_string($mysqli, $_POST['admin_last_name']);
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);
    $admin_phone_number = mysqli_real_escape_string($mysqli, $_POST['admin_phone_number']);

    /* Update */
    $update_sql = "UPDATE administrator SET admin_first_name = '{$admin_first_name}', admin_last_name = '{$admin_last_name}', admin_email = '{$admin_email}',
    admin_phone_number = '{$admin_phone_number}' WHERE admin_login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Profile updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Admins */
if (isset($_POST['Add_Staff_Details'])) {
    $admin_first_name = mysqli_real_escape_string($mysqli, $_POST['admin_first_name']);
    $admin_last_name = mysqli_real_escape_string($mysqli, $_POST['admin_last_name']);
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);
    $admin_phone_number = mysqli_real_escape_string($mysqli, $_POST['admin_phone_number']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check Passwords  */
    if ($new_password != $confirm_password) {
        $err = "Password does not match";
    } else {
        /* Duplication checker */
        $duplication_checker = "SELECT * FROM login WHERE login_username = '{$admin_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "Email already exists";
        } else {
            /* Persist Auth */
            $auth_sql = "INSERT INTO login (login_username, login_password, login_rank)
            VALUES('{$admin_email}', '{$new_password}', 'Admin')";

            if (mysqli_query($mysqli, $auth_sql)) {
                $admin_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persit Admin */
                $admin_sql = "INSERT INTO administrator (admin_login_id, admin_first_name, admin_last_name, admin_email, admin_phone_number)
            VALUES('{$admin_login_id}', '{$admin_first_name}', '{$admin_last_name}', '{$admin_email}', '{$admin_phone_number}')";

                if (mysqli_query($mysqli, $admin_sql)) {
                    $success = "Staff account created";
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $err = "Failed, please try again";
            }
        }
    }
}

/* Update Staff */
if (isset($_POST['Update_Staff_Details'])) {
    $admin_id = mysqli_real_escape_string($mysqli, $_POST['admin_id']);
    $admin_first_name = mysqli_real_escape_string($mysqli, $_POST['admin_first_name']);
    $admin_last_name = mysqli_real_escape_string($mysqli, $_POST['admin_last_name']);
    $admin_email = mysqli_real_escape_string($mysqli, $_POST['admin_email']);
    $admin_phone_number = mysqli_real_escape_string($mysqli, $_POST['admin_phone_number']);

    /* Persist */
    $update_sql = "UPDATE administrator SET admin_first_name = '{$admin_first_name}', admin_last_name = '{$admin_last_name}',
    admin_email = '{$admin_email}', admin_phone_number ='{$admin_phone_number}' WHERE admin_id = '{$admin_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Staff details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Staff */
if (isset($_POST['Delete_Staff_Details'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_POST['login_id']);

    /* Persist */
    $delete_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Staff details deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Seller */
if (isset($_POST['Add_Seller'])) {
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
        /* Prevent duplications */
        $duplication_checker = "SELECT * FROM login WHERE login_username = '{$seller_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "Email already exists";
        } else {
            /* Persit auth */
            $auth_sql = "INSERT INTO login (login_username, login_rank, login_password) VALUES('{$seller_email}', 'Seller', '{$confirm_password}')";

            if (mysqli_query($mysqli, $auth_sql)) {
                /* Get Seller Auth Login Id */
                $seller_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persist Seller Details */
                $seller_sql = "INSERT INTO furniture_seller(seller_login_id, seller_first_name, seller_last_name, seller_email, seller_phone_number, seller_address)
                VALUES('{$seller_login_id}', '{$seller_first_name}', '{$seller_last_name}', '{$seller_email}', '{$seller_phone_number}', '{$seller_address}')";

                if (mysqli_query($mysqli, $seller_sql)) {
                    $success = "Account created";
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $err = "Failed, please try again";
            }
        }
    }
}

/* Update Seller */
if (isset($_POST['Update_Seller'])) {
    $seller_id = mysqli_real_escape_string($mysqli, $_POST['seller_id']);
    $seller_first_name = mysqli_real_escape_string($mysqli, $_POST['seller_first_name']);
    $seller_last_name = mysqli_real_escape_string($mysqli, $_POST['seller_last_name']);
    $seller_email = mysqli_real_escape_string($mysqli, $_POST['seller_email']);
    $seller_phone_number = mysqli_real_escape_string($mysqli, $_POST['seller_phone_number']);
    $seller_address = mysqli_real_escape_string($mysqli, $_POST['seller_address']);

    /* Persist */
    $update_sql = "UPDATE furniture_seller SET seller_first_name ='{$seller_first_name}', seller_last_name = '{$seller_last_name}',
    seller_email = '{$seller_email}', seller_phone_number = '{$seller_phone_number}', seller_address = '{$seller_address}'
    WHERE seller_id = '{$seller_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Seller */
if (isset($_POST['Delete_Seller'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_POST['login_id']);

    /* Persist */
    $delete_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Details deleted";
    } else {
        $err = "Failed, please try again";
    }
}


/* Add Customer */
if (isset($_POST['Add_Customer'])) {
    $customer_first_name = mysqli_real_escape_string($mysqli, $_POST['customer_first_name']);
    $customer_last_name = mysqli_real_escape_string($mysqli, $_POST['customer_last_name']);
    $customer_email = mysqli_real_escape_string($mysqli, $_POST['customer_email']);
    $customer_phone_number = mysqli_real_escape_string($mysqli, $_POST['customer_phone_number']);
    $customer_address = mysqli_real_escape_string($mysqli, $_POST['customer_address']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check Passwords */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    }
    /* Prevent duplications */
    $duplication_checker = "SELECT * FROM login WHERE login_username = '{$customer_email}'";
    $res = mysqli_query($mysqli, $duplication_checker);
    if (mysqli_num_rows($res) > 0) {
        $err = "Email already exists";
    } else {
        /* Persist Auth */
        $auth_sql = "INSERT INTO login (login_username, login_rank, login_password) VALUES('{$customer_email}', 'Customer', '{$confirm_password}')";
        if (mysqli_query($mysqli, $auth_sql)) {
            $customer_login_id  = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

            /* Persist Cutomer Details */
            $add_customer = "INSERT INTO customer (customer_login_id, customer_first_name, customer_last_name, customer_email, customer_phone_number, customer_address)
            VALUES('{$customer_login_id}', '{$customer_first_name}', '{$customer_last_name}', '{$customer_email}', '{$customer_phone_number}', '{$customer_address}')";

            if (mysqli_query($mysqli, $add_customer)) {
                $success = "Account created";
            } else {
                $err = "Failed, please try again";
            }
        } else {
            $err = "Failed, please try again";
        }
    }
}


/* Update Customer */
if (isset($_POST['Update_Customer'])) {
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);
    $customer_first_name = mysqli_real_escape_string($mysqli, $_POST['customer_first_name']);
    $customer_last_name = mysqli_real_escape_string($mysqli, $_POST['customer_last_name']);
    $customer_email = mysqli_real_escape_string($mysqli, $_POST['customer_email']);
    $customer_phone_number = mysqli_real_escape_string($mysqli, $_POST['customer_phone_number']);
    $customer_address = mysqli_real_escape_string($mysqli, $_POST['customer_address']);

    /* Persist */
    $update_sql = "UPDATE customer SET customer_first_name = '{$customer_first_name}', customer_last_name = '{$customer_last_name}',
    customer_email = '{$customer_email}', customer_phone_number = '{$customer_phone_number}', customer_address = '{$customer_address}'
    WHERE customer_id = '{$customer_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Customer */
if (isset($_POST['Delete_Customer'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_POST['login_id']);

    /* Delete */
    $delete_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Details deleted";
    } else {
        $err = "Failed, please try again";
    }
}
