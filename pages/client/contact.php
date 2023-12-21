<?php
include 'header.php';
include '../../server/client_server/conn.php';
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

        <style>
        </style>
    </head>

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <?php include '../includes/client_navigation.php'; ?>

        <section>
            <div class="bg-light">
                <div class="container">
                    <div class="mx-auto">
                        <div class="p-2 breadcrumb-container">
                            <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">

                                <div>
                                    <h2>REACH US</h2>
                                </div>

                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="../../index.php" class="text-reset fw-bold"
                                        style="text-decoration:none;">Home</a>

                                    <span class="mx-1">/</span>
                                    <a href="" class="text-reset" style="text-decoration:none;">Contact Us</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about mt-5 mb-5">
            <div class="container">
                <div class="row no-gutters">
                    <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start aos-init aos-animate"
                        data-aos="fade-right" data-aos-delay="300" data-aos-duration="800">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61760.71058205255!2d120.99488250961079!3d14.653420468293016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b686dd24e859%3A0xe442b57504cbf05f!2sUniversity%20of%20Caloocan%20City%20-%20South%20Campus!5e0!3m2!1sen!2sph!4v1695674246308!5m2!1sen!2sph"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <?php } ?>
                    </div>

                    <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch mt-5" data-aos="fade-up"
                        data-aos-duration="800">
                        <div class="content d-flex flex-column justify-content-center p-5">
                            <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">Got any Inquiries?
                            </h2>
                            <h3 class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">Email us NOW!
                            </h3>
                            <form id="inquire-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name"
                                                name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="message">Message</label>
                                    <textarea class="form-control form-control-sm" id="message" name="message" rows="5"
                                        required></textarea>
                                </div>
                                <button type="submit" id="submit" value="submit"
                                    class="btn btn-primary mt-3">SEND</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include '../includes/client_footer.php'; ?>


        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>

        <script>
            AOS.init();
            $(document).ready(function () {
                $('#inquire-form').on('submit', function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "../../server/client_server/sql_inquire.php",
                        data: $(this).serialize(),
                        success: function (response) {
                            if (response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'You Inquiry Have been Sent',
                                }).then(function () {
                                    location.href = "../../index.php";
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed to Send you inquiry.',
                                });
                            }
                        },
                        error: function () {
                            alert('Error importing data: ' + error);
                        }
                    });
                });
            });
        </script>



    </body>

</html>