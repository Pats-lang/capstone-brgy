<?php

require_once __DIR__ . '/../vendor/autoload.php';
include '../config/config.php';
session_start();
$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => ''
);

$selected_month = $_GET["selected_month"] ?? null;
if ($selected_month) {
    $sql = "SELECT *, IF(status = 0, 'Pending', '') as status_text FROM members WHERE DATE_FORMAT(time_registered, '%c') = $selected_month AND status = 2 ORDER BY time_registered";
} else {
    $sql = "SELECT * FROM members WHERE status = 2 ORDER BY time_registered";
}
$result = mysqli_query($db, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Generate the mPDF document
    $mpdf = new \Mpdf\Mpdf();

    date_default_timezone_set('Asia/Manila');

$date = date('F j, Y');
$date = strtolower($date);



$mpdf = new \Mpdf\Mpdf();
$mpdf->SetMargins(5, 5, 10); // Set margins (left, right, top, bottom)
$mpdf->SetDefaultFont('Helvetica');


    $mpdf->SetTitle('Sales Report'); // Set the document title

    if ($selected_month) {
        $month_name = date('F', mktime(0, 0, 0, $selected_month, 1));
        $header = '<header>
            <div style="display: flex; align-items: center; justify-content: center;">
            <div style="text-align: center;">
            <h1 style="font-size: 32px;">
                <img src="../assets/images/logo.png" alt="Logo" height="60" style="vertical-align: middle; margin-right: 10px;">
                <span> ALUMNI ASSOCIATION</span> FINANCIAL REPORTS
            </h1>
                    <p style="font-size: 18px; margin-bottom: 0;">Monthly Report - ' . $month_name . '</p>
                    <p style="font-size: 12px; margin-bottom: 0;">Generated on ' . date('F d Y') . ' - ' . date('D') . '</p>
                </div>
               
            </div>
            <hr style="width: 100%; height: 2px; color: black;">
        </header>';
    } else {
        $header = '<header>
        <div style="display: flex; align-items: center; justify-content: center;">
        <div style="text-align: center;">
        <h1 style="font-size: 32px;">
            <img src="../assets/images/logo.png" alt="Logo" height="60" style="vertical-align: middle; margin-right: 10px;">
            <span> ALUMNI ASSOCIATION</span> FINANCIAL REPORTS
        </h1>
                    <p style="font-size: 18px; margin-bottom: 0;">Yearly Report</p>
                    <p style="font-size: 12px; margin-bottom: 0;">Generated on ' . date('F d Y') . ' - ' . date('D') . '</p>
                   
                </div>
            </div>
            <hr style="width: 100%; height: 2px; color: black;">
        </header>';
    }
    $mpdf->WriteHTML($header);
   // Initialize counter
$count = 1;
$id= 1;



// Loop through the results and add them to the document
$html =  "
<h3 style='margin-top: 20px;'>Summary:</h3>
<ul>
  
</ul>
<table style='width: 100%; margin-top: 10px; border-collapse: collapse;' border='1'>
    <thead>
        <tr>
            <th style='padding: 5px; text-align: center;'>NO</th>
            <th style='padding: 5px; text-align: center;'>MEMBER ID</th>
            <th style='padding: 5px; text-align: center;'>COURSE</th>
            <th style='padding: 5px; text-align: center;'>ADDRESS</th>
            <th style='padding: 5px; text-align: center;'>EMAIL ADDRESS</th>
            <th style='padding: 5px; text-align: center;'>TIME REGISTERED</th>
            
      
        </tr>
    </thead>
    <tbody>";


while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr style="text-align: center;">
        <td style="padding: 10px; border: 1px solid #000;">' . $count . '</td>
        <td style="padding: 10px; border: 1px solid #000;">' . $row["member_id"] . '</td>
        <td style="padding: 10px; border: 1px solid #000;">' . $row["course"] . '</td>
        
        <td style="padding: 10px; border: 1px solid #000;">' . $row["address"] . '</td>
        <td style="padding: 10px; border: 1px solid #000;">' . $row["email_address"] . '</td>
        <td style="padding: 10px; border: 1px solid #000;">' . $row["time_registered"] . '</td>
    
    </tr>
    
   
    ';
    $count++;

    

}



$html .= '</tbody></table> <hr style="width: 100%; height: 2px; margin-top: 20px; color: black;">
    
<h3 style="margin-top: 20px;">Total of Alumni ID in the month of '. $month_name .' : '. $id .' </h3>
<h3 style="margin-top: 20px;">Total Amount of Income in the month of '. $month_name .' : '. ($id * 100) .' </h3>'; $id++;


    

    $mpdf->WriteHTML($html); // Add the table to the document

  // Output the PDF document
  $mpdf->Output('Report_for_' . $month_name . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);


} else {
  // ... (your existing code for handling no report found)

  echo "<script>
      alert('No report found');
      document.location.href ='../server/make_pdf.php';
  </script>";
}
?>
