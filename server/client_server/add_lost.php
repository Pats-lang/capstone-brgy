<?php
include 'conn.php';

$response = array('status' => false);

$alumniID = $_POST['alumniID'];
$name = $_POST['name'];
$campus = $_POST['campus'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$reason = $_POST['reason'];

// File upload handling
$target_dir = "../../assets/images/lost/"; // Specify the directory where you want to store the uploaded files
$target_file = $target_dir . basename($_FILES["attachment"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["attachment"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["attachment"]["size"] > 500000) {
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "error";
} else {
    $status = 1;
    $uploadedFileName = basename($_FILES["attachment"]["name"]); // Get the file name without the path
    if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
        $insert_query = "INSERT INTO lost (member_id, name, campus, email, bday, reason, status, img) VALUES
 ('$alumniID','$name','$campus','$email','$birthday','$reason','$status','$uploadedFileName')";
        $query = mysqli_query($connection, $insert_query);

        if ($query) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}
?>
