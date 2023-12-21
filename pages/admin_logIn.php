<?php
include '../config/config.php';

$query = "SELECT * FROM `settings` where id=2";
$result = mysqli_query(getDatabase(), $query);
while ($row = mysqli_fetch_array($result)) {



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCC | Alumni Management System</title>
    <link rel="icon" href="../assets/images/logo/<?php echo $row['sLogo']; ?> "/>
    <script src="../assets/js/system_changes.js?v=<?php echo time(); ?>" defer></script>

    <?php include 'import.php'; ?>
</head>

<body class="hold-transition login-page">

    <div class="login-box">

        <div class="card card-outline card-success">
            <div class="card-header text-center">
            <h2><img src="../assets/images/logo/<?php echo $row['sLogo']; ?>" style="width: 50px; height: 50px;"> UCC's Alumni Management System</h2>            </div>
            <div class="card-body">
                <p class="login-box-msg text-secondary">Sign in to start your session.</p>

                <form id="admin_logInForm" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">

                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Sign In</button>
                        </div>
                    </div>
                    <?php } ?>
                </form>

                <!-- <p class="mb-0">
                    <a href="register.php" class="text-center text-decoration-none">Register a new membership</a>
                </p> -->
            </div>

        </div>
    </div>

    <script>
    $('#admin_logInForm').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: '../server/admin_validation.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message, '', {
                        positionClass: 'toast-top-right',
                        timeOut: 1500,
                        closeButton: false
                    });
                    // Check if a redirect path is provided in the response
                    if (response.redirect) {
                        setTimeout(function() {
                            location.replace(response.redirect);
                        }, 1500);
                    } else {
                        console.error("No redirect path provided in the response.");
                    }

                    systemChanges(response.admin, response.operation, response.description);
                } else {
                    toastr.error(response.message, '', {
                        positionClass: 'toast-top-right',
                        closeButton: false
                    });
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
    </script>
</body>

</html>