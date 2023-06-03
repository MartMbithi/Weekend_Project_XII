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

/* Add Bank */
if (isset($_POST['Add_Bank'])) {
    $bank_officer_id = mysqli_real_escape_string($mysqli, $_POST['bank_officer_id']);
    $bank_name = mysqli_real_escape_string($mysqli, $_POST['bank_name']);
    $bank_location = mysqli_real_escape_string($mysqli, $_POST['bank_location']);
    $bank_blood_qty = mysqli_real_escape_string($mysqli, $_POST['bank_blood_qty']);

    /* Persist */
    $add_bank = "INSERT INTO blood_bank (bank_officer_id, bank_name, bank_location,  bank_blood_qty)
    VALUES('{$bank_officer_id}', '{$bank_name}', '{$bank_location}', '{$bank_blood_qty}')";

    if (mysqli_query($mysqli, $add_bank)) {
        $success = "Blood bank added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Bank */
if (isset($_POST['Update_Bank'])) {
    $bank_id = mysqli_real_escape_string($mysqli, $_POST['bank_id']);
    $bank_name = mysqli_real_escape_string($mysqli, $_POST['bank_name']);
    $bank_officer_id = mysqli_real_escape_string($mysqli, $_POST['bank_officer_id']);
    $bank_location = mysqli_real_escape_string($mysqli, $_POST['bank_location']);
    $bank_blood_qty  = mysqli_real_escape_string($mysqli, $_POST['bank_blood_qty']);

    /* Persist */
    $update_bank = "UPDATE blood_bank SET bank_name = '{$bank_name}', bank_officer_id = '{$bank_officer_id}', bank_location = '{$bank_location}',
    bank_blood_qty = '{$bank_blood_qty}' WHERE bank_id = '{$bank_id}'";

    if (mysqli_query($mysqli, $update_bank)) {
        $success = "Blood bank updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Bank */
if (isset($_POST['Delete_Bank'])) {
    $bank_id = mysqli_real_escape_string($mysqli, $_POST['bank_id']);

    /* Delete */
    $delete_bank = "DELETE FROM blood_bank WHERE bank_id = '{$bank_id}'";

    if (mysqli_query($mysqli, $delete_bank)) {
        $success = "Blood bank deleted";
    } else {
        $err  = "Failed, please try again";
    }
}


/* Add Donation */
if (isset($_POST['Add_Donation'])) {
    $donation_blood_donor_id = mysqli_real_escape_string($mysqli, $_POST['donation_blood_donor_id']);
    $donation_bank_id = mysqli_real_escape_string($mysqli, $_POST['donation_bank_id']);
    $donation_date_time = mysqli_real_escape_string($mysqli, $_POST['donation_date_time']);
    $donation_blood_amount = mysqli_real_escape_string($mysqli, $_POST['donation_blood_amount']);
    $donation_blood_status = mysqli_real_escape_string($mysqli, $_POST['donation_blood_status']);

    /* Add Donation */
    $add_donation = "INSERT INTO blood_donation (donation_blood_donor_id, donation_ref, donation_bank_id, donation_date_time, donation_blood_amount, donation_blood_status)
    VALUES('{$donation_blood_donor_id}', '{$donation_ref}', '{$donation_bank_id}', '{$donation_date_time}', '{$donation_blood_amount}', '{$donation_blood_status}')";

    if (mysqli_query($mysqli, $add_donation)) {
        $success = "Donation added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Donation */
if (isset($_POST['Update_Donation'])) {
    $donation_date_time = mysqli_real_escape_string($mysqli, $_POST['donation_date_time']);
    $donation_blood_amount = mysqli_real_escape_string($mysqli, $_POST['donation_blood_amount']);
    $donation_blood_status = mysqli_real_escape_string($mysqli, $_POST['donation_blood_status']);
    $donation_id = mysqli_real_escape_string($mysqli, $_POST['donation_id']);

    /* Persist */
    $update_donation = "UPDATE blood_donation SET donation_date_time = '{$donation_date_time}', 
    donation_blood_amount = '{$donation_blood_amount}', donation_blood_status = '{$donation_blood_status}' WHERE donation_id = '{$donation_id}'";

    if (mysqli_query($mysqli, $update_donation)) {
        $success = "Donation record updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Donations */
if (isset($_POST['Delete_Donation'])) {
    $donation_id = mysqli_real_escape_string($mysqli, $_POST['donation_id']);

    /* Persit */
    $delete_sql = "DELETE FROM blood_donation WHERE donation_id = '{$donation_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Donation record deleted";
    } else {
        $err = "Failed, please try again";
    }
}


/* Add Transfussion */
if (isset($_POST['Add_Transfussion'])) {
    $transfusion_donation_id = mysqli_real_escape_string($mysqli, $_POST['transfusion_donation_id']);
    $transfusion_patient_id = mysqli_real_escape_string($mysqli, $_POST['transfusion_patient_id']);
    $transfusion_officer_id = mysqli_real_escape_string($mysqli, $_POST['transfusion_officer_id']);
    $transfusion_date_time = mysqli_real_escape_string($mysqli, $_POST['transfusion_date_time']);
    $transfusion_blood_qty = mysqli_real_escape_string($mysqli, $_POST['transfusion_blood_qty']);

    /* Perists */
    $add_transfussion = "INSERT INTO blood_transfusion (transfusion_donation_id, transfusion_patient_id, transfusion_officer_id, transfusion_date_time, transfusion_blood_qty)
    VALUES('{$transfusion_donation_id}', '{$transfusion_patient_id}', '{$transfusion_officer_id}', '{$transfusion_date_time}', '{$transfusion_blood_qty}')";

    if (mysqli_query($mysqli, $add_transfussion)) {
        $success = "Transfussion record added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Transfussion */
if (isset($_POST['Update_Transfussion'])) {
    $transfusion_date_time = mysqli_real_escape_string($mysqli, $_POST['transfusion_date_time']);
    $transfusion_blood_qty = mysqli_real_escape_string($mysqli, $_POST['transfusion_blood_qty']);
    $transfusion_id = mysqli_real_escape_string($mysqli, $_POST['transfusion_id']);

    /* Persit */
    $update_transfussion = "UPDATE blood_transfusion SET transfusion_date_time = '{$transfusion_date_time}', transfusion_blood_qty = '{$transfusion_blood_qty}'
    WHERE transfusion_id = '{$transfusion_id}'";

    if (mysqli_query($mysqli, $update_transfussion)) {
        $success = "Transfussion record updated";
    } else {
        $err = "Failed, please try again";
    }
}

/*  Delete Transfussion*/
if (isset($_POST['Delete_Transfussion'])) {
    $transfusion_id = mysqli_real_escape_string($mysqli, $_POST['transfusion_id']);

    /* Persist */
    $delete_transfussion = "DELETE FROM blood_transfusion WHERE  transfusion_id = '{$transfusion_id}'";

    if (mysqli_query($mysqli, $delete_transfussion)) {
        $success = "Transfussion record deleted";
    } else {
        $err = "Failed, please try again";
    }
}
