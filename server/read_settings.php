<?php
include '../config/config.php';
session_start();

$response = array(
    'icon' => '',
    'message' => '',
);

// Adjust this part to fetch data based on your form fields
// Assuming your form fields have names like system_name, system_alias, etc.
$system_name = sanitizeData(getDatabase(), $_POST['system_name']);
$system_alias = sanitizeData(getDatabase(), $_POST['system_alias']);
// Add similar lines for other form fields

$sql = "SELECT * FROM `settings` WHERE `system_name` = '$system_name' AND `system_alias` = '$system_alias'";
// Add conditions for other form fields in the WHERE clause

$result = mysqli_query(getDatabase(), $sql);

if ($result) {
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
} else {
    $response['icon'] = 'error';
    $response['message'] = 'Error retrieving data from the database.';
    echo json_encode($response);
}
?>
