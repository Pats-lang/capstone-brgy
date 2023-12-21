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

$admin_username = $_POST['admin_username'];

if ($preparedSql = $db->prepare("DELETE FROM `admin` WHERE `admin_username` = ?")) {
    $preparedSql->bind_param("s", $admin_username);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully deleted.';
        $response['admin'] =  $_SESSION['adminLogged'];
        $response['operation'] = "delete";
        $response['description'] = "Admin: <b>" . strtoupper($admin_username). "</b> have been deleted at <b>System Administrators.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Error occured when Deleting admin: ". $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    http_response_code(500); // Internal Server Error
    echo "An error occurred while preparing the DELETE statement:" . $preparedSql->error;
}

echo json_encode($response);
?>
