<?php
include '../config/config.php';
include '../server/admin_login-verification.php';
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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-secondary">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <!-- Small Box (Stat card) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>

                                        <?php
                                        $sql = "SELECT * from members WHERE status = 0"; 
                                        $result = mysqli_query($db, $sql);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                        ?>
                                    </h3>

                                    <p>Pending</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-hourglass-end"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>                
                                         <?php
                                        $sql = "SELECT * from members WHERE status = 1"; 
                                        $result = mysqli_query($db, $sql);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                        ?>
                                    </h3>

                                    <p>Done</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                    <?php
                                        $sql = "SELECT * from members WHERE status = 2"; 
                                        $result = mysqli_query($db, $sql);
                                        $count = mysqli_num_rows($result);
                                        echo $count;
                                        ?>
                                    </h3>

                                    <p>Received</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-download"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->
                    <div class="row ">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Priority Orders</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Member ID</th>
                                                <th>Name</th>

                                                <th>Time Stamp</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$query = "SELECT * FROM `members` WHERE `status` = 0 AND `time_registered` <= DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
$result = mysqli_query(getDatabase(), $query);

// Log the SQL query for debugging

// Check if there are any pending orders
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
         <tr id="<?php echo $row['member_id']; ?>">
             <td>
                 <?php echo $row['member_id']; ?>
             </td>
             <td>
                 <?php echo $row['name']; ?>
             </td>
             <td>
                 <?php echo $row['time_registered']; ?>
             </td>

             <td>
                 <?php
                     $status = $row['status'];
                 if ($status == 0) {
                    $link_class = 'btn btn-warning  user-select-none';
                    $link_text = 'PENDING';
                 }
                 ?>
                 <span class="badge <?php echo $link_class; ?>"><?php echo $link_text; ?></span>
             </td>
         </tr>
         <?php
    }
} else {
    // Display a message if there are no pending orders
    echo '<tr><td colspan="4">No pending orders</td></tr>';
}
?>


                                        </tbody>

                                    </table>
                                </div>
                                <div class="card-footer row clearfix">
                                    <a href="../pages/members_north-campus.php" class="btn col-md-6 btn-sm btn-secondary btn-block mb-2">NORTH</a>
                                    <div class="col-md-6 mt-2 mt-md-0">
                                    <a href="../pages/members_main-campus.php" class="btn btn-sm  btn-block btn-secondary mb-2">SOUTH</a>
</div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>


                        <div class="col-6">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Recently Added Inquiry ID</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Member ID</th>
                                                <th>Name</th>

                                                <th>Time Stamp</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$query = "SELECT * FROM `members` WHERE `cid` = 1 ";
$result = mysqli_query(getDatabase(), $query);

// Log the SQL query for debugging

// Check if there are any pending orders
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
                                            <tr id="<?php echo $row['member_id']; ?>">
                                                <td>
                                                    <?php echo $row['member_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['time_registered']; ?>
                                                </td>

                                            </tr>
                                            <?php
    }
} else {
    // Display a message if there are no pending orders
    echo '<tr><td colspan="4">No pending orders</td></tr>';
}
?>


                                        </tbody>

                                    </table>

                                </div>
                                <div class="card-footer clearfix">

                                    <a href="javascript:void(0)"
                                        class="btn btn-sm btn-secondary btn-block float-right">View All
                                        Orders</a>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->




                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Alumni Id Inquiries</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0  ">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>

                                                <th>Inquiry Message</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$query = "SELECT * FROM `inquire` WHERE `i_status` = 0";
$result = mysqli_query(getDatabase(), $query);

// Log the SQL query for debugging

while ($row = mysqli_fetch_array($result)) {
    ?>
                                            <tr id="I<?php echo $row['id']; ?>">
                                                <td>
                                                    I-<?php echo $row['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['i_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['i_message']; ?>
                                                </td>
                                                <td>
                                                    <?php
            // Use an if statement to check the value of i_status
            if ($row['i_status'] == '0') {
                echo '<span class="badge badge-warning">Pending</span>';
            }
            ?>
                                                </td>
                                            </tr>
                                            <?php
}
?>

                                        </tbody>
                                    </table>

                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">

                                        <a href="./manage-client_inquiries.php"
                                            class="btn btn-sm btn-secondary btn-block float-right">View All
                                            Inquiries</a>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>
                                <!-- /.card -->
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.content -->


                    <?php include 'includes/admin_footer.php'; ?>
                </div>

            </section>
            <!-- ./wrapper -->

</body>

</html>