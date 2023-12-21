<?php
include 'conn.php';

$response = array(
    'status' => false,
);
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$insert_query = "INSERT INTO inquire (i_name,i_email,i_message) VALUES ('$name','$email','$message')";
$query = mysqli_query($connection, $insert_query);

if ($query) {
    echo "success";
} else {
    echo "error";
}
?>