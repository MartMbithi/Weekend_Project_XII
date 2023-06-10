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

/* Add Category */
if (isset($_POST['Add_Category'])) {
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_description = mysqli_real_escape_string($mysqli, $_POST['category_description']);

    /* Persist */
    $add_sql = "INSERT INTO furniture_category (category_name, category_description) VALUES('{$category_name}', '{$category_description}')";

    if (mysqli_query($mysqli, $add_sql)) {
        $success = "Category details added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Category */
if (isset($_POST['Update_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_description = mysqli_real_escape_string($mysqli, $_POST['category_description']);

    /* Persist */
    $update_sql = "UPDATE furniture_category SET category_name = '{$category_name}', category_description = '{$category_description}'
    WHERE category_id = '{$category_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success  = "Category updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Category */
if (isset($_POST['Delete_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist */
    $delete_sql = "DELETE FROM furniture_category WHERE category_id = '{$category_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success  = "Category deleted";
    } else {
        $err = "Failed, please try again";
    }
}


/* ********************************************************* */

/* Add Furniture */
if (isset($_POST['Add_Furniture'])) {
    $furniture_seller_id = mysqli_real_escape_string($mysqli, $_POST['furniture_seller_id']);
    $furniture_category_id = mysqli_real_escape_string($mysqli, $_POST['furniture_category_id']);
    $furniture_sku_code = mysqli_real_escape_string($mysqli, $sku);
    $furniture_name = mysqli_real_escape_string($mysqli, $_POST['furniture_name']);
    $furniture_description = mysqli_real_escape_string($mysqli, $_POST['furniture_description']);
    $furniture_status = mysqli_real_escape_string($mysqli, 'Available');
    $furniture_price = mysqli_real_escape_string($mysqli, $_POST['furniture_price']);

    /* Persist  */
    $add_sql = "INSERT INTO furniture (furniture_seller_id, furniture_category_id, furniture_sku_code, furniture_name, furniture_description, furniture_status, furniture_price)
    VALUES('{$furniture_seller_id}', '{$furniture_category_id}', '{$furniture_sku_code}', '{$furniture_name}', '{$furniture_description}', '{$furniture_status}', '{$furniture_price}')";

    if (mysqli_query($mysqli, $add_sql)) {
        /* Insert Images */
        $furniture_image_furniture_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

        /* Process Images */
        $taget_directory = "../storage/";
        $allow_types = array('jpg', 'png', 'jpeg', 'gif');

        //$info = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';

        $furniture_image = array_filter($_FILES['furniture_image']['name']);
        if (!empty($furniture_image)) {
            foreach ($_FILES['furniture_image']['name'] as $key => $val) {
                // File upload path
                $single_furniture_images = $sku . ' ' . basename($_FILES['furniture_image']['name'][$key]);
                $target_file_path = $taget_directory . $single_furniture_images;

                // Check whether file type is valid
                $file_type = pathinfo($target_file_path, PATHINFO_EXTENSION);
                if (in_array($file_type, $allow_types)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["furniture_image"]["tmp_name"][$key], $target_file_path)) {
                        // Image db insert sql
                        $insertValuesSQL .= "('{$furniture_image_furniture_id}', '" . $single_furniture_images . "'),";
                    } else {
                        $errorUpload .= $_FILES['furniture_image']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['furniture_image']['name'][$key] . ' | ';
                }
            }

            // Error message
            $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
            $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
            $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

            /* Process Upload */
            if (!empty($insertValuesSQL)) {
                $insertValuesSQL = trim($insertValuesSQL, ',');
                // Insert image file name into database 
                $add_images_sql = "INSERT INTO furniture_images (furniture_image_furniture_id, furniture_image) VALUES $insertValuesSQL";
                if (mysqli_query($mysqli, $add_images_sql)) {
                    $success = "Furniture added";
                } else {
                    $err = "Failed, there was an error uploading your file.";
                }
            } else {
                $info = "Upload failed! " . $errorMsg;
            }
        } else {
            $err = "Failed, please select images";
        }
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Furniture */
if (isset($_POST['Update_Furniture'])) {
    $furniture_id = mysqli_real_escape_string($mysqli, $_POST['furniture_id']);
    $furniture_name = mysqli_real_escape_string($mysqli, $_POST['furniture_name']);
    $furniture_description = mysqli_real_escape_string($mysqli, $_POST['furniture_description']);
    $furniture_status = mysqli_real_escape_string($mysqli, $_POST['furniture_status']);
    $furniture_price = mysqli_real_escape_string($mysqli, $_POST['furniture_price']);

    /* Persit */
    $update_sql = "UPDATE furniture SET furniture_name = '{$furniture_name}',  furniture_description = '{$furniture_description}', furniture_status = '{$furniture_status}',
    furniture_price = '{$furniture_price}' WHERE furniture_id = '{$furniture_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Furniture updated";
    } else {
        $err  = "Failed, please try again";
    }
}

/* Delete Furniture */
if (isset($_POST['Delete_Furniture'])) {
    $furniture_id = mysqli_real_escape_string($mysqli, $_POST['furniture_id']);

    /* Delete */
    $delete_sql = "DELETE FROM furniture WHERE furniture_id = '{$furniture_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Furniture Deleted";
    } else {
        $err = "Failed, please try again";
    }
}
