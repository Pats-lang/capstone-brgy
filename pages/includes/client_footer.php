<?php

$dbHost = 'localhost';
 $dbName = 'u907822938_alumnidb';
 $dbUsername = 'root';
 $dbPassword = '';
 $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) ;
 
 if (!$connection) {
     die("Can't connect to the database server. Error: " . mysqli_connect_error());
 }
$sql = "SELECT * FROM settings";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)){
?>


<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted mt-5">
  <!-- Section: Social media -->
  <!-- Left -->

  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4 mt-5">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
          <?php echo $row['sName']; ?>
          </h6>
          <p>
          <?php echo $row['sNorth']; ?>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->

        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 mt-5">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href=" https://ucc-caloocan.edu.ph/index" class="text-reset">UCC Website</a>
          </p>
          <p>
            <a href="https://chedro-ncr.com/commission.php" class="text-reset">CHED</a>
          </p>
          <p>
            <a href="https://www.facebook.com/univofcaloocanofficial" class="text-reset">Fb Page UCC</a>
          </p>
          <p>
            <a href="https://www.facebook.com/groups/uccalumnioraganization/" class="text-reset">FB Page UCC Alumni</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 mt-5">Contact</h6>
          <p><i class="fas fa-home me-3"></i>
          <?php echo $row['sAddress']; ?>
          </p>
          <p>

            <i class="fas fa-envelope me-3"></i>
            <?php echo $row['sEmail']; ?>
          </p>
          <p><i class="fas fa-phone me-3"></i>+<?php echo $row['sContact']; ?></p>

        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->

  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © Copyright  <?php echo $row['sDescription']; ?>. All Rights Reserved.

  </div>
  <?php } ?>
  <!-- Copyright -->

  <!-- Footer -->