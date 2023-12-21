<?php
include '../config/config.php';
session_start();
$response = array(
    'yearToday' => '',
    'memberCount' => '',
    'campus_id' => '',
);

$campus_id = $_POST['campus_id'];
$numRows = 0;
$registeredMembers = array();

$preparedSql = $db->prepare("SELECT * FROM `members` WHERE `campus_id` = ? ");
$preparedSql->bind_param("s", $campus_id);

if ($preparedSql->execute()) {
    $result = $preparedSql->get_result();

    while ($row = $result->fetch_assoc()) {
        $numRows++;
        $registeredMembers[] = $row;
    }

    $response['campus_id'] = $campus_id;
    $response['yearToday'] = date("Y");
    
    if ($numRows == 0) {
        $response['memberCount'] = 1;
    } else {
        $lastMember = end($registeredMembers);
        $response['memberCount'] = $lastMember['member_count'] + 1;
    }
}

$preparedSql->close();

echo json_encode($response);
?>
