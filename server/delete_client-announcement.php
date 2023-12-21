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

$id = $_POST['id'];

if ($preparedSql = $db->prepare("DELETE FROM `client_announcement` WHERE `id` = ?")) {
    $preparedSql->bind_param("s", $id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully deleted.';
        $response['admin'] =  $_SESSION['adminLogged'];
        $response['operation'] = "delete";
        $response['description'] = "Announcement: <b>AN" . $id . "</b> have been deleted at <b>Announcements.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Error occured when Deleting Announcement: ". $preparedSql->error;
        http_response_code(500); // Internal Server 
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    http_response_code(500); // Internal Server Error
    echo " ~ An error occurred while preparing the DELETE statement:" . $preparedSql->error . " ~ ";
}

echo json_encode($response);
?>
