<?php
include '../config/config.php';
session_start();

$response = array (
    'admin_username' => '', 
    'admin_password' => '',
    'admin_fullname' => '',
    'admin' => ''
);


$admin_username = sanitizeData(getDatabase(), $_POST['admin_username']);
if ($preparedSql = $db->prepare("SELECT admin_username, admin_password, admin_fullname, admin FROM `admin` WHERE `admin_username` = ?")) {
    $preparedSql->bind_param("s", $admin_username);

    if ($preparedSql->execute()) {
        $preparedSql->bind_result($admin_username, $admin_password, $admin_fullname, $admin);

        if ($preparedSql->fetch()) {
            $response['admin_username'] = $admin_username;
            $response['admin_password'] = $admin_password;
            $response['admin_fullname'] = $admin_fullname;
            $response['admin'] = $admin;
        } 
    } else {
        echo "Error executing SELECT query: " . $preparedSql->error;
    }

    $preparedSql->close();
} else {
    echo "An error occurred while preparing the SELECT statement:" . $preparedSql->error;
}

echo json_encode($response);

?>