
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

// Define your function to retrieve existing image name based on announcement ID
function getExistingImageName($announcementId) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT img_director FROM directors WHERE id_director = ?";
    
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $announcementId); // Fix: use $announcementId instead of $id
        $stmt->execute();
        $stmt->bind_result($existingImageName);

        if ($stmt->fetch()) {
            $stmt->close();
            return $existingImageName;
        }
    }

    return null;
}

$uploadDirectory = "../assets/images/directors/";
$edit_ImageAnnouncements = isset($_FILES['edit_ImageAnnouncements']) ? $_FILES['edit_ImageAnnouncements']['name'] : null;
$edit_ImageAnnouncementsTmpName = isset($_FILES['edit_ImageAnnouncements']) ? $_FILES['edit_ImageAnnouncements']['tmp_name'] : null;

// Check if an image is uploaded
if (!empty($edit_ImageAnnouncements)) {
    // If an image is uploaded, move it to the upload directory
    move_uploaded_file($edit_ImageAnnouncementsTmpName, $uploadDirectory . $edit_ImageAnnouncements);
} else {
    // If no image is uploaded, keep the existing image name in the database
    $edit_IdAnnouncements = sanitizeData(getDatabase(), $_POST['edit_IdAnnouncements']);
    $existingImageName = getExistingImageName($edit_IdAnnouncements);

    if ($existingImageName) {
        // Use the existing image name
        $edit_ImageAnnouncements = $existingImageName;
    } else {
        // Handle the case where no existing image name is found (perhaps set to a default or handle as needed)
        $edit_ImageAnnouncements = null;
    }
}

$edit_titleAnnouncements = sanitizeData(getDatabase(), $_POST['edit_titleAnnouncements']);
$edit_descriptionAnnouncements = sanitizeData(getDatabase(), $_POST['edit_descriptionAnnouncements']);
$edit_lastModifiedAnnouncements = sanitizeData(getDatabase(), $_POST['edit_lastModifiedAnnouncements']);
$edit_IdAnnouncements = sanitizeData(getDatabase(), $_POST['edit_IdAnnouncements']);

if ($preparedSql = $db->prepare("UPDATE `directors` SET `name_director`= ?, `img_director`= ?, `position` = ?, `direct_timestamp` = ? WHERE id_director =? ")) {
    $preparedSql->bind_param("ssssi", $edit_titleAnnouncements, $edit_ImageAnnouncements, $edit_descriptionAnnouncements, $edit_lastModifiedAnnouncements, $edit_IdAnnouncements);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated Board of Director details.';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Board of Director <b>" . strtoupper($edit_titleAnnouncements) . "</b> has been updated at <b>Board of Director.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>
