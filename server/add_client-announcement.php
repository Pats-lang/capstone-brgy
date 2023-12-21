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

$uploadDirectory = "../assets/images/announcement/";
$add_ImageAnnouncements = $_FILES['add_ImageAnnouncements']['name'];
$add_ImageAnnouncementsTmpName = $_FILES['add_ImageAnnouncements']['tmp_name'];
$uploadedImageAnnouncementsPath = $uploadDirectory . $add_ImageAnnouncements;
move_uploaded_file($add_ImageAnnouncementsTmpName, $uploadedImageAnnouncementsPath);
$add_titleAnnouncements = sanitizeData(getDatabase(), $_POST['add_titleAnnouncements']);
$add_descriptionAnnouncements = sanitizeData(getDatabase(), $_POST['add_descriptionAnnouncements']);
$add_lastModifiedAnnouncements = sanitizeData(getDatabase(), $_POST['add_lastModifiedAnnouncements']);

if ($preparedSql = $db->prepare("INSERT INTO `client_announcement` (`title`, `img`, `description`, `last_modified`) VALUES (?,?,?, ?)")) {
  $preparedSql->bind_param("ssss", $add_titleAnnouncements, $add_ImageAnnouncements, $add_descriptionAnnouncements, $add_lastModifiedAnnouncements);

  if ($preparedSql->execute()) {
    $response['status'] = true;
    $response['message'] = 'Announcement had been successfully added.';
    $response['admin'] =  $_SESSION['adminLogged'];
    $response['operation'] = "add";
    $response['description'] = "Announcement: <b>" . strtoupper($add_titleAnnouncements). "</b> have been added at <b>Announcements.</b>";
  } else {
    $response['status'] = false;
    $response['message'] = 'Failed to add a new annoucement: ' . $preparedSql->error;
    http_response_code(500); // Internal Server 
  }
  $preparedSql->close();
} else {
  $response['status'] = false;
  $response['message'] = 'An error occurred while preparing the INSERT statement: ' . $db->error;
  http_response_code(500); // Internal Server Error
}


echo json_encode($response);
?>