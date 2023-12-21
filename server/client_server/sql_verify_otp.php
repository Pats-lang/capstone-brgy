<?php
session_start();

if (isset($_POST['otp'])) {
    $userOTP = $_POST['otp'];

    // Check if the OTP session variable exists
    if (isset($_SESSION['otp'])) {
        $storedOTP = $_SESSION['otp'];

        // Check if the OTP has not expired
        if (isset($_SESSION['otp_expiration']) && time() <= $_SESSION['otp_expiration']) {
            if ($userOTP === $storedOTP) {
                // OTP is valid
                // Set the session variable to indicate OTP verification
              

                unset($_SESSION['email_verified']);
                unset($_SESSION['otp']);
                unset($_SESSION['otp_expiration']);
            
                $_SESSION['otp_sent'] = true;

                $response = array(
                    'status' => 'success',
                    'message' => 'OTP verification successful!'
                );
            } else {
                // Invalid OTP
                $response = array(
                    'status' => 'error',
                    'message' => 'Invalid OTP'
                );
            }
        } else {
            // OTP has expired
            unset($_SESSION['email_verified']);
            $response = array(
                'status' => 'error',
                'message' => 'OTP has expired. Please request a new OTP.'
            );
        }
    } else {
        // OTP session variable not set
        $response = array(
            'status' => 'error',
            'message' => 'OTP session not found. Please request a new OTP.'
        );
    }

    echo json_encode($response);
    exit;
}

?>
 