<?php
include '../config/config.php';
session_start();
$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => ''
);

$admin_username = sanitizeData(getDatabase(), $_POST['edit_adminUsername']);
$admin_fullname = sanitizeData(getDatabase(), $_POST['edit_adminFullName']);
$admin = sanitizeData(getDatabase(), $_POST['edit_admin']);

if ($preparedSql = $db->prepare("UPDATE `admin` SET `admin_fullname`=?, `admin`=? WHERE `admin_username`=?")) {
    $preparedSql->bind_param("sss", $admin_fullname, $admin, $admin_username);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated admin information';
        $response['admin'] =  $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Admin: <b>" . strtoupper($admin_username). "</b> have been edited at <b>System Administrators.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update admin information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>