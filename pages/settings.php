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
    <script src="../assets/js/register_campus.js?v=<?php echo time(); ?>"></script>
    <script src="../assets/js/submit_member-details.js?v=<?php echo time(); ?>" defer></script>
    <script src="../assets/js/system_changes.js?v=<?php echo time(); ?>" defer></script>

    <?php include 'import.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">



        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>System Settings</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-secondary">Settings</li>
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

                                <div class="card-body p-4">
                                  <form id="registersettingForm" enctype="multipart/form-data">
                                        <?php
                                       $query = "SELECT * FROM `settings` where id=2";
                                       $result = mysqli_query(getDatabase(), $query);
                                       while ($row = mysqli_fetch_array($result)) {

                                       ?>

                                        <h5>Basic Information</h5>
                                        <input type="text" class="form-control form-control-border" id="id"
                                        name="id"  hidden>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_name">System Name</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_name" name="system_name" placeholder="System Name"
                                                    value="<?php echo $row['sName']; ?>">
                                            </div>
                                            <div class="col form-group">
                                                <label for="system_alias">System Alias</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_alias" name="system_alias" placeholder="System Alias"
                                                    value="<?php echo $row['sAlias']; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_description">System Description</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_description" name="system_description"
                                                    placeholder="System Description"
                                                    value="<?php echo $row['sDescription']; ?>">
                                            </div>

                                            <div class="col form-group">

                                            <label for="system_logo">System Logo</label>
                                             <?php if (!empty($row['sLogo'])) : ?>
                                             <?php $imagePath = '../assets/images/logo/' . $row['sLogo']; ?>
                                             <img src="<?= $imagePath ?>" alt="System Logo" style="max-width: 30px; height: auto;" id="systemlogopreview">
                                             <?php endif; ?>
                                             <input type="file" class="form-control form-control-border" id="systemlogo" name="systemlogo" accept="image/*">
                                             <input type="hidden" class="img-fluid" value="<?= $row['sLogo']; ?>">
                                            </div>
                                        </div>

                                        <h5>Useful links:</h5>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_links">Links</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_links" name="system_links" placeholder="System Links"  value="<?php echo $row['sLinks']; ?>">
                                            </div>
                                        </div>

                                        <h5>Contacts:</h5>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_address">Address</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_address" name="system_address" placeholder="System Address"
                                                    value="<?php echo $row['sAddress']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_email">Email</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_email" name="system_email" placeholder="System Email"
                                                    value="<?php echo $row['sEmail']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_email">Contact No.</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_contact" name="system_contact"
                                                    placeholder="System Contact" value="<?php echo $row['sContact']; ?>">
                                            </div>
                                        </div>

                                        <h5>Alumni description:</h5>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_uccMain">UCC Main description</label>
                                          
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_uccMain" name="system_uccMain" placeholder="Add Map"
                                                    value="<?php echo $row['sMain']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="system_uccNorth">UCC North description</label>
                                                <input type="text" class="form-control form-control-border"
                                                    id="system_uccNorth" name="system_uccNorth" placeholder="Add Map"
                                                    value="<?php echo $row['sNorth']; ?>">
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col">
                                            <button type="submit" class="btn btn-primary btn-block col-md-6">Save</button>
                                            </div>
                                           
                                        </div>
                                        <?php } ?>
                                      </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
               </section>

        </div>
        <?php include 'includes/admin_footer.php'; ?>
    </div>


    <script>
    // Edit Announcement: Submit Fields
    $('#registersettingForm').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../server/add_settings.php",
                    type: "POST",
                    data: new FormData(this),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response_editsettings) {
                        if (response_editsettings.status) {
                            toastr.success(response_editsettings.message, '', {
                                timeOut: 1000,
                                closeButton: false,
                                onHidden: function() {
                                    location.reload();
                                }
                            });
                            systemChanges(response_editsettings.admin,
                                response_editsettings.operation,
                                response_editsettings.description);
                        } else {
                            toastr.error(response_editsettings.message, '', {
                                closeButton: false,
                            });
                        }
                    },
                    error: function(error) {
                        toastr.error('An Error occurred: ' + error, '', {
                            positionClass: 'toast-top-end',
                            closeButton: false
                        });
                    }
                });
            } else if (result.isDenied) {
                toastr.info('Changes are not saved', '', {
                    closeButton: false
                });
            }
        });
    });

    const fileInput = $("#systemlogo");
            const imagePreview = $("#systemlogopreview");
            fileInput.on("change", function() {
                if (fileInput[0].files.length > 0) {
                    const selectedFile = fileInput[0].files[0];
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.attr("src", e.target.result);
                        imagePreview.show();
                    };
                    reader.readAsDataURL(selectedFile);
                } else {
                    imagePreview.hide();
                }
                $('#selectedFileName').text(fileInput.val().split("\\").pop()); // Extract the file name
            });
</script>

</body>

</html>