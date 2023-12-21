<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/config.php';
session_start();

$response = array(
    'status' => false,
    'message' => 'Setting has been updated.',
    'admin' => '',
    'operation' => '',
    'description' => '',
    'icon' => ''
);

$uploadDirectory = "../assets/images/logo/";
$logoName = isset($_FILES['systemlogo']['name']) ? $_FILES['systemlogo']['name'] : null;
$logoTmpName = isset($_FILES['systemlogo']['tmp_name']) ? $_FILES['systemlogo']['tmp_name'] : null;
$allowedExtensions = ['jpg', 'jpeg', 'png'];

// Debug statements for file upload details
error_log('File Upload Directory: ' . $uploadDirectory);
error_log('Logo Name: ' . $logoName);
error_log('Logo Temp Name: ' . $logoTmpName);

// Check if a file is uploaded
if (!empty($logoName)) {
    // Check for file upload errors
    if ($_FILES['systemlogo']['error'] != UPLOAD_ERR_OK) {
        $response['status'] = false;
        $response['icon'] = 'error';
        $response['message'] = 'File upload error: ' . $_FILES['systemlogo']['error'];
        echo json_encode($response);
        exit;
    }

    $logoExtension = strtolower(pathinfo($logoName, PATHINFO_EXTENSION));

    // Check if the uploaded file has an allowed extension
    if (!in_array($logoExtension, $allowedExtensions)) {
        $response['status'] = false;
        $response['icon'] = 'error';
        $response['message'] = 'Only JPEG & PNG images are allowed.';
        echo json_encode($response);
        exit;
    }

    $uploadedLogoPath = $uploadDirectory . $logoName;

    // Additional check for a valid image file
    $imageInfo = getimagesize($logoTmpName);
    if ($imageInfo === false) {
        $response['status'] = false;
        $response['icon'] = 'error';
        $response['message'] = 'Invalid image file.';
        echo json_encode($response);
        exit;
    }

    // Move the uploaded logo to the target directory
    move_uploaded_file($logoTmpName, $uploadedLogoPath);
}

// Check for the existence of form fields in $_POST before accessing them
$system_name = isset($_POST['system_name']) ? sanitizeData(getDatabase(), $_POST['system_name']) : '';
$system_alias = isset($_POST['system_alias']) ? sanitizeData(getDatabase(), $_POST['system_alias']) : '';
$system_description = isset($_POST['system_description']) ? sanitizeData(getDatabase(), $_POST['system_description']) : '';
$system_links = isset($_POST['system_links']) ? sanitizeData(getDatabase(), $_POST['system_links']) : '';
$system_address = isset($_POST['system_address']) ? sanitizeData(getDatabase(), $_POST['system_address']) : '';
$system_email = isset($_POST['system_email']) ? sanitizeData(getDatabase(), $_POST['system_email']) : '';
$system_contact = isset($_POST['system_contact']) ? sanitizeData(getDatabase(), $_POST['system_contact']) : '';
$system_uccMain = isset($_POST['system_uccMain']) ? sanitizeData(getDatabase(), $_POST['system_uccMain']) : '';
$system_north = isset($_POST['system_uccNorth']) ? sanitizeData(getDatabase(), $_POST['system_uccNorth']) : '';

// Check the database connection
if (!$db) {
    // Debug statement for database connection error
    error_log('Failed to connect to the database: ' . mysqli_connect_error());

    $response['status'] = false;
    $response['message'] = 'Failed to connect to the database.';
    http_response_code(500); // Internal Server Error
    echo json_encode($response);
    exit;
}

// Check if the logo is being updated
if (!empty($logoName)) {
    $updateSql = "UPDATE `settings` SET 
        `sName` = ?, `sAlias` = ?, `sDescription` = ?, `sLinks` = ?, 
        `sAddress` = ?, `sEmail` = ?, `sContact` = ?, `sMain` = ?, 
        `sNorth` = ?, `sLogo` = ?
        WHERE id = 2"; // Replace '1' with the actual ID of the record to be updated

    if ($preparedSql = $db->prepare($updateSql)) {
        $preparedSql->bind_param(
            "ssssssisss",
            $system_name, $system_alias, $system_description,
            $system_links, $system_address, $system_email,
            $system_contact, $system_uccMain, $system_north, $logoName
        );

        if ($preparedSql->execute()) {
            $response['status'] = true;
            $response['admin'] = $_SESSION['adminLogged'];
            $response['operation'] = "edit";
            $response['description'] = "Settings: <b>" . strtoupper($system_name) . "</b> has been updated.";
        } else {
            $response['status'] = false;
            $response['message'] = 'Failed to update system settings: ' . $preparedSql->error;
            http_response_code(500); // Internal Server Error
        }

        $preparedSql->close();
    } else {
        $response['status'] = false;
        $response['message'] = 'An error occurred while preparing the UPDATE statement: ' . $db->error;
        http_response_code(500); // Internal Server Error
    }
} else {
    // The logo is not being updated, so exclude it from the SQL query
    $updateSql = "UPDATE `settings` SET 
        `sName` = ?, `sAlias` = ?, `sDescription` = ?, `sLinks` = ?, 
        `sAddress` = ?, `sEmail` = ?, `sContact` = ?, `sMain` = ?, 
        `sNorth` = ?
        WHERE id = 2"; // Replace '1' with the actual ID of the record to be updated

    if ($preparedSql = $db->prepare($updateSql)) {
        $preparedSql->bind_param(
            "ssssssiss",
            $system_name, $system_alias, $system_description,
            $system_links, $system_address, $system_email,
            $system_contact, $system_uccMain, $system_north
        );

        if ($preparedSql->execute()) {
            $response['status'] = true;
            $response['admin'] = $_SESSION['adminLogged'];
            $response['operation'] = "edit";
            $response['description'] = "Settings: <b>" . strtoupper($system_name) . "</b> has been updated.";
        } else {
            $response['status'] = false;
            $response['message'] = 'Failed to update system settings: ' . $preparedSql->error;
            http_response_code(500); // Internal Server Error
        }

        $preparedSql->close();
    } else {
        $response['status'] = false;
        $response['message'] = 'An error occurred while preparing the UPDATE statement: ' . $db->error;
        http_response_code(500); // Internal Server Error
    }
}

echo json_encode($response);
?>
