<?php
require_once('../TCPDF-main/examples/tcpdf_include.php');
$connection = mysqli_connect("localhost", "root", "", "u907822938_alumnidb") or die("DI GUMANA");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alumid'])) {
    $alumid = mysqli_real_escape_string($connection, $_POST['alumid']);
    generateIdCard($alumid, $connection);
} else {
    echo json_encode(['success' => false, 'message' => 'No alumni ID provided in the POST request.']);
}
function generateIdCard($alumid, $connection)
{
    if (empty($alumid)) {
        echo json_encode(['success' => false, 'message' => 'Alumni ID is required.']);
        exit;
    }

    $sql = "SELECT * FROM members WHERE member_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $alumid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Use absolute paths for images
        $picturePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'member_pictures' . DIRECTORY_SEPARATOR . $row['picture'];
        $signaturePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'member_pictures' . DIRECTORY_SEPARATOR . $row['signature'];

        // Generate PDF content with embedded CSS styles
        $pdfContent = "
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .id-card {
                width: 3.5in;
                height: 2in;
                padding: 20px;
                border: 1px solid #ccc;
                background-image: url('../assets/images/alum.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
                position: relative;
            }

            .id-card img {
                width: 80px;
                height: 80px;
                position: absolute;
                margin-top: 80px;
                left: 30px;
            }

            .id-card .member-id {
                margin-left: 192px;
                font-weight: bold;
                font-size: 30px;
                color: black;
                margin-top: -33px;
            }

            .id-back {
                width: 3.5in;
                height: 2in;
                padding: 20px;
                border: 1px solid #ccc;
                background-image: url('../assets/images/back.png');
                width: 50%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                margin: 20px auto;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
                position: relative;
            }

            .profile-signature {
                width: 100px;
                height: 100px;
                position: absolute;
                margin-top: 5px;
                margin-left: 120px;
            }

            .member-address {
                margin-left: 75px;
                font-weight: bold;
                font-size: 14px;
                color: black;
                margin-top: -120px;
            }

            .member-bday {
                margin-left: 77px;
                font-weight: bold;
                font-size: 12px;
                color: black;
                margin-top: -5px;
                margin-bottom: 5px;
            }

            .member-course {
                margin-left: 220px;
                font-weight: bold;
                font-size: 12px;
                color: black;
                margin-bottom: 120px;
            }
        </style>
        <body>
        <div class='id-card'>
            <img src='{$picturePath}' class='profile-picture'>    
            <p class='member-id'><strong>{$row['member_id']}</strong></p>
            <p class='member-name'><strong>{$row['name']}</strong></p>
        </div>
        <div class='id-back'>
            <img id='profile' src='{$signaturePath}' class='profile-signature'>
            <p class='member-address'><strong>{$row['address']}</strong></p>
            <p class='member-bday'><strong>{$row['birth_date']}</strong></p>
            <p class='member-course'><strong>{$row['course']}</strong></p>
        </div>
    </body>
    ";

        // Initialize a new TCPDF object
        $pdf = new TCPDF();

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('times', 'I', 12);

        // Add content to the PDF
        $pdf->writeHTML($pdfContent, true, false, true, false, '');

        // Output the PDF to a temporary file
        $tempFileName = tempnam(sys_get_temp_dir(), 'pdf');
        $pdf->Output($tempFileName, 'F');

        // Check for errors during PDF generation
        $error = $pdf->getError();
        if (!empty($error)) {
            echo json_encode(['success' => false, 'message' => 'PDF generation error: ' . $error]);
            exit;
        }

        // Set appropriate headers for PDF download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="generated_pdf_' . $alumid . '.pdf"');

        // Output the PDF file
        readfile($tempFileName);

        // Remove the temporary file
        unlink($tempFileName);

        // Exit after sending the PDF
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'No member found with the provided ID.']);
        exit;
    }
}
