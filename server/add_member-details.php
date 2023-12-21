<?php
include '../config/config.php';
session_start();
$response = array(
    'status' => true,
    'icon' => '',
    'message' => '',
    'count' => 0,
    'admin' => '',
    'operation' => '',
    'description' => ''
);

// personal_information
$uploadDirectory = "../assets/images/member_pictures/";
$pictureName = $_FILES['register_picture']['name'];
$pictureTmpName = $_FILES['register_picture']['tmp_name'];
$signatureName = $_FILES['register_signature']['name'];
$signatureTmpName = $_FILES['register_signature']['tmp_name'];
$allowedExtensions = ['jpg', 'jpeg', 'png'];
$pictureExtension = strtolower(pathinfo($pictureName, PATHINFO_EXTENSION));
$signatureExtension = strtolower(pathinfo($signatureName, PATHINFO_EXTENSION));
if (!in_array($pictureExtension, $allowedExtensions) || !in_array($signatureExtension, $allowedExtensions)) {
    $response['false'] = false;
    $response['icon'] = "error";
    $response['message'] = "Only JPEG & PNG images is allowed.";
}
$uploadedPicturePath = $uploadDirectory . $pictureName;
$uploadedSignaturePath = $uploadDirectory . $signatureName;
move_uploaded_file($pictureTmpName, $uploadedPicturePath);
move_uploaded_file($signatureTmpName, $uploadedSignaturePath);

$register_memberId = sanitizeData(getDatabase(), $_POST['register_memberId']);
$register_name = sanitizeData(getDatabase(), $_POST['register_name']);
$register_yearGraduated = sanitizeData(getDatabase(), $_POST['register_yearGraduated']);
$register_address = sanitizeData(getDatabase(), $_POST['register_address']);
$register_emailAddress = sanitizeData(getDatabase(), $_POST['register_emailAddress']);
$register_birthDate = sanitizeData(getDatabase(), $_POST['register_birthDate']);
$register_cellNo = sanitizeData(getDatabase(), $_POST['register_cellNo']);
$register_course = sanitizeData(getDatabase(), $_POST['register_course']);
$register_status = sanitizeData(getDatabase(), $_POST['register_status']);
$register_yearToday = sanitizeData(getDatabase(), $_POST['register_yearToday']);
$register_memberCount = sanitizeData(getDatabase(), $_POST['register_memberCount']);
$register_campusId = sanitizeData(getDatabase(), $_POST['register_campusId']);
$cid = 2;
$status= 0;

if ($prepared_membersSql = $db->prepare("INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `name`, `address`, `birth_date`, `civil_status`, `course`, `year_graduated`, `email_address`, `cellphone_no`, `picture`, `signature`, `cid`,`status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
    $prepared_membersSql->bind_param(
        "isissssssissssii",
        $register_memberId,
        $register_yearToday,
        $register_memberCount,
        $register_campusId,     
        $register_name,
        $register_address,
        $register_birthDate,
        $register_status,
        $register_course,
        $register_yearGraduated,
        $register_emailAddress,
        $register_cellNo,
        $pictureName,
        $signatureName,
        $cid,
        $status
        
    );
    
    if (!$prepared_membersSql->execute()) {
        $response['false'] = false;
        $response['message'] = "Error executing Personal Information SQL statement: " . $prepared_membersSql->error;
    }
    $prepared_membersSql->close();
} else {
    $response['message'] = "An error occurred while preparing the Personal Information SQL statement: " . $prepared_membersSql->error;
}

// work_experience
$register_workCompany = $_POST['register_workCompany'];
$register_workPosition = $_POST['register_workPosition'];
$register_workDuration = $_POST['register_workDuration'];
for ($i = 0; $i < count($register_workCompany); $i++) { //Using any open failed to count the maximum count of rows.
    $company = sanitizeData(getDatabase(), $register_workCompany[$i]);
    $position = sanitizeData(getDatabase(), $register_workPosition[$i]);
    $duration = sanitizeData(getDatabase(), $register_workDuration[$i]);

    if ($prepared_membersWorkSql = $db->prepare("INSERT INTO `work_experience` (`member_id`, `company`, `position`, `duration`) VALUES (?, ?, ?, ?)")) {
        $prepared_membersWorkSql->bind_param("isss", $register_memberId, $company, $position, $duration);
        if (!$prepared_membersWorkSql->execute()) {
            $response['false'] = false;
            $response['message'] = "Error executing Work Experience SQL statement:" . $prepared_membersWorkSql->error;
        }
        $prepared_membersWorkSql->close();
    } else {
        $response['message'] = "An error occurred while preparing the Work Experience SQL statement:" . $prepared_membersWorkSql->error;
    }
}

// trainings
$register_trainingTitle = $_POST['register_trainingTitle'];
$register_trainingVenue = $_POST['register_trainingVenue'];
$register_trainingDuration = $_POST['register_trainingDuration'];
for ($i = 0; $i < count($register_trainingTitle); $i++) {
    $title = sanitizeData(getDatabase(), $register_trainingTitle[$i]);
    $venue = sanitizeData(getDatabase(), $register_trainingVenue[$i]);
    $duration = sanitizeData(getDatabase(), $register_trainingDuration[$i]);

    if ($prepared_trainingsSql = $db->prepare("INSERT INTO `trainings` (`member_id`, `title`, `venue`, `duration`) VALUES (?, ?, ?, ?)")) {
        $prepared_trainingsSql->bind_param("isss", $register_memberId, $title, $venue, $duration);
        if (!$prepared_trainingsSql->execute()) {
            $response['false'] = false;
            $response['message'] = "Error executing Trainings SQL statement:" . $prepared_trainingsSql->error;
        }
        $prepared_trainingsSql->close();
    } else {
        $response['message'] = "An error occurred while preparing the Trainings SQL statement:" . $prepared_trainingsSql->error;
    }
}

// affiliations
$register_affiliationsOrganizations = $_POST['register_affiliationsOrganizations'];
$register_affiliationsPositions = $_POST['register_affiliationsPositions'];
$register_affiliationsDuration = $_POST['register_affiliationsDuration'];
for ($i = 0; $i < count($register_affiliationsOrganizations); $i++) {
    $organizations = sanitizeData(getDatabase(), $register_affiliationsOrganizations[$i]);
    $positions = sanitizeData(getDatabase(), $register_affiliationsPositions[$i]);
    $duration = sanitizeData(getDatabase(), $register_affiliationsDuration[$i]);

    if ($prepared_affiliationsSql = $db->prepare("INSERT INTO `affiliations` (`member_id`, `organizations`, `position`, `duration`) VALUES (?, ?, ?, ?)")) {
        $prepared_affiliationsSql->bind_param("isss", $register_memberId, $organizations, $positions, $duration);
        if (!$prepared_affiliationsSql->execute()) {
            $response['false'] = false;
            $response['message'] = "Error executing Affililiations SQL statement:" . $prepared_affiliationsSql->error;
        }
        $prepared_affiliationsSql->close();
    } else {
        $response['message'] ="An error occurred while preparing the Affililiations SQL statement:" . $prepared_affiliationsSql->error;
    }
}

// achievements
$register_achievements = $_POST['register_achievements'];
for ($i = 0; $i < count($register_achievements); $i++) {
    $awards = sanitizeData(getDatabase(), $register_achievements[$i]);

    if ($prepared_achievementsSql = $db->prepare("INSERT INTO `awards` (`member_id`, `name`) VALUES (?, ?)")) {
        $prepared_achievementsSql->bind_param("is", $register_memberId, $awards);
        if (!$prepared_achievementsSql->execute()) {
            $response['false'] = false;
            $response['message'] = "Error executing Achievements SQL statement:" . $prepared_achievementsSql->error;
        }
        $prepared_achievementsSql->close();
    } else {
        $response['message'] = "An error occurred while preparing the Achievements SQL statement:" . $prepared_achievementsSql->error;
    }
}

if ($response['status']) {
    $response['icon'] = "success";
    $response['message'] = "New Alumni Member was successfully registered";
    
    $response['admin'] =  $_SESSION['adminLogged'];
    $response['operation'] = "add";
    $response['description'] = "Alumni Member: <b>" . $_POST['register_memberId'] . "</b> have been registered at  <b>Alumni Members.</b>";
} else {
    $response['icon'] = "error";
    $response['message'] = "Error has occurred while registering";
}

echo json_encode($response);
?>