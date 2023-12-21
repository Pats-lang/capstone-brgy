<?php

include '../config/config.php';
$alumid = $_POST['alumid'];
$imgCard = $_POST['imgCard'];
$imgBack = $_POST['imgBack'];

// Create a directory for saving images (modify the path based on your project structure)
$imageDir = __DIR__ . '/../assets/images/generated_images/';
if (!file_exists($imageDir)) {
    mkdir($imageDir, 0777, true);
}

// Generate file names based on alumni ID
$pictureFileName = 'id_card_' . $alumid . '.jpg';
$signatureFileName = 'id_back_' . $alumid . '.jpg';

// Save images on the server
$picturePath = $imageDir . $pictureFileName;
file_put_contents($picturePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgCard)));

$signaturePath = $imageDir . $signatureFileName;
file_put_contents($signaturePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgBack)));

// Update the database with file names (modify the SQL query based on your database structure)
// Ensure that your table has columns 'picture_filename' and 'signature_filename'
$connection = new mysqli("localhost", "root", "", "u907822938_alumnidb");
$sql = "UPDATE members SET idfront = ?, idback = ? WHERE member_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param('sss', $pictureFileName, $signatureFileName, $alumid);
$stmt->execute();

// Check for errors during the database update
if ($stmt->errno) {
    echo json_encode(['success' => false, 'message' => 'Database update error: ' . $stmt->error]);
    exit;
}

// Close the database connection
$stmt->close();
$connection->close();

// Return success response with file names
echo json_encode(['success' => true, 'pictureFileName' => $pictureFileName, 'signatureFileName' => $signatureFileName]);

?>
