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
    <script src="../assets/js/system_changes.js?v=<?php echo time(); ?>" defer></script>

    <?php include 'import.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sales Report</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-secondary">Sales Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-body">
              
                    <form method="POST"  id="pdf-form" class="mb-3">
                        <div class="form-row">
                            <div class="col-auto">
                                    <select class="form-control " name="selected_month" onchange="this.form.submit()">
                                            <option value="">-- Select Month --</option>
                                            <?php
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $currentYear = date('Y'); // Get the current year
                                                    $date = new DateTime("$currentYear-$i-01");
                                                    $monthName = $date->format("F");
                                                    $selected = ($selected_month == $i) ? "selected" : "";
                                                    echo "<option value='$i' $selected>$monthName $currentYear</option>";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <button id="generate-pdf-btn" type="button" class="btn btn-primary" data-selected-month="<?php echo $selected_month; ?>" data-selected-year="<?php echo date('Y'); ?>">Generate PDF</button>


                               
                            </div>
                           
                        </div>
                    </form>
                    <?php
                // Connect to your MySQL database
                $conn = mysqli_connect("localhost","root","","u907822938_alumnidb") or die("DI GUMANA");
             
        
                $selected_month = $_POST["selected_month"] ?? null;
                $count = 1;
                // Construct the SQL query
                if ($selected_month) {
                    $sql = "SELECT *, IF(status = 0, 'Pending', '') as status_text FROM members WHERE DATE_FORMAT(time_registered, '%c') = $selected_month AND status = 2 ORDER BY time_registered";
                } else {
                    $sql = "SELECT * FROM members WHERE status = 2 ORDER BY time_registered";
                }
                $result = mysqli_query($conn, $sql);

                // Check if the query returned any results
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered table-hover" style="100%">
                            <thead>
                                <tr class="table-primary text-center">
                                <th>NO</th>
                                    <th>Member Id</th>
                                    <th>Member Count</th>
                                    <th>Year Graduated</th>
                                    <th>Campus</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Time Registered</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop through the results and display them in the table
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <td>".$count."</td>
                                    <td>".$row["member_id"]."</td>
                                    <td>".$row["member_count"]."</td>
                                    <td>".$row["year"]."</td>
                                    <td>".$row["campus_id"].
                                    "</td><td>".$row["address"].
                                    "</td><td>".$row["email_address"].
                                    "</td><td>".$row["time_registered"].
                                    "</td></tr>
                                    ";
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        No results found.
                    </div>
                    <?php
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                </div>
            </div>
        </div>
    </div>

            </section>
        </div>
    </div>

    <?php include 'includes/admin_footer.php'; ?>

    <script>
        $(document).ready(function() {
            $('#salesReportTable').DataTable({
                buttons: [{
                        extend: 'copy',
                        text: '<i class="fas fa-copy"></i> Copy'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Excel'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i> Columns'
                    }
                ],
                dom: 'Bfrtip',
                responsive: true
            });
        });
    </script>
     <script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable({

            searchable: true,
            dom: 'Blfrtip',
            buttons: [
                 'excel'
            ]

        });
    selectedMonth.addEventListener('change', function () {
        form.submit();
    });

});
    </script>
 <script>
$(document).ready(function() {
  $('#generate-pdf-btn').click(function() {
   
    Swal.fire({
      title: 'Are you sure?',
      text: `This will generate a PDF report .`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, generate PDF!'
    }).then((result) => {

        
      if (result.isConfirmed) {
        window.location.href = "../server/make_pdf.php?selected_month=<?php echo $selected_month; ?>";
        systemChanges(response_Editmember.admin, response_Editmember.operation, response_Editmember.description);

      }
    });
  });
});
</script>
</body>

</html>