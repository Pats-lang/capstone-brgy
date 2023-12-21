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
$member_id = $_POST['member_id'];

if ($preparedSql = $db->prepare("DELETE FROM `members` WHERE `member_id` = ?")) {
    $preparedSql->bind_param("i", $member_id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully deleted.';
        $response['admin'] =  $_SESSION['adminLogged'];
        $response['operation'] = "delete";
        $response['description'] = "Main Campus Member: <b>MEMBER ID: " . $member_id . "</b> have been deleted at <b>Main Campus.</b>";
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