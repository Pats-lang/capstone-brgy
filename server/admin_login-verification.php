<?php
session_start();

$adminLogged = $_SESSION['adminLogged'];

if (empty($adminLogged)) {
    header('Location: ../pages/admin_logIn.php');
    exit;
}

if ($prepared_adminFullnameSql = $db->prepare("SELECT `admin_fullname`, `admin` FROM admin WHERE `admin_username` = ? ")) {
    $prepared_adminFullnameSql->bind_param("s", $adminLogged);

    if ($prepared_adminFullnameSql->execute()) {
        $prepared_adminFullnameSql->bind_result($db_adminFullName, $admin); // Declare admin fullname and admin column.

        if ($prepared_adminFullnameSql->fetch()) {
            // Check the value of the admin column and include the appropriate navigation file.
            if ($admin == 1) {
                include 'includes/admin_navigation.php';
            } elseif ($admin == 2) {
                include 'includes/ad_nav.php'; // Assuming this is the correct filename.
            } else {
                // Handle other cases if needed.
            }
        } else {
            // Go back to login page when the binding is not successful.
            header('Location: ../pages/admin_logIn.php');
            exit;
        }
        
    } else {
        echo "Error executing SQL query: " . $prepared_adminFullnameSql->error;
    }
    $prepared_adminFullnameSql->close();
} else {
    echo "An error occurred while preparing the SQL statement:" . $prepared_adminFullnameSql->error;
}

?>

