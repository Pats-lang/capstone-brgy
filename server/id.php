<?php
include '../config/config.php';
$alumid = $_POST['alumid'];

// Retrieve image file names and member name from the database
if ($db->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection error: ' . $db->connect_error]);
    exit;
}

$sql = "SELECT idfront, idback, name FROM members WHERE member_id = ?";
$stmt = $db->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database query preparation error: ' . $db->error]);
    exit;
}

$stmt->bind_param('s', $alumid);
$stmt->execute();
$stmt->bind_result($pictureFileName, $signatureFileName, $memberName);
$stmt->fetch();
$stmt->close();
$db->close();

// Check if the file names are retrieved successfully
if (!$pictureFileName || !$signatureFileName || !$memberName) {
    echo json_encode(['success' => false, 'message' => 'Data not found in the database.']);
    exit;
}

// Generate a PDF using mPDF
require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

// Add a page to the PDF
$mpdf->AddPage();

// Set image dimensions (3.5in width and 2in height)
$imageWidth = 3.5 * 25.4; // Convert inches to millimeters (1 inch = 25.4 mm)
$imageHeight = 2 * 25.4;

// Image paths
$picturePath = realpath(__DIR__ . '/../assets/images/generated_images/' . $pictureFileName);
$signaturePath = realpath(__DIR__ . '/../assets/images/generated_images/' . $signatureFileName);

// Check if image files exist
if (!file_exists($picturePath) || !file_exists($signaturePath)) {
    echo json_encode(['success' => false, 'message' => 'Image files not found on the server.']);
    exit;
}

// Add ID front image to the PDF
$mpdf->Image($picturePath, 10, 10, $imageWidth, $imageHeight);

// Add ID back image to the PDF next to ID front image
$mpdf->Image($signaturePath, 10 + $imageWidth + 5, 10, $imageWidth, $imageHeight);

// Save the PDF to a file
$pdfFileName = __DIR__ . '/../assets/generated_pdf/' . $memberName . '_' . $alumid . '.pdf';
$mpdf->Output($pdfFileName, 'F');

// Replace backslashes with forward slashes in the file path
$pdfFileName = str_replace("\\", "/", $pdfFileName);

// Return success response with the generated PDF filename
// Return success response with the generated PDF filename
echo json_encode(['success' => true, 'message' => 'PDF generated successfully.', 'pdfFileName' => $pdfFileName]);
exit;

?>
