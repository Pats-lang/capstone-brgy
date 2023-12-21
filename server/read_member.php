<?php 
include '../config/config.php';
session_start();
$response = array(
    'icon'=>'',
    'message'=>'',
    'member_id'=>''
);  

$member_id = $_POST['member_id'];

$sql = "SELECT * FROM `members` WHERE `member_id` = '$member_id' ";
$result = mysqli_query(getDatabase(), $sql);
$row = mysqli_fetch_array($result);

$response['member_id'] = $member_id;

echo json_encode($row);
?>