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
            @media (min-width: 700px) {
                .larger-image {
                    max-width: 100%;
                    height: auto;
                    width: 100%;
                }
            }
        </style>
    </head>

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <?php include('../includes/client_navigation.php'); ?>

        <section>
            <div class="bg-light">
                <div class="container">
                    <div class="mx-auto">
                        <div class="p-2 breadcrumb-container">
                            <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">

                                <div>
                                    <h2>ABOUT</h2>
                                </div>

                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="../../index.php" class="text-reset fw-bold"
                                        style="text-decoration:none;">Home</a>
                                    <span class="mx-1">/</span>
                                    <a href="" class="text-reset" style="text-decoration:none;">About</a>
                                    <span class="mx-1">/</span>
                                    <a href="" class="text-reset" style="text-decoration:none;">Alumni</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="about mt-5">
            <div class="container">
                <div class="row no-gutters">
         <?php
            // Fetch data from the database (adjust your query accordingly)
            $sql = "SELECT img, mission, vission FROM history";
            $result = mysqli_query($connection, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>
           
                    <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start aos-init aos-animate"
                        data-aos="fade-right" data-aos-delay="300" data-aos-duration="800">
                        <img src="../../assets/images/history/<?php echo $row['img']; ?>" class="img-fluid bordered-image" >
                    </div>
                    <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch mt-5" data-aos="fade-up"
                        data-aos-duration="800">
                        <div class="content d-flex flex-column justify-content-center p-3">
                            <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">ABOUT Alumni
                                Association</h2>
                            <p class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="400"
                                style="text-align: justify;">
                                <strong>Mission:</strong> <?php echo $row['mission']; ?>"
                            </p>
                            <p class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="500"
                                style="text-align: justify;">
                                <strong>Vision:</strong> <?php echo $row['vission']; ?>
                            </p>
                        </div>
                        <?php
            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php include('../includes/client_footer.php'); ?>
        </footer>

        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>

        <script>
            AOS.init();
        </script>

    </body>

</html>