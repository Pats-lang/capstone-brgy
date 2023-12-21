<?php
include '../config/config.php';

$response = array(
    'status' => true,
    'message' => 'Changes Saved'
);

$admin = $_POST['admin'];
$operation = $_POST['operation'];
$description = $_POST['description'];

if ($preparedSql = $db->prepare("INSERT INTO `change_logs` (`admin`, `operation`, `description`) VALUES (?,?,?)")) {
    $preparedSql->bind_param("sss", $admin, $operation, $description);
  
    if (!$preparedSql->execute()) {
      $response['status'] = false;
      $response['description'] = 'Failed to register a new admin: ' . $preparedSql->error;
      http_response_code(500); // Internal Server Error
    } 
    $preparedSql->close();

  } else {
    $response['message'] = 'An error occurred while preparing the INSERT statement: ' . $db->error;
    http_response_code(500); // Internal Server Error

  }
echo json_encode($response);

?>