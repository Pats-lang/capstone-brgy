<?php
include '../config/config.php';
session_start();

$response = array(
  'status' => false,
  'message' => 'Admin has been successfully added.',
  'admin' => '',
  'operation' => '',
  'description' => ''
);

$admin_username = sanitizeData(getDatabase(), $_POST['add_adminUsername']);
$admin_password = sanitizeData(getDatabase(), $_POST['add_adminPassword']);
$admin_fullname = sanitizeData(getDatabase(), $_POST['add_adminFullName']);
$admin = sanitizeData(getDatabase(), $_POST['admin']);
$adminPassword_hashed = password_hash($admin_password, PASSWORD_DEFAULT);

// Check if admin username is already in use
if (isUsernameTaken(getDatabase(), $admin_username)) {
    $response['message'] = 'Username already in use.';
} else if (isFullNameTaken(getDatabase(), $admin_fullname)) {
    $response['message'] = 'Full name already in use.';
} else {
    // Admin username and full name are not in use, proceed with the insertion
    if ($preparedSql = $db->prepare("INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_fullName`, `admin`) VALUES (?,?,?,?)")) {
        $preparedSql->bind_param("ssss", $admin_username, $adminPassword_hashed, $admin_fullname, $admin);

        if ($preparedSql->execute()) {
            $response['status'] = true;
            $response['admin'] =  $_SESSION['adminLogged'];
            $response['operation'] = "add";
            $response['description'] = "Admin: <b>" . strtoupper($admin_username). "</b> has been added to <b>System Administrators.</b>";
        } else {
            $response['status'] = false;
            $response['message'] = 'Failed to register a new admin: ' . $preparedSql->error;
            http_response_code(500); // Internal Server Error
        }
        $preparedSql->close();
    } else {
        $response['status'] = false;
        $response['message'] = 'An error occurred while preparing the INSERT statement: ' . $db->error;
        http_response_code(500); // Internal Server Error
    }
}

echo json_encode($response);

// Function to check if admin username is already taken
function isUsernameTaken($database, $username) {
    $stmt = $database->prepare("SELECT COUNT(*) FROM `admin` WHERE `admin_username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}

// Function to check if admin full name is already taken
function isFullNameTaken($database, $fullname) {
    $stmt = $database->prepare("SELECT COUNT(*) FROM `admin` WHERE `admin_fullName` = ?");
    $stmt->bind_param("s", $fullname);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}
?>