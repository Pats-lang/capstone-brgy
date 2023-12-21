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
            .section-title {
                text-align: center;
                padding-bottom: 60px;
            }

            .section-title h2 {

                font-size: 32px;
                font-weight: 700;
                position: relative;
            }

            .section-title h2:before {
                margin: 0 15px 10px 0;
            }

            .section-title h2:after {
                margin: 0 0 10px 15px;
            }

            .section-title p {
                margin-bottom: 0;
            }

            /* Portfolio Section - Home Page
------------------------------*/
            .portfolio .portfolio-filters {
                padding: 0;
                margin: 0 auto 20px auto;
                list-style: none;
                text-align: center;
            }

            .portfolio .portfolio-filters li {
                cursor: pointer;
                display: inline-block;
                padding: 8px 20px 10px 20px;
                margin: 0;
                font-size: 15px;
                font-weight: 500;
                line-height: 1;
                margin-bottom: 5px;
                border-radius: 50px;
                transition: all 0.3s ease-in-out;
            }

            .portfolio .portfolio-filters li:hover,
            .portfolio .portfolio-filters li.filter-active {
                color: #ffffff;
                background-color: var(--color-primary);
            }

            .portfolio .portfolio-filters li:first-child {
                margin-left: 0;
            }

            .portfolio .portfolio-filters li:last-child {
                margin-right: 0;
            }

            @media (max-width: 575px) {
                .portfolio .portfolio-filters li {
                    font-size: 14px;
                    margin: 0 0 10px 0;
                }
            }

            .portfolio .portfolio-item {
                position: relative;
                overflow: hidden;
            }

            .portfolio .portfolio-item .portfolio-info {
                opacity: 0;
                position: absolute;
                left: 12px;
                right: 12px;
                bottom: -100%;
                z-index: 3;
                transition: all ease-in-out 0.5s;
                background-color: rgba(0, 0, 0, 0.90);
                /* 0.05 represents 5% opacity */
                padding: 15px;
            }

            .portfolio .portfolio-item .portfolio-info h4 {
                color: white;
                font-size: 18px;
                font-weight: 600;
                padding-right: 50px;
            }

            .portfolio .portfolio-item .portfolio-info p {
                color: rgba(var(--color-default-rgb), 0.7);
                font-size: 14px;
                margin-bottom: 0;
                padding-right: 50px;
            }

            .portfolio .portfolio-item .portfolio-info .preview-link,
            .portfolio .portfolio-item .portfolio-info .details-link {
                position: absolute;
                right: 50px;
                font-size: 24px;
                top: calc(50% - 14px);
                color: rgba(var(--color-default-rgb), 0.7);
                transition: 0.3s;
                line-height: 0;
            }

            .portfolio .portfolio-item .portfolio-info .preview-link:hover,
            .portfolio .portfolio-item .portfolio-info .details-link:hover {
                color: var(--color-primary);
            }

            .portfolio .portfolio-item .portfolio-info .details-link {
                right: 14px;
                font-size: 28px;
            }

            .portfolio .portfolio-item:hover .portfolio-info {
                opacity: 1;
                bottom: 0;
            }
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
                                    <h2>Projects</h2>
                                </div>
                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="../../index.php" class="text-reset fw-bold"
                                        style="text-decoration:none;">Home</a>
                                    <span class="mx-1">/</span>
                                    <a href="" class="text-reset" style="text-decoration:none;">Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

     <!-- Portfolio Section - Home Page -->
     <section id="portfolio" class="portfolio">

<?php
// Fetch data from the database (adjust your query accordingly)
$sql = "SELECT img, title, description, last_modified FROM projects";
$result = mysqli_query($connection, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$count = 0;
$images_per_page = 10; // Define the number of images per page

// Calculate the starting and ending indexes for the current page
$current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start_index = ($current_page - 1) * $images_per_page;
$end_index = $start_index + $images_per_page - 1;
?>
<!-- Portfolio Section - Home Page -->
<section id="portfolio" class="portfolio">
    <?php
    // Your database connection code here
    // Fetch data from the database (adjust your query accordingly)
    $sql = "SELECT img, title, description, last_modified FROM projects";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    $count = 0;
    $images_per_page = 10; // Define the number of images per page
    // Calculate the starting and ending indexes for the current page
    $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start_index = ($current_page - 1) * $images_per_page;
    $end_index = $start_index + $images_per_page - 1;
    ?>

    <!-- Section Title -->
    <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Project Gallery</h2>
        <p>Take a look on some of the successful and useful projects/events of our ALUMNI ASSOCIATION!</p>
    </div><!-- End Section Title -->

    <div class="container mb-5">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
                if ($count <= $end_index && $count > $start_index) {
                    $sizeClass = ($count % 2 == 0) ? 'large-image' : 'small-image';
                    $aosDelay = ($count % 2 == 0) ? 200 : 0; // Add a delay for alternate images
                    ?>
                    <div class="col-md-4 col-sm-4 portfolio-item" data-aos="fade-up"
                        data-aos-delay="<?php echo $aosDelay; ?>">
                        <div class="image-container <?php echo $sizeClass; ?>"
                            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border: 2px solid orange; padding: 20px; margin: 10px;">
                            <img src="../../assets/images/projects/<?php echo $row['img']; ?>" class="img-fluid bordered-image"
                                style="width: 100%;" data-toggle="modal"
                                data-target="#imageModal<?php echo $count; ?>"
                                onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="portfolio-info">
                            <h4>
                                <?php echo $row['title']; ?>
                            </h4>
                            <!-- You can add other information here as needed -->
                            <a href="" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <!-- Bootstrap Modal -->
                    <div class="modal fade" id="imageModal<?php echo $count; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="../../assets/images/projects/<?php echo $row['img']; ?>" class="img-fluid"
                                        alt="Enlarged Image">

                                    <div class="col-md-12">
                                        <div class="container mt-2">
                                            <div class="user-info">
                                                <div class="form-group">
                                                    <label for="userName" class="h5">Title</label>
                                                    <textarea
                                                        class="form-control lead"><?php echo $row['title']; ?></textarea>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label class="h5">Description</label>
                                                    <textarea class="form-control lead" rows="4"
                                                        readonly><?php echo $row['description']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userName" class="h5">Date</label>
                                                    <textarea
                                                        class="form-control lead"><?php echo $row['last_modified']; ?></textarea>
                                                </div>
                                                <!-- Add more user information as needed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Bootstrap Modal -->
                    <?php
                }
            }
            // Close the database connection
            mysqli_close($connection);
            ?>
        </div><!-- End Portfolio Container -->
    </div>

    <!-- Back and Next Buttons -->
    <div class="container text-center">
        <?php if ($current_page > 1) { ?>
            <a href="?page=<?php echo $current_page - 1; ?>" class="btn btn-primary">Back</a>
        <?php } ?>
        <?php if ($count > $end_index) { ?>
            <a href="?page=<?php echo $current_page + 1; ?>" class="btn btn-primary">Next</a>
        <?php } ?>
    </div><!-- End Back and Next Buttons -->
</section><!-- End Portfolio Section -->
</section>


        <footer>
            <?php include('../includes/client_footer.php'); ?>
        </footer>

        <script>
            // Initialize AOS
            AOS.init();
        </script>



    </body>

</html>