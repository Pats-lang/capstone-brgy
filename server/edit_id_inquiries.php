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
    'picture'=>'',
    'stats' => ''
    
);



$Main_name = $_POST['EditmemberMain_name'];
$Main_yearGraduated = $_POST['EditmemberMain_yearGraduated'];
$Main_address = $_POST['EditmemberMain_address'];
$Main_emailaddress = $_POST['EditmemberMain_emailAddress'];
$Main_birthDate = $_POST['EditmemberMain_birthDate'];
$Main_cellNo = $_POST['EditmemberMain_cellNo'];
$Main_course = $_POST['EditmemberMain_course'];
$Main_civilStatus = $_POST['EditmemberMain_civilStatus'];
$Main_id = $_POST['EditmemberMain_id'];
$status = $_POST['stats'];

if ($preparedSql = $db->prepare("UPDATE `members` SET `name`= ?, `address`= ?, `birth_date`= ?, `civil_status`= ?, `course`= ?, `year_graduated`= ?, `email_address`= ?, `cellphone_no`= ?, `cid`= ? WHERE `member_id`= ?")) {
    $preparedSql->bind_param("sssssisiis", $Main_name, $Main_address, $Main_birthDate, $Main_civilStatus, $Main_course, $Main_yearGraduated, $Main_emailaddress, $Main_cellNo,  $status, $Main_id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated member information';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['stats'] = $status;
        $response['description'] = "Alumni Id Inquiries: <b>" . strtoupper($Main_name) . "</b> has been edited";
        
    }else {
        $response['status'] = false;
        $response['message'] = "Failed to update member information: " . $preparedSql->error;
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
    $mail->addAddress($Main_emailaddress);
    $mail->isHTML(true);

        
    $approvalMessage = '';
    $mailSubject = '';
    $mailBody = '';

    if ($status == 2) {
        $approvalMessage = " <b>Your reservation status is currently <span style='color:green;'> &nbsp; APPROVED</span></b></p>
                           <b><p>We received your payment and proof of transaction!</p></b>

                           <p>I trust this message finds you well. We are pleased to inform you that your 
                           <b>alumni ID request has been verified and approved by the administration of the University of Caloocan City.</b></p>
                           <p>To complete the process and <b>claim your alumni ID, kindly visit the MIS Office on the 3rd floor of the 
                           main campus</b>. Please be advised that the processing time is <b>estimated to be 2 days from the receipt of this email</b>.</p>
                           <p>Your prompt cooperation in the payment and verification process is greatly appreciated. 
                          If you have any further questions or concerns, do not hesitate to respond to this email or 
                           reach out to us at 09196994697.</p>
                           ";
        
        $mailSubject = 'Alumni ID Request - Approval Status';
    } elseif ($status == 0) {
        $approvalMessage = "
                            <b><p>Your reservation status is currently<span style='color:red;'> &nbsp; DECLINED</span></b></p>
                           <p>I trust this email finds you well.</p>
                           <p>After careful verification by the University of Caloocan City Alumni Association, we regret to inform you that we were  <b>unable to verify your graduation from the University of Caloocan City. </b></p>
                           <p>Due to this, we are  <b>unable to proceed with the approval and issuance of your alumni ID at this time. </b></p>
                           <p>If you believe there has been an error or if you have any questions regarding the verification process, please feel free to reach out to us at 09196994697.</p> 
                           <p> We understand that this news may be disappointing, and we are here to assist you with any further information or clarification you may require.</p> 
                           <b><p>Thank you for your understanding.
                           </b>";
        
        $mailSubject = 'Alumni ID Request - Verification Status';
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
                <h2>Greetings $Main_name!</h2>
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



// Additional check to delete member if status is 0
if ($status === '0') {
    // Validate $Main_id to prevent SQL injection
    if (!empty($Main_id)) {
        // Use prepared statement to prevent SQL injection
        $stmtDelete = $db->prepare("DELETE FROM `members` WHERE `member_id` = ?");
        $stmtDelete->bind_param("i", $Main_id);

        // Execute the delete statement
        if ($stmtDelete->execute()) {
            // Member deletion successful
            $response['delete_status'] = true;
            $response['delete_message'] = 'Successfully deleted member with ID ' . $Main_id;
        } else {
            // Member deletion failed
            $response['delete_status'] = false;
            $response['delete_message'] = 'Failed to delete member: ' . $stmtDelete->error;
        }

        // Close the delete statement
        $stmtDelete->close();
    } else {
        // Invalid member ID
        $response['delete_status'] = false;
        $response['delete_message'] = 'Invalid member ID for deletion.';
    }
}

 


echo json_encode($response);
?>