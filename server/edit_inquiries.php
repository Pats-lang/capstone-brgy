
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
    'description' => ''
);

// Define your function to retrieve existing image name based on announcement ID

$id = sanitizeData(getDatabase(), $_POST['id']);
$i_name = sanitizeData(getDatabase(), $_POST['i_name']);
$i_email = sanitizeData(getDatabase(), $_POST['i_email']);
$i_message = sanitizeData(getDatabase(), $_POST['i_message']);
$r_message = sanitizeData(getDatabase(), $_POST['r_message']);
$subject = sanitizeData(getDatabase(), $_POST['subject']);

if ($preparedSql = $db->prepare("UPDATE `inquire` SET `i_name`= ?, `i_email`= ?, `i_message` = ?, `r_message` = ?, `i_status` = '1'  WHERE id =? ")) {
    $preparedSql->bind_param("ssssi", $i_name, $i_email, $i_message, $r_message, $id);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated Board of Director details.';
        $response['admin'] = $_SESSION['adminLogged'];
        $response['operation'] = "edit";
        $response['description'] = "Inquiries <b> I-" . strtoupper($id) . "</b> has been replied in<b>Inquiries.</b>";
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }

    $preparedSql->close();

if ($response['status']){
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
    $mail->addAddress($i_email);
    $mail->isHTML(true);
    
    $mail->Subject = "Alumni Inquiry - {$subject}" ;
  
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
                <h2>Greetings {$i_name}!</h2>
                    <b><p>We successfully received your inquiry/question to our page</p></b>                   
                <div class='otp-code'>
                    <p class='form-details'>{$i_message}</p>
                </div>
                <b> <p>Our Response:</p></b>                
                <div class='otp-code'>
                    <p >{$r_message}</p>
                </div>
                
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
    
     $mail->send();
                }else{
        $response['message'] = "Failed to send Email " . $preparedSql->error;
    }

    }else{
        $response['status'] = false;
        $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
        http_response_code(500); // Internal Server Error
    }

echo json_encode($response);
?>
