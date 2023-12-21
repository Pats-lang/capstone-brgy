<?php
include '../config/config.php';

session_start();

$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => '',
    'picture'=>'',
    'stats' => ''
    
);

// Define your function to retrieve the existing image names based on the member ID
function getExistingImageNames($memberid) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT picture, signature FROM members WHERE member_id = ?";
    
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i",$memberid);
        $stmt->execute();
        $stmt->bind_result($existingPictureName, $existingSignatureName);
            
        if ($stmt->fetch()) {
            $stmt->close();
            return array('picture' => $existingPictureName, 'signature' => $existingSignatureName);
        }
    }

    return null;
}

$uploadDirectory = "../assets/images/member_pictures/";

// Picture handling
$_picture = isset($_FILES['Editmember_picture_input']) ? $_FILES['Editmember_picture_input']['name'] : null;
$_pictureTmpName = isset($_FILES['Editmember_picture_input']) ? $_FILES['Editmember_picture_input']['tmp_name'] : null;

// Signature handling
$_signature = isset($_FILES['Editmember_signature_input']) ? $_FILES['Editmember_signature_input']['name'] : null;
$_signatureTmpName = isset($_FILES['Editmember_signature_input']) ? $_FILES['Editmember_signature_input']['tmp_name'] : null;

// Check if a picture is uploaded
if (empty($_picture)) {
    // If no picture is uploaded, keep the existing picture name in the database
    $_id = sanitizeData(getDatabase(), $_POST['Editmember_id']);
    $existingImageNames = getExistingImageNames($_id);

    if ($existingImageNames) {
        // Use the existing picture name
        $_picture = $existingImageNames['picture'];
    } else {
        // Handle the case where no existing picture name is found (perhaps set to a default or handle as needed)
        $_picture = null;
    }
} else {
    // If a picture is uploaded, move it to the upload directory
    move_uploaded_file($_pictureTmpName, $uploadDirectory . DIRECTORY_SEPARATOR . $_picture);
}

// Check if a signature is uploaded
if (empty($_signature)) {
    // If no signature is uploaded, keep the existing signature name in the database
    $_id = sanitizeData(getDatabase(), $_POST['Editmember_id']);
    $existingImageNames = getExistingImageNames($_id);

    if ($existingImageNames) {
        // Use the existing signature name
        $_signature = $existingImageNames['signature'];
    } else {
        // Handle the case where no existing signature name is found (perhaps set to a default or handle as needed)
        $_signature = null;
    }
} else {
    // If a signature is uploaded, move it to the upload directory
    move_uploaded_file($_signatureTmpName, $uploadDirectory . DIRECTORY_SEPARATOR . $_signature);
}


$_name = $_POST['Editmember_name'];
$_yearGraduated = $_POST['Editmember_yearGraduated'];
$_address = $_POST['Editmember_address'];
$_emailaddress = $_POST['Editmember_emailAddress'];
$_birthDate = $_POST['Editmember_birthDate'];
$_cellNo = $_POST['Editmember_cellNo'];
$_course = $_POST['Editmember_course'];
$_civilStatus = $_POST['Editmember_civilStatus'];
$_id = $_POST['Editmember_id'];
$status = $_POST['stats'];

if ($preparedSql = $db->prepare("UPDATE `members` SET `name`= ?, `address`= ?, `birth_date`= ?, `civil_status`= ?, `course`= ?, `year_graduated`= ?, `email_address`= ?, `cellphone_no`= ?, `picture`= ?,`signature`= ?, `status`= ? WHERE `member_id`= ?")) {
    $preparedSql->bind_param("sssssisissis", $_name, $_address, $_birthDate, $_civilStatus, $_course, $_yearGraduated, $_emailaddress, $_cellNo, $_picture, $_signature, $status, $_id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated member information';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['stats'] = $status;
        $response['description'] = " Campus: <b>" . strtoupper($_name) . "</b> has been edited at <b> Campus.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update member information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();
} else {
    $response['status'] = false;
    $response['message'] = "An error occurred while preparing the UPDATE statement: " . $db->error;
    http_response_code(500); // Internal Server Error
}

echo json_encode($response);
?>
