<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require '../../plugins/PHPMailer/src/Exception.php';
require '../../plugins/PHPMailer/src/PHPMailer.php';
require '../../plugins/PHPMailer/src/SMTP.php';
session_start();

if(isset($_POST['email'])) {
    $email = $_POST["email"];
  
    // // Generate a unique activation code
    // $activationCode = uniqid();

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    // Set SMTP settings (you may need to adjust these)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'eventsjkos@gmail.com';
    $mail->Password = 'ubixdskhobsotqmr';
   
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    $otp = strval(rand(100000, 999999));
    
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
    $_SESSION['otp_expiration'] = time() + 300; 
    // $_SESSION['otp_requested'] = true;
    // $_SESSION['otp_request_time'] = time();



    // Set email content
    $mail->setFrom('eventsjkos@gmail.com', 'ALUMNI ASSOCIATION');
    $mail->addAddress($email);
    $mail->Subject = 'Greetings UCCIAN!';
    $mail->isHTML(true);

    // Email body with activation link (you can customize this)

    // $mailer->Body = "Please click the following link to activate your account: <a href='$activationLink'>Activate</a>";
    
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
               
               font-size: 20px;
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

             h1 {
               color: #005ea5;
               font-size: 24px;
               margin-bottom: 20px;
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
            <h1>Your One Time PIN (OTP) is: </h1>                 
                <div class='otp-code'>
                <b> $otp</b>
                </div>
                <b> <p>Enter this OTP to our website to verify your email address.</p></b>      
                <p> <b><span style='color:red;'> OTP WILL ONLY LAST 5 MINUTES OR YOUR REGISTRATION WILL BE CANCELLED.</span></b></p>            
            </td>
        </tr>
        <div class='footer '>
        <p>&copy; 2023 UNIVERSITY OF CALOOCAN CITY ALUMNI. ASSOCIATION ALL RIGHTS RESERVED.</p>
        <p><a href=' https://www.facebook.com/groups/uccalumnioraganization/'>ALUMNI FB PAGE</a> .</p>
</div>
        </table>
    </body>
</html>";

  
    if ($mail->send()) {
        // Email sent successfully
        $_SESSION['email_verified'] = true;
     
        echo "success";
    } else {
        // Email sending failed
        echo "error";
    }
} else {
    echo "Invalid request";
}
