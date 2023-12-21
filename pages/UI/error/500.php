<?php
include 'database_connection.php';
session_start();
$adminLogged = $_SESSION['adminLogged'];

if (empty($adminLogged)) {
  header('Location: ../pages/admin_logIn.php');
}
$admin_sql = "SELECT * FROM `admin` where `admin_username` = '$adminLogged'";
$admin_result = mysqli_query(getDatabase(), $admin_sql);
$adminLogged_Fullname = "";
while ($admin_row = mysqli_fetch_array($admin_result)) {
  $adminLogged_Fullname = $admin_row['admin_fullname'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UCC | Alumni Management System</title>

  <?php include 'import.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


  <!-- Site wrapper -->
  <div class="wrapper">

    <?php include 'includes/admin_navigation.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>500 Error Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">500 Error Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>

          <p>
            We will work on fixing that right away.
            Meanwhile, you may <a href="dashboard.php">return to dashboard</a> or try using the search form.
          </p>

        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <?php include 'includes/admin_footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

</body>

</html>