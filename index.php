<?php
session_start();
unset($_SESSION['otp_sent']);
unset($_SESSION['email_verified']);
include 'server/client_server/conn.php';
$sql = "SELECT * FROM settings";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)){
?>

<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumni Association</title>

        <!-- LOGO SA TAAS -->
        <link rel="icon" href="assets/images/logo/<?php echo $row['sLogo']; ?> "/>
        <!--PERSONAL CSS -->
        <!-- <link rel="stylesheet" href="assets/css/index.css" /> -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
     
        <!-- BS Stepper -->
        <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
        <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.css">
        <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- Animate on Scroll (AOS) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <!-- Jquery Validation (1.19.5 for all Plugins and Validation itself) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"
        integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
            .navbar {
                background-color: #333;
                color: white;
                padding: 5px;
                position: relative;
                z-index: 99;
            }

            .logo-text {
                font-weight: bold;
                margin-right: 10px;
            }

            .alumni-organization-container {
                font-weight: bold;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .alumni-text {
                font-size: 14px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .organization-text {
                font-weight: bold;
                font-size: 12px;
            }

            .custom-navbar {
                border-bottom: 10px solid orange;
                /* Adjust the color as needed */
            }

            .bg-orange {
                background-color: #ee7600;
                height: 10px;
            }
            .bg-green {
                background-color: #529f37;
                height: 20px;

            }
            button {
                border: 0;
                background-color: orange;
                font-weight: 500;
                font-size: 16px;
                letter-spacing: 1px;
                padding: 12px 24px;
                border-radius: 5px;
                transition: 0.3s;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            button:hover {
                background: #529f37;
                padding-right: 19px;
                color: white;
            }
            .about {
                background-color: #f4f4f4;
                padding: 20px 0px;
            }
            .about-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 15px;
            }
            .about .icon-box {
                padding: 60px 40px;
                box-shadow: 0px 10px 50px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: all 0.3s ease-out 0s;
                background-color: none;
            }
            .about .icon-box i {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 24px;
                font-size: 32px;
                line-height: 0;
                transition: all 0.4s ease-out 0s;
                background-color: #212529;
                color: #e84545;
            }
            .icon-boxes .icon-box:hover {
                transform: translateY(-10px);
            }
            .icon-boxes .icon-box:hover h3,
            .icon-boxes .icon-box:hover p {
                transform: translateY(0);

            }
            .about .icon-box p {
                margin-bottom: 0;
            }
            .about .icon-box:hover i {
                background-color: #e84545;
                color: #ffffff;

            }
            .about .icon-boxes .col-md-6:nth-child(2) .icon-box,
            .about .icon-boxes .col-md-6:nth-child(4) .icon-box {
                margin-top: -40px;
            }
            @media (max-width: 768px) {

                .about .icon-boxes .col-md-6:nth-child(2) .icon-box,
                .about .icon-boxes .col-md-6:nth-child(4) .icon-box {
                    margin-top: 0;
                }
            }

            /* stats*/
            .stats {
                --color-default: #ffffff;
                --color-default-rgb: 255, 255, 255;
                --color-background: #000000;
                --color-background-rgb: 0, 0, 0;
                position: relative;
                padding: 40px 0;
            }
            .stats img {
                position: absolute;
                inset: 0;
                display: block;
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                z-index: 1;
            }
            .stats:before {
                content: "";
                background: rgba(var(--color-background-rgb), 0.6);
                position: absolute;
                inset: 0;
                z-index: 2;
            }
            .stats .container {
                position: relative;
                z-index: 3;
            }
            .stats .stats-item {
                padding: 30px;
                width: 100%;
            }
            .stats .stats-item span {
                font-size: 48px;
                display: block;
                color: var(--color-default);
                font-weight: 700;
            }
            .stats .stats-item p {
                padding: 0;
                margin: 0;
                font-family: var(--font-primary);
                font-size: 16px;
                font-weight: 700;
                color: rgba(var(--color-default-rgb), 0.6);
            }

            /* news */
            .news-container {
                width: 100%;
                height: 50px;
                background-color: #333;
                color: #fff;
                overflow: hidden;
            }

            .news-headlines ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                animation: animate 15s linear infinite;
            }
            .news-headlines li {
                line-height: 50px;
            }

            @keyframes animate {
                0% {
                    transform: translateX(100%);
                }
                100% {
                    transform: translateX(-100%);
                }
            }
        </style>
    </head>

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top custom-navbar ">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="assets/images/logo/<?php echo $row['sLogo']; ?> " alt="Logo" width="50" height="50">
                    <div class="alumni-organization-container pl-2">
                        <span class="alumni-text"><?php echo $row['sName']; ?></span>
                        <span class="organization-text"><?php echo $row['sDescription']; ?></span>
                    </div>
                    <?php } ?>
                </a>
                <button class="navbar-toggler navbar-toggler-white navbar-light" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link " href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages/client/about.php">About Alumni Association</a>
                                <a class="dropdown-item" href="pages/client/officers.php">Alumni Association
                                    Officers</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/client/projects.php">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/client/contact.php">Contact us</a>
                        </li>
                        <li class="nav-item">
      
      <a class="nav-link " href="pages/admin_logIn.php">Admin</a>
    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section>

            <!-- announcements  -->
            <?php
            $sql = "SELECT * FROM client_announcement";
            $result = mysqli_query($connection, $sql);
            ?>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    $indicatorIndex = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isActive = ($indicatorIndex === 0) ? 'active' : '';
                        ?>

                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $indicatorIndex; ?>"
                            class="<?php echo $isActive; ?>" aria-label="Slide <?php echo $indicatorIndex + 1; ?>"></button>
                        <?php
                        $indicatorIndex++;
                    }
                    ?>
                </div>

                <div class="carousel-inner">
                    <?php
                    $active = true; // To set the first item as active
                    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
                    while ($row = mysqli_fetch_assoc($result)) {
                        $itemClass = ($active) ? 'active' : '';
                        ?>
                        <!-- announcement  -->
                        <div class="carousel-item <?php echo $itemClass; ?>">
                            <div class="position-relative">
                                <img src="assets/images/announcement/<?php echo $row['img']; ?>"
                                    class="img-fluid d-block w-100 " alt="Image">
                                <div class="mask" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                                      background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7));">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <?php echo $row['title']; ?>
                                    </h4>
                                    <h5>
                                        <?php echo $row['description']; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $active = false; // Set active to false for subsequent items
                    }
                    ?>

                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

            <!-- news  -->
            <?php
            $sql = "SELECT * FROM info";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="news-container">
                    <div class="news-headlines">
                        <ul>

                            <li>
                                <?php echo $row['info_des2']; ?>
                            </li>

                            <!-- Add more headlines here -->
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <!-- alumni count -->
            <section id="alumni" class="stats">
                <img src="assets/images/stats-bg.jpg" alt="" data-aos="fade-in">
                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <?php
                        $sql = "SELECT COUNT(*) AS members_count FROM members";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $members_count = $row['members_count'];

                        $sqlSouth = "SELECT COUNT(*) AS south_count FROM members WHERE campus_id = 1";
                        $resultSouth = mysqli_query($connection, $sqlSouth);
                        $rowSouth = mysqli_fetch_assoc($resultSouth);
                        $south_count = $rowSouth['south_count'];

                        $sqlNorth = "SELECT COUNT(*) AS north_count FROM members WHERE campus_id = 2";
                        $resultNorth = mysqli_query($connection, $sqlNorth);
                        $rowNorth = mysqli_fetch_assoc($resultNorth);
                        $north_count = $rowNorth['north_count'];
                        ?>

                        <div class="col-lg-3 col-md-12 mx-auto">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="<?php echo $members_count; ?>"
                                    data-purecounter-duration="2000" class="counter purecounter"></span>
                                <span>ALUMNI</span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 mx-auto">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="<?php echo $south_count; ?>"
                                    data-purecounter-duration="2000" class="counter purecounter"></span>
                                <span>SOUTH</span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 mx-auto">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="<?php echo $north_count; ?>"
                                    data-purecounter-duration="2000" class="counter purecounter"></span>
                                <span>NORTH</span>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- about  -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row align-items-xl-center gy-5 ">
                        <?php
                        $sql = "SELECT * FROM Settings";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-xl-5 content ">
                                <h2>
                                    <?php echo $row['sName']; ?>
                                </h2>
                                <p class="about-description">
                                    <?php echo $row['sNorth']; ?>
                                </p>

                                <button type="button" class="button" data-toggle="modal" data-target="#scrollableModal">
                                    Read more
                                </button>

                            </div>

                        <?php } ?>

                        <div class="col-xl-7 icon-boxes">
                            <div class="row gy-4  mt-5">
                                <div class="col-md-6  mt-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box ">
                                        <h3>Be a REGISTERED UCC Alumni!</h3>
                                        <p>Click here to become a Registered Alumni of the University of Caloocan City,
                                            and avail your membership ID!</p>
                                        <button class="mt-4" id="alumniButton">Register Now</button>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-5" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box ">
                                        <h3>Lost your Alumni ID?</h3>
                                        <p>Click here to get a New Alumni Id</p>
                                <button type="button" class="button mt-4" data-toggle="modal" data-target="#largeModal">
                                Get it now!
  </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </section>

        <!-- footer -->
        <footer>
            <?php include 'pages/includes/client_footer.php' ?>
        </footer>

        <!-- read more modal  -->
        <?php
        $sql = "SELECT * FROM settings";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="modal fade" id="scrollableModal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollableModalLabel">
                                <?php echo $row['sName']; ?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                
                            
                                <?php echo $row['sMain']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>  

 <!-- Large Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Lost ID Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="lost-form">

                    <div class="form-group">
                        <label for="alumniId">Alumni ID</label>
                        <input type="text" class="form-control" id="alumniId" name="alumniID" placeholder="Enter Alumni ID">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="campus">Campus</label>
                        <select class="form-control" id="campus" name="campus">
                            <option>Main</option>
                            <option>North</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason for Losing ID</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Attachment of Affidavit of lost</label>
                        <input type="file" class="form-control-file" id="attachment" name="attachment" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="lostbtn" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>


        <script>
            $(document).ready(function () {
                AOS.init();
                // Check for the registration query parameter in the URL
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('registration') === 'success') {
                    // Show the registration success toast
                    $('#registrationSuccessToast').toast('show');

                    // Close the toast after 5 seconds (5000 milliseconds)
                    setTimeout(function () {
                        $('#registrationSuccessToast').toast('hide');
                    }, 3000);

                    // Add an event listener for toast hidden event
                    $('#registrationSuccessToast').on('hidden.bs.toast', function () {
                        // Reload the page (index.php)
                        window.location.href = 'index.php';
                    });
                }
            });
            // Add a click event listener to the button
            $("#alumniButton").click(function () {
                // Display a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Register now and avail the Alumni Identification Card?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: 'orange',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, redirect to another page (e.g., alumni.php)
                        window.location.href = 'pages/client/send_otp.php';
                    }
                });
            });

     $(document).ready(function () {
         $('#lost-form').on('submit', function (e) {
            if ($('#lost-form').valid()) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "server/client_server/add_lost.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Your Lost ID  Has Been Sent',
                    }).then(function () {
                        location.href = "index.php";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to Send Re-id.',
                    });
                }
            },
            error: function () {
                alert('Error importing data: ' + error);
            }
        });
    } else {
                validate_form.focusInvalid();
            }
    });
    
    
});


            document.addEventListener("DOMContentLoaded", function () {
                var counters = document.querySelectorAll('.purecounter');

                counters.forEach(function (counter) {
                    var start = parseInt(counter.getAttribute('data-purecounter-start'));
                    var end = parseInt(counter.getAttribute('data-purecounter-end'));
                    var duration = parseInt(counter.getAttribute('data-purecounter-duration'));
                    var increment = (end - start) / (duration / 16);
                    var currentValue = start;

                    var interval = setInterval(function () {
                        currentValue += increment;
                        counter.textContent = Math.round(currentValue);

                        if ((increment >= 0 && currentValue >= end) || (increment < 0 &&
                            currentValue <= end)) {
                            clearInterval(interval);
                        }
                    }, 16);
                });
            });
            jQuery.validator.addMethod("alphabeticWithSpace", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
      }, "Please enter alphabetic characters only.");
      // Form validation
      var validate_form = $('#lost-form').validate({
        rules: {
            alumniID: {
                required: true,
            },
           name: {
            required: true,
            alphabeticWithSpace: true,
            minlength: 3,
          },
          campus: {
            required: true,
          },
          email: {
            required: true,
            minlength: 5,
          },
          birthday: {
            required: true,
          },
          reason: {
            required: true,
          },
          attachment: {
            required: true,
            accept: "image/jpeg, image/png"
          },
      
        },

        messages: {
            alumniID: {
               required: 'Alumni ID is required',
            },
          name: {
            required: 'Please provide a valid Name!',
          },
          campus: {
            required: 'Please select a valid campus',
          },
          email: {
            required: 'Please provide a valid Email Address!',
          },
          birthday: {
            required: 'Birthday is required!',
          },
          reason: {
            required: 'Please ENTER a valid reason!'
          },
          attachment: {
            required: 'Please provide a valid picture !',
            accept: 'Please select a valid JPG or PNG image file.'
           
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
          $(element).addClass('is-valid');
        }

      });
        </script>
    </body>

</html>