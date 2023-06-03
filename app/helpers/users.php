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

/* Update Profile Details */
if (isset($_POST['Update_Profile'])) {
    $officer_names = mysqli_real_escape_string($mysqli, $_POST['officer_names']);
    $officer_email = mysqli_real_escape_string($mysqli, $_POST['officer_email']);
    $officer_contacts = mysqli_real_escape_string($mysqli, $_POST['officer_contacts']);
    $officer_address = mysqli_real_escape_string($mysqli, $_POST['officer_address']);
    $officer_login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);

    /* Persit */
    $update_officer = "UPDATE clinical_officer SET officer_names = '{$officer_names}', officer_email = '{$officer_email}',
    officer_contacts = '{$officer_contacts}', officer_address = '{$officer_address}' WHERE officer_login_id = '{$officer_login_id}'";

    if (mysqli_query($mysqli, $update_officer)) {
        $success = "Details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Passwords Details */
if (isset($_POST['Update_Auth_Details'])) {
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


/* Add User */
if (isset($_POST['Add_Officer'])) {
    $officer_names = mysqli_real_escape_string($mysqli, $_POST['officer_names']);
    $officer_email = mysqli_real_escape_string($mysqli, $_POST['officer_email']);
    $officer_contacts = mysqli_real_escape_string($mysqli, $_POST['officer_contacts']);
    $officer_address = mysqli_real_escape_string($mysqli, $_POST['officer_address']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));
    $login_rank = mysqli_real_escape_string($mysqli, $_POST['login_rank']);

    /* Persist Login */
    $duplication_checker = "SELECT * FROM login WHERE login_username = '{$officer_email}'";
    $res = mysqli_query($mysqli, $duplication_checker);
    if (mysqli_num_rows($res) > 0) {
        $err = "An account with this email already exists";
    } else {
        /* Persist */
        $add_officer_auth = "INSERT INTO login (login_username, login_password, login_rank)
         VALUES('{$officer_email}', '{$login_password}', '{$login_rank}')";

        if (mysqli_query($mysqli, $add_officer_auth)) {
            $officer_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

            $add_officer_sql = "INSERT INTO clinical_officer (officer_login_id, officer_number, officer_names, officer_email, officer_contacts, officer_address)
            VALUES('{$officer_login_id}', '{$sys_gen_unique_id}', '{$officer_names}', '{$officer_email}', '{$officer_contacts}', '{$officer_address}')";

            if (mysqli_query($mysqli, $add_officer_sql)) {
                $success = "Account created";
            } else {
                $err = "Failed, please try again";
            }
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Update Officer */
if (isset($_POST['Update_Officer'])) {
    $officer_names = mysqli_real_escape_string($mysqli, $_POST['officer_names']);
    $officer_email = mysqli_real_escape_string($mysqli, $_POST['officer_email']);
    $officer_contacts = mysqli_real_escape_string($mysqli, $_POST['officer_contacts']);
    $officer_address = mysqli_real_escape_string($mysqli, $_POST['officer_address']);
    $login_rank = mysqli_real_escape_string($mysqli, $_POST['login_rank']);
    $officer_login_id = mysqli_real_escape_string($mysqli, $_POST['officer_login_id']);

    /* Persit */
    $update_officer = "UPDATE clinical_officer SET officer_names = '{$officer_names}', officer_email = '{$officer_email}',
    officer_contacts = '{$officer_contacts}', officer_address = '{$officer_address}'
    WHERE officer_login_id = '{$officer_login_id}'";

    $login_rank_sql = "UPDATE login SET login_rank = '{$login_rank}' WHERE login_id = '{$officer_login_id}'";

    if (mysqli_query($mysqli, $update_officer) && mysqli_query($mysqli, $login_rank_sql)) {
        $success = "Details updated";
    } else {
        $err = "Failed, please try again";
    }
}


/* Delete Officer */
if (isset($_POST['Delete_Officer'])) {
    $officer_login_id = mysqli_real_escape_string($mysqli, $_POST['officer_login_id']);

    /* Persist */
    $delete_officer_sql = "DELETE FROM login WHERE login_id = '{$officer_login_id}'";

    if (mysqli_query($mysqli, $delete_officer_sql)) {
        $success = "Details deleted";
    } else {
        $err = "Failed, please try again";
    }
}


/* Add Donors */
if (isset($_POST['Add_Donor'])) {
    $blood_donor_names = mysqli_real_escape_string($mysqli, $_POST['blood_donor_names']);
    $blood_donor_email = mysqli_real_escape_string($mysqli, $_POST['blood_donor_email']);
    $blood_donor_contacts = mysqli_real_escape_string($mysqli, $_POST['blood_donor_contacts']);
    $blood_donor_address = mysqli_real_escape_string($mysqli, $_POST['blood_donor_address']);
    $blood_donor_blood_group = mysqli_real_escape_string($mysqli, $_POST['blood_donor_blood_group']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));

    /* Prevent duplications */
    $duplication_checker = "SELECT * FROM login WHERE login_username = '{$blood_donor_email}'";
    $res = mysqli_query($mysqli, $duplication_checker);
    if (mysqli_num_rows($res) > 0) {
        $err = "An account with this email already exists";
    } else {
        /* Persist Auth Details */
        $add_donor_auth = "INSERT INTO login (login_username, login_password, login_rank)
        VALUES('{$blood_donor_email}', '{$login_password}', 'Donor')";
        if (mysqli_query($mysqli, $add_donor_auth)) {
            $blood_donor_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

            /* Persist Donor Details */
            $add_blood_donor = "INSERT INTO blood_donor (blood_donor_login_id, blood_donor_names, blood_donor_email, blood_donor_contacts, blood_donor_address, blood_donor_blood_group)
            VALUES('{$blood_donor_login_id}', '{$blood_donor_names}', '{$blood_donor_email}', '{$blood_donor_contacts}', '{$blood_donor_address}', '{$blood_donor_blood_group}')";

            if (mysqli_query($mysqli, $add_blood_donor)) {
                $success = "Donor account created";
            } else {
                $err = "Failed, please try again";
            }
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Update Donor */
if (isset($_POST['Update_Donor'])) {
    $blood_donor_id = mysqli_real_escape_string($mysqli, $_POST['blood_donor_id']);
    $blood_donor_names = mysqli_real_escape_string($mysqli, $_POST['blood_donor_names']);
    $blood_donor_contacts = mysqli_real_escape_string($mysqli, $_POST['blood_donor_contacts']);
    $blood_donor_address = mysqli_real_escape_string($mysqli, $_POST['blood_donor_address']);
    $blood_donor_email = mysqli_real_escape_string($mysqli, $_POST['blood_donor_email']);
    $blood_donor_blood_group = mysqli_real_escape_string($mysqli, $_POST['blood_donor_blood_group']);

    /* Persist */
    $update_donor_sql = "UPDATE  blood_donor SET blood_donor_names = '{$blood_donor_names}', blood_donor_contacts = '{$blood_donor_contacts}',
    blood_donor_address = '{$blood_donor_address}', blood_donor_address  = '{$blood_donor_address}', blood_donor_email = '{$blood_donor_email}',
    blood_donor_blood_group = '{$blood_donor_blood_group}' WHERE  blood_donor_id = '{$blood_donor_id}'";

    if (mysqli_query($mysqli, $update_donor_sql)) {
        $success = "Donor details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Donor */
if (isset($_POST['Delete_Donor'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_POST['login_id']);

    /* Persit */
    $delete_donor_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";
    if (mysqli_query($mysqli, $delete_donor_sql)) {
        $success = "Donor deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Patient */
if (isset($_POST['Add_Patient'])) {
    $patient_names = mysqli_real_escape_string($mysqli, $_POST['patient_names']);
    $patient_email = mysqli_real_escape_string($mysqli, $_POST['patient_email']);
    $patient_contacts = mysqli_real_escape_string($mysqli, $_POST['patient_contacts']);
    $patient_address = mysqli_real_escape_string($mysqli, $_POST['patient_address']);
    $patient_blood_group = mysqli_real_escape_string($mysqli, $_POST['patient_blood_group']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));

    /* Prevent Duplication */
    $duplication_checker = "SELECT * FROM login WHERE login_username = '{$patient_email}'";
    $res = mysqli_query($mysqli, $duplication_checker);
    if (mysqli_num_rows($res) > 0) {
        $err = "An account with this email already exists";
    } else {
        /* Persist Patient Auth */
        $add_patient_auth = "INSERT INTO login (login_username, login_password, login_rank)
        VALUES('{$patient_email}', '{$login_password}', 'Patient')";

        if (mysqli_query($mysqli, $add_patient_auth)) {
            $patient_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));
            /* Persist Patient */
            $add_patient_sql = "INSERT INTO patient(patient_login_id, patient_names, patient_email, patient_contacts, patient_address, patient_blood_group)
            VALUES('{$patient_login_id}', '{$patient_names}', '{$patient_email}', '{$patient_contacts}', '{$patient_address}', '{$patient_blood_group}')";

            if (mysqli_query($mysqli, $add_patient_sql)) {
                $success = "Patient registered";
            } else {
                $err = "Failed, please try again";
            }
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Update Patient */
if (isset($_POST['Update_Patient'])) {
    $patient_names = mysqli_real_escape_string($mysqli, $_POST['patient_names']);
    $patient_email = mysqli_real_escape_string($mysqli, $_POST['patient_email']);
    $patient_contacts = mysqli_real_escape_string($mysqli, $_POST['patient_contacts']);
    $patient_address = mysqli_real_escape_string($mysqli, $_POST['patient_address']);
    $patient_blood_group = mysqli_real_escape_string($mysqli, $_POST['patient_blood_group']);
    $patient_id = mysqli_real_escape_string($mysqli, $_POST['patient_id']);

    /* Persist */
    $update_patient_sql = "UPDATE patient SET patient_names = '{$patient_names}', patient_email = '{$patient_email}', 
    patient_contacts = '{$patient_contacts}', patient_address = '{$patient_address}', patient_blood_group = '{$patient_blood_group}' 
    WHERE patient_id = '{$patient_id}'";

    if (mysqli_query($mysqli, $update_patient_sql)) {
        $success = "Patient details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Patient */
if (isset($_POST['Delete_Patient'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_POST['login_id']);


    /* Delete */
    $delete_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Patient details deleted";
    } else {
        $err = "Failed, please try again";
    }
}
