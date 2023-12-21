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

if ($preparedSql = $db->prepare("DELETE FROM `history` WHERE `id` = ?")) {
    $preparedSql->bind_param("s", $id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully deleted.';
        $response['admin'] =  $_SESSION['adminLogged'];
        $response['operation'] = "delete";
        $response['description'] = "History: <b>HS" . $id. "</b> have been deleted at <b>Board of History.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Error occured when Deleting History: ". $preparedSql->error;
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
