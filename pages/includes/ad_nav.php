
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

<link rel="icon" href="../assets/images/logo/<?php echo $row['sLogo']; ?> "/>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
       

        <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard.php" class="nav-link">Welcome to <?php echo $row['sName']; ?></a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link text-decoration-none">
        <i class="fas fa-solid fa-address-card fa-lg ml-3 mr-2"></i>
        <span class="brand-text font-weight-bold"><?php echo $row['sAlias']; ?></span>
    </a>
    <?php } ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="admin_db.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                        <span class="right badge badge-warning">!</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-tv nav-icon"></i>
                        <p>
                            Manage Client Page
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pages/manage-client_announcements.php" class="nav-link">
                                <i class="fa-solid fa-bullhorn nav-icon"></i>
                                <p>Announcements</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../pages/manage-client_projects.php" class="nav-link">
                                <i class="fa-solid fa-paintbrush nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="../pages/manage-client_inquiries.php" class="nav-link">
                                <i class="fa-solid fa-circle-question nav-icon"></i>
                                <p>Inquiries</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Member Registration</li>
                <li class="nav-item">
                    <a href="register_main-campus.php" class="nav-link">
                        <i class="fas nav-icon fa-solid fa-user-plus ml-1" style="color: #20b503; font-size: 15px;"></i>
                        <p>Main Campus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="register_north-campus.php" class="nav-link">
                        <i class="fas nav-icon fa-solid fa-user-plus ml-1" style="color: #e06c00; font-size: 15px;"></i>
                        <p>North Campus</p>
                    </a>
                </li>

                <li class="nav-header">Alumni Members</li>
                <li class="nav-item">
                    <a href="members_main-campus.php" class="nav-link">
                        <i class="fas fa-building nav-icon" style="color: #20b503;"></i>
                        <p>Main Campus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="members_north-campus.php" class="nav-link">
                        <i class="fas fa-solid fa-building nav-icon" style="color: #e06c00;"></i>
                        <p>North Campus</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="Idgenerator.php" class="nav-link">
                    <i class="fa-solid fa-id-card nav-icon" style="color: #d9c80d;"></i>
                        <p>Id Generator</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="id_inquiries.php" class="nav-link">
                        <i class="fa-solid fa-id-card nav-icon"></i>
                        <p>Alumni ID Inquiries</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="lost_id.php" class="nav-link">
                    <i class="fa-solid fa-rotate-right nav-icon"></i>
                        <p>Lost Alumni ID Inquiries</p>
                    </a>
                </li>
                
                
                <li class="nav-header">System </li>
                <li class="nav-item">
                    <a href="settings.php" class="nav-link">
                        <i class="fa-solid fa-gears nav-icon"></i>
                        <p>Settings</p>
                    </a>
                </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom border-0">
        <a href="#" class="btn btn-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"><i class="fas fa-cogs"></i></a>
        <a href="#" class="btn btn-primary hide-on-collapse pos-right"><?php echo $db_adminFullName; ?></a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <button type="button" class="dropdown-item">Profile</button>
            <a type="button" class="dropdown-item" href="../server/admin_logout.php">Log-out</a>
        </div>
        <!-- /.sidebar-custom -->
    </div>

</aside>