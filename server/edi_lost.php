<?php 
include '../config/config.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$response = array(
    'status' => false,
    'message' => '',
    'admin' => '',
    'operation' => '',
    'description' => '',
    'stats'=> ''
);
// Define your function to retrieve existing image name based on announcement ID
function getExistingImageName($memberid) {
    global $db; // Assuming $db is your database connection object

    $query = "SELECT img FROM lost WHERE lost_id = ?";
    
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $memberid); // Fix: use $memberid instead of $id
        $stmt->execute();
        $stmt->bind_result($existingImageName);

        if ($stmt->fetch()) {
            $stmt->close();
            return $existingImageName;
        }
    }

    return null;
}

$uploadDirectory = "../assets/images/lost/";
$edit_lost = isset($_FILES['edit_lost']) ? $_FILES['edit_lost']['name'] : null;
$edit_lostTmpName = isset($_FILES['edit_lost']) ? $_FILES['edit_lost']['tmp_name'] : null;

// Check if an image is uploaded
if (!empty($edit_lost)) {
    // If an image is uploaded, move it to the upload directory
    move_uploaded_file($edit_lostTmpName, $uploadDirectory . $edit_lost);
} else {
    // If no image is uploaded, keep the existing image name in the database
    $edit_Idalumni = sanitizeData(getDatabase(), $_POST['lost_id']);
    $existingImageName = getExistingImageName($edit_Idalumni);

    if ($existingImageName) {
        // Use the existing image name
        $edit_lost = $existingImageName;
    } else {
        // Handle the case where no existing image name is found (perhaps set to a default or handle as needed)
        $edit_lost = null;
    }
}
$lost_id = $_POST['lost_id'];
$alumniID = $_POST['alumniID'];
$name = $_POST['name'];
$campus = $_POST['campus'];
$email= $_POST['email'];
$birthday = $_POST['birthday'];
$reason = $_POST['reason'];
$status = $_POST['status'];
if ($preparedSql = $db->prepare("UPDATE `lost` SET `member_id`= ?, `name`= ?, `campus`= ?, `email`= ?, `bday`= ?, `reason`= ?, `status`= ?, `img`= ? WHERE `lost_id`= ?")) {
    $preparedSql->bind_param("isssssssi", $alumniID, $name, $campus, $email, $birthday, $reason, $status, $edit_lost, $lost_id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated information';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['stats'] = $status;
        $response['description'] = "Lost Alumni ID inquiries: <b>" . strtoupper($name) . "</b> has been edited";
        
    }else {
        $response['status'] = false;
        $response['message'] = "Failed to update information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }

    $preparedSql->close();
     
    if ($response['status']) {
        require '../plugins/PHPMailer/src/Exception.php';
        require '../plugins/PHPMailer/src/PHPMailer.php';
        require '../plugins/PHPMailer/src/SMTP.php';
           
        $mail = new PHPMailer(true);
    
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'eventsjkos@gmail.com';
        $mail->Password = 'ubixdskhobsotqmr';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        $mail->setFrom('eventsjkos@gmail.com', 'ALUMNI ASSOCIATION');
        $mail->addAddress($email);
        $mail->isHTML(true);
    
            
        $approvalMessage = '';
        $mailSubject = '';
        $mailBody = '';
        
    if ($status == 2) {
        $approvalMessage = " <b>Your request status is currently <span style='color:green;'> &nbsp; DONE</span></b></p>
                           <b><p>We received your payment and proof of transaction!</p></b>

                           <p>We are writing to inform you that your request for the approval of the Lost alumni ID Affidavit has been successfully processed. 
                           <b>alumni ID request has been verified and approved by the administration of the University of Caloocan City.</b></p>
                           <p>To complete the process and <b>claim your alumni ID, kindly visit the MIS Office on the 3rd floor of the 
                           main campus</b>. Please be advised that the processing time is <b>estimated to be 2 days from the receipt of this email</b>.</p>
                           <p>Your prompt cooperation in the payment and verification process is greatly appreciated. 
                          If you have any further questions or concerns, do not hesitate to respond to this email or 
                           reach out to us at 09196994697.</p>
                           ";
        
        $mailSubject = 'Alumni ID Request - Approval Status';
    } else {
        // Handle other status values if needed 
        $approvalMessage = 'Undefined status';
        $mailSubject = 'Undefined Status';
    }

    $mail->Subject = $mailSubject;
    $mail->Body = "<html>
    <head>
        <style>
            /* Add your CSS styles here */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
             
            }
          
            table.container {
               max-width: 600px;
               width: 100%;
               margin: 0 auto;
               background-color: #EDE9E8;
               border-radius: 5px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           }
           
           td.img-container {
            background-image: url('https://i.ibb.co/9VtGSvj/Header-1.png');             
              background-size: cover; /* Adjust as needed */
               background-position: center; /* Adjust as needed */
               padding: 100px;
               border-radius: 5px 5px 0px 0px;
               text-align: center;
           
           }
           
   
           td.form-details {
              
               border-radius: 0px 0px 5px 5px;
               background-color: #FFF;
               padding: 20px;
           }
           .footer {
               background-color: #f2f2f2;
               text-align: center;
               padding: 20px;
               border-radius: 0 0 10px 10px;
               font-size: 12px;
           }
           .footer p {
               margin: 0;
               padding: 0;
           }
           .footer a {
               color: #005ea5;
               text-decoration: none;
           }
           .otp-code {
               background-color: #f5f5f5;
               border-radius: 5px;
               padding: 10px;
              
               text-align: center;
               margin-bottom: 30px;
           }
           
           .footer p {
               margin: 0;
               padding: 0;
           }
           .footer a {
               color: #005ea5;
               text-decoration: none;
           }
           @media (max-width: 768px) {
               /* Adjust styles for smaller screens (e.g., email) */
               td.img-container {
                 width: 100%;
                 height: 100%;
                 padding: 50px; /* Adjust as needed for smaller screens */
               }
             }          
        </style>
    </head>
    <body>
    <table class='container'>
        <tr>
            <td class='img-container'></td>
        </tr>
        <tr>
            <td class='form-details'>
                <h2>Greetings $name!</h2>
                <p>$approvalMessage</p>
               
                <b><p>For more inquiries feel free to reach us!</p></b>
            </td>
        </tr>
        <tr>
            <td class='footer'>
                <p>&copy; 2023 UNIVERSITY OF CALOOCAN CITY ALUMNI. ASSOCIATION ALL RIGHTS RESERVED.</p>
                <p><a href='https://www.facebook.com/groups/uccalumnioraganization/'>ALUMNI FB PAGE</a>.</p>
            </td>
        </tr>
    </table>
</body>
</html>";

   
            
     
        $mail->send();
    
        
    } else {
        $response['message'] = "Failed to send Email " . $preparedSql->error;
    }

} else {
    $response['status'] = false;
    $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
    http_response_code(500); // Internal Server Error
}
 

echo json_encode($response);
?>