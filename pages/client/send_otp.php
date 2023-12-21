<?php
include 'header.php';

include '../../server/client_server/conn.php';


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumni Association</title>

        <style>
            /* Additional custom styles */
            body {
                font-family: Georgia, serif;
                font-weight: bold;
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../../assets/images/stepper.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            .breadcrumb-container {
                text-align: center;
                position: relative;
                z-index: 1;
            }

            .breadcrumb-container h2 {
                margin: 0;
            }

            .breadcrumb-container img {
                margin: 5px;
            }

            .card {
                margin: 20px;
                /* Add margins to all sides */
                padding: 20px;
                /* Add padding to the card */
            }

            /* Background overlay */
            .modal-overlay {
                width: 100%;
                height: 100%;
                background-size: cover;
                background-color: rgba(0, 0, 0, 0.5);


                z-index: 1;
                /* Lower z-index value for the overlay */
            }
        </style>
    </head>

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <!-- Breadcrumb Background (placed first in the HTML structure) -->
        <section>
            <div class="bg-warning py-0">
                <div class="container">
                    <div class="mx-auto">
                        <div class="p-2 breadcrumb-container">
                            <div class="d-flex justify-content-center align-items-center mt-2 flex-wrap">
                                <h2>
                                    <img src="../../assets/images/logo.png" alt="Logo" width="60" height="60">
                                    UNIVERSITY OF CALOOCAN CITY ALUMNI ORGANIZATION
                                    <img src="../../assets/images/logo.png" alt="Logo" width="60" height="60">
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Centered Card -->
        <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-md-8">
                <!-- Adjust column size to make the card larger -->
                <div class="card p-4">
                    <div class="card-header text-center">
                        Verify your Email
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissable">
                            <strong>PLEASE ENTER A VALID EMAIL ADDRESS!</strong>
                        </div>

                        <form id="emailForm" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example1">Email address</label>
                                <input type="email" id="form1Example1" class="form-control" name="email" required />
                            </div>
                         </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="g-recaptcha" data-sitekey="6LcILSEpAAAAAMQgY1piCZx7p6myxTMTFRx0BuAS"
                             data-theme="light" data-size="normal" data-callback="recaptchaCallback"></div>
                        </div>
                    </div>
                            <!-- Submit button -->
                        <div class="row">
                          <div class="col">
                            <button type="submit" class="btn btn-primary btn-block mt-3">Send Email Verification</button>
                          </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script>
            $(document).ready(function () {
         $("#emailForm").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Captcha
        const captchaResponse = grecaptcha.getResponse();
        if (!captchaResponse.length > 0) {
          Swal.fire({
                  icon: "warning",
                  title: "Error",
                  text: "Captcha Not Compelete."
                });
        } else {
          // Get the email address from the form
          var email = $("#form1Example1").val();

          // Display a loading SweetAlert
          var loadingAlert = Swal.fire({
            title: "Sending Email...",
            text: "Please wait...",
            icon: "info",
            showConfirmButton: false,
            allowOutsideClick: false
          });

          $.ajax({
            type: "POST",
            url: "../../server/client_server/sql_send_verification_email.php",
            data: {
              email: email,
              recaptchaResponse: captchaResponse 
            },
            success: function (response) {
              if (response === "success") {
                // Email sent successfully
                Swal.fire({
                  icon: "success",
                  title: "Email Verification Sent!",
                  text: "Check your email to view the One Time PIN (OTP).",
                  confirmButtonText: "OK",
                }).then((result) => {
                  // Check if the email was sent successfully
                  if (response === "success" && result.isConfirmed) {
                    // Redirect to the OTP verification page
                    window.location.href = "verify_otp.php";
                  }
                });
              } else {
                // Email sending failed
                Swal.fire({
                  icon: "warning",
                  title: "Error",
                  text: "Failed to send the verification email. Please try again later."
                });
              }
            },
            error: function () {
              // Hide the loading spinner in case of an error
              $("#loading-spinner").hide();

              // Ajax request failed
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "An error occurred while processing your request. Please try again later."
              });
            }
          });
        }
      });

      // reCAPTCHA callback
      function recaptchaCallback() {
        // Enable the submit button or perform other actions
        $('#emailForm').find('button[type="submit"]').prop('disabled', false);
      }
    });
  </script>
      
        </script>






    </body>

</html>