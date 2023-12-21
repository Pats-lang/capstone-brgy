<?php

include '../server/client_server/conn.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$response = array(
    'status' => true,
    'icon' => '',
    'message' => '',
    'count' => 0,
);
// personal_information
$uploadDirectory = "../assets/images/member_pictures/";
$pictureName = $_FILES['register_picture']['name'];
$pictureTmpName = $_FILES['register_picture']['tmp_name'];
$signatureName = $_FILES['register_signature']['name'];
$signatureTmpName = $_FILES['register_signature']['tmp_name'];
$allowedExtensions = ['jpg', 'jpeg', 'png'];
$pictureExtension = strtolower(pathinfo($pictureName, PATHINFO_EXTENSION));
$signatureExtension = strtolower(pathinfo($signatureName, PATHINFO_EXTENSION));
if (!in_array($pictureExtension, $allowedExtensions) || !in_array($signatureExtension, $allowedExtensions)) {
    $response['false'] = false;
    $response['icon'] = "error";
    $response['message'] = "Only JPEG & PNG images is allowed.";
}
$uploadedPicturePath = $uploadDirectory . $pictureName;
$uploadedSignaturePath = $uploadDirectory . $signatureName;
move_uploaded_file($pictureTmpName, $uploadedPicturePath);
move_uploaded_file($signatureTmpName, $uploadedSignaturePath);

$register_memberId = sanitizeData(getDatabase(), $_POST['register_memberId']);
$register_name = sanitizeData(getDatabase(), $_POST['register_name']);
$register_yearGraduated = sanitizeData(getDatabase(), $_POST['register_yearGraduated']);
$register_address = sanitizeData(getDatabase(), $_POST['register_address']);
$register_emailAddress = sanitizeData(getDatabase(), $_POST['register_emailAddress']);
$register_birthDate = sanitizeData(getDatabase(), $_POST['register_birthDate']);
$register_cellNo = sanitizeData(getDatabase(), $_POST['register_cellNo']);
$register_course = sanitizeData(getDatabase(), $_POST['register_course']);
$register_status = sanitizeData(getDatabase(), $_POST['register_status']);
$register_yearToday = sanitizeData(getDatabase(), $_POST['register_yearToday']);
$register_memberCount = sanitizeData(getDatabase(), $_POST['register_memberCount']);
$register_campusId = sanitizeData(getDatabase(), $_POST['register_campusId']);
$cid = 1;
$status= 0;

if ($prepared_membersSql = $db->prepare("INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `name`, `address`, `birth_date`, `civil_status`, `course`, `year_graduated`, `email_address`, `cellphone_no`, `picture`, `signature`, `cid`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?  )")) {
    $prepared_membersSql->bind_param(
        "isissssssissssii",
        $register_memberId,
        $register_yearToday,
        $register_memberCount,
        $register_campusId,
        $register_name,
        $register_address,
        $register_birthDate,
        $register_status,
        $register_course,
        $register_yearGraduated,
        $register_emailAddress,
        $register_cellNo,
        $pictureName,
        $signatureName,
        $cid,
        $status
        
        
    );
    if (!$prepared_membersSql->execute()) {
        $response['false'] = false;
       $response['message'] ="Error executing Personal Information SQL statement: " . $prepared_membersSql->error;
    }
    $prepared_membersSql->close();
} else {
   $response['message'] ="An error occurred while preparing the Personal Information SQL statement: " . $prepared_membersSql->error;
}

// work_experience
$register_workCompany = $_POST['register_workCompany'];
$register_workPosition = $_POST['register_workPosition'];
$register_workDuration = $_POST['register_workDuration'];
for ($i = 0; $i < count($register_workCompany); $i++) { //Using any open failed to count the maximum count of rows.
    $company = sanitizeData(getDatabase(), $register_workCompany[$i]);
    $position = sanitizeData(getDatabase(), $register_workPosition[$i]);
    $duration = sanitizeData(getDatabase(), $register_workDuration[$i]);

    if ($prepared_membersWorkSql = $db->prepare("INSERT INTO `work_experience` (`member_id`, `company`, `position`, `duration`) VALUES (?, ?, ?, ?)")) {
        $prepared_membersWorkSql->bind_param("isss", $register_memberId, $company, $position, $duration);
        if (!$prepared_membersWorkSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Work Experience SQL statement:" . $prepared_membersWorkSql->error;
        }
        $prepared_membersWorkSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Work Experience SQL statement:" . $prepared_membersWorkSql->error;
    }
}

// trainings
$register_trainingTitle = $_POST['register_trainingTitle'];
$register_trainingVenue = $_POST['register_trainingVenue'];
$register_trainingDuration = $_POST['register_trainingDuration'];
for ($i = 0; $i < count($register_trainingTitle); $i++) {
    $title = sanitizeData(getDatabase(), $register_trainingTitle[$i]);
    $venue = sanitizeData(getDatabase(), $register_trainingVenue[$i]);
    $duration = sanitizeData(getDatabase(), $register_trainingDuration[$i]);

    if ($prepared_trainingsSql = $db->prepare("INSERT INTO `trainings` (`member_id`, `title`, `venue`, `duration`) VALUES (?, ?, ?, ?)")) {
        $prepared_trainingsSql->bind_param("isss", $register_memberId, $title, $venue, $duration);
        if (!$prepared_trainingsSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Trainings SQL statement:" . $prepared_trainingsSql->error;
        }
        $prepared_trainingsSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Trainings SQL statement:" . $prepared_trainingsSql->error;
    }
}

// affiliations
$register_affiliationsOrganizations = $_POST['register_affiliationsOrganizations'];
$register_affiliationsPositions = $_POST['register_affiliationsPositions'];
$register_affiliationsDuration = $_POST['register_affiliationsDuration'];
for ($i = 0; $i < count($register_affiliationsOrganizations); $i++) {
    $organizations = sanitizeData(getDatabase(), $register_affiliationsOrganizations[$i]);
    $positions = sanitizeData(getDatabase(), $register_affiliationsPositions[$i]);
    $duration = sanitizeData(getDatabase(), $register_affiliationsDuration[$i]);

    if ($prepared_affiliationsSql = $db->prepare("INSERT INTO `affiliations` (`member_id`, `organizations`, `position`, `duration`) VALUES (?, ?, ?, ?)")) {
        $prepared_affiliationsSql->bind_param("isss", $register_memberId, $organizations, $positions, $duration);
        if (!$prepared_affiliationsSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Affililiations SQL statement:" . $prepared_affiliationsSql->error;
        }
        $prepared_affiliationsSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Affililiations SQL statement:" . $prepared_affiliationsSql->error;
    }
}

// achievements
$register_achievements = $_POST['register_achievements'];
for ($i = 0; $i < count($register_achievements); $i++) {
    $awards = sanitizeData(getDatabase(), $register_achievements[$i]);

    if ($prepared_achievementsSql = $db->prepare("INSERT INTO `awards` (`member_id`, `name`) VALUES (?, ?)")) {
        $prepared_achievementsSql->bind_param("is", $register_memberId, $awards);
        if (!$prepared_achievementsSql->execute()) {
            $response['false'] = false;
           $response['message'] ="Error executing Achievements SQL statement:" . $prepared_achievementsSql->error;
        }
        $prepared_achievementsSql->close();
    } else {
       $response['message'] ="An error occurred while preparing the Achievements SQL statement:" . $prepared_achievementsSql->error;
    }
}







if ($response['status']) {
    $response['icon'] = "success";
    $response['message'] = "Congratulations! You are now a Registered Alumni of the UNIVERSITY OF CALOOCAN CITY!
    Please check your email to monitor/track the status of your Alumni Identification Card.
    ";

    // Send email using PHPMailer

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
        $mail->addAddress($register_emailAddress);
        $mail->isHTML(true);
        
        $mail->Subject = "Alumni ID Request - Payment Confirmation";

        
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
               <td class='img-container'>
               </td>
           </tr>
           <tr>
               <td class='form-details'>
               <h2>Greetings {$register_name}!</h2>
               <p>Your reservation status is currently 
               <b><span style='color:orange;'> &nbsp; PENDING</span></b></p>

               <p><b>I hope this email finds you well.</b>
               We have received your <b>Alumni ID request</b>, and we 
               appreciate your prompt action in processing the payment.</p>  
               
               <p>To expedite the approval process, kindly make the payment of
                One hundred Pesos (100) to the following <b>GCash number: 09196994697</b>.</p>

                <p>Once the payment is made, <b>please send a screenshot of the transaction </b>
                confirmation to this Email. This will help us verify your 
                payment quickly and approve your alumni ID request.</p>

                <p>We understand the importance of having your alumni ID, and we aim to process your request promptly. 
                Thank you for your cooperation in this matter.</p>

                <b><p>We hope that this response answered your inquiry, we also hope that this helped you in making a decision to choose JKOS Events for your upcoming celebration! </p> </b>
                <b><p>For more inquiries feel free to reach us!</p></b>
               </td>
           </tr>
           <div class='footer '>
           <p>&copy; 2023 UNIVERSITY OF CALOOCAN CITY ALUMNI. ASSOCIATION ALL RIGHTS RESERVED.</p>
           <p><a href=' https://www.facebook.com/groups/uccalumnioraganization/'>ALUMNI FB PAGE</a> .</p>
   </div>
           </table>

        </body>
    </html>";

    if (!$mail->send()) {
        $response['icon'] = "error";
        $response['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }

} else {
    $response['icon'] = "error";
    $response['message'] = "Error has occurred while registering";
}


echo json_encode($response);