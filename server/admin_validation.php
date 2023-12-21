<?php

include '../config/config.php';

$response = array(
    'status' => false,
    'icon' => '',
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => ''
);

$admin_username = sanitizeData(getDatabase(), $_POST["username"]);
$admin_password = sanitizeData(getDatabase(), $_POST["password"]);

if ($preparedSql = $db->prepare("SELECT `admin_username`, `admin_password`, `admin` FROM `admin` WHERE `admin_username` = ?")) {
    $preparedSql->bind_param("s", $admin_username);

    if ($preparedSql->execute()) {
        $preparedSql->bind_result($db_admin_username, $db_admin_password, $db_admin_role);

        if ($preparedSql->fetch()) {
            if (password_verify($admin_password, $db_admin_password)) {
                $response['status'] = true;
                $response['icon'] = 'success';
                $response['message'] = 'Admin Found! Logging in ...';
                session_start();
                $_SESSION['adminLogged'] = $db_admin_username;
                $_SESSION['adminRole'] = $db_admin_role;  // Store the admin role in the session

                // Check the role and redirect accordingly
                if ($db_admin_role == '2') {
                    $response['redirect'] = 'admin_db.php'; // Change this to the actual path of your admin dashboard
                } elseif ($db_admin_role == '1') {
                    $response['redirect'] = 'dashboard.php'; // Change this to the actual path of your super admin dashboard
                }

                $response['admin'] = $db_admin_username;
                $response['operation'] = "login";
                $response['description'] = "Admin: <b>" . strtoupper($db_admin_username) . "</b> Just logged on to the System";
            } else {
                $response['icon'] = 'error';
                $response['message'] = 'Password verification failed.';
            }
        } else {
            $response['icon'] = 'error';
            $response['message'] = 'User not found.';
        }
    } else {
        $response['icon'] = 'error';
        $response['message'] = 'Error executing SQL query: ' . $preparedSql->error;
    }
    $preparedSql->close();
} else {
    $response['icon'] = 'error';
    $response['message'] = 'An error occurred while preparing the SQL statement: ' . $preparedSql->error;
}

echo json_encode($response);
?>