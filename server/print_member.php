<?php
session_start();
// Include the mPDF library
require_once '../vendor/autoload.php';

// Create a new mPDF instance
$mpdf = new \Mpdf\Mpdf();

// Add content to the PDF
$mpdf->WriteHTML('<h1>Hello, mPDF!</h1>');
$mpdf->WriteHTML('<p>This is a basic PDF generated using mPDF.</p>');

// Output the PDF as a file or inline in the browser
$mpdf->Output('my_pdf.pdf', 'D'); // 'D' will force a download

// You can also use 'I' to display the PDF inline in the browser
// $mpdf->Output('my_pdf.pdf', 'I');
?>