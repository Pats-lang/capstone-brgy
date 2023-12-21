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
    <script src="../config/config.js?v=<?php echo time(); ?>"></script>
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
                            <h1>History</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Manage Client</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">History</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">

                            <!-- card -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <table id="manageClient_directorsTable" class="table responsive">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Image</th>
                                                <th>Mission</th>
                                                <th>Vission</th>
                                               
                                                <th class="text-center align-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM `history` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr id="<?php echo $row['id']; ?>">
                                                    <td>
                                                        <img src="../assets/images/history/<?php echo $row['img']; ?>" alt="Member Picture" width="200">
                                                    </td>
                                                    <td>
                                                        <?php echo $row['mission']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['vission']; ?>
                                                    </td>
                                                   

                                                    <td class="text-center">

                                                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#viewAnnouncement_modal" data-id="<?php echo $row['id']; ?>" data-role="viewAnnouncement_btn">
                                                            <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#editAnnouncement_modal" data-id="<?php echo $row['id']; ?>" data-role="editAnnouncement_btn">
                                                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-id="<?php echo $row['id']; ?>" data-role="deleteAnnouncement_btn">
                                                            <i class="fa-solid fa-trash fa-xl" style="color: red;"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>

        <?php include 'includes/admin_footer.php'; ?>

    </div>

    <!-- Add Announcements Modal -->
    <div class="modal fade" id="addAnnouncement_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addAnnouncementForm" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add History</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row py-1">
                            <div class="col">
                                <label for="add_ImageAnnouncements">Image </label>
                                <img alt="Member Picture" id="addPreview_ImageAnnouncements" class="w-100">
                                <input type="file" class="form-control form-control-border" id="add_ImageAnnouncements" name="add_ImageAnnouncements">
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="add_titleAnnouncements">Title</label>
                                <input type="text" class="form-control form-control-border" id="add_titleAnnouncements" name="add_titleAnnouncements" placeholder="Title">
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="add_descriptionAnnouncements">Description</label>
                                <textarea class="form-control form-control-border" id="add_descriptionAnnouncements" name="add_descriptionAnnouncements" style="height: 125px; resize: none;" placeholder="Description"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="add_lastModifiedAnnouncements">Last Modified</label>
                                <input type="text" class="form-control form-control-border" id="add_lastModifiedAnnouncements" name="add_lastModifiedAnnouncements" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-block bg-gradient-primary text-white">Add</button>
                    </div>

                </form>
            </div>


        </div>
    </div>

    <!-- View Announcements Modal -->
    <div class="modal fade" id="viewAnnouncement_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="viewAnnouncementForm">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5">View History</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row py-1">
                            <div class="col">
                                <img alt="Member Picture" id="view_ImageAnnouncements" class="w-100">
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="view_titleAnnouncements">Title</label>
                                <textarea class="form-control form-control-border" id="view_titleAnnouncements" name="view_titleAnnouncements"  style="height: 125px; resize: none;" placeholder="Description" readonly></textarea>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="view_descriptionAnnouncements">Description</label>
                                <textarea class="form-control form-control-border" id="view_descriptionAnnouncements" name="view_descriptionAnnouncements" style="height: 125px; resize: none;" placeholder="Description" readonly></textarea>
                            </div>
                        </div>

                      
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-block bg-gradient-secondary text-white">Close</button>
                    </div>

                </form>
            </div>


        </div>
    </div>

    <!-- Edit Announcements Modal -->
    <div class="modal fade" id="editAnnouncement_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editAnnouncementForm" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Announcement</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control form-control-border" id="edit_IdAnnouncements" name="edit_IdAnnouncements" readonly hidden>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="editPreview_ImageAnnouncements">Image Preview:
                                    <span id="selectedFileName" class="text-muted font-weight-normal font-italic"></span>
                                </label>
                                <img alt="Member Picture" id="editPreview_ImageAnnouncements" class="w-100">
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="edit_ImageAnnouncements">Change Image?</label>
                                <input type="file" class="form-control form-control-border" id="edit_ImageAnnouncements" name="edit_ImageAnnouncements">
                            </div>
                        </div>


                        <div class="row py-1">
                            <div class="col">
                                <label for="edit_titleAnnouncements">Mission</label>
                                <textarea class="form-control form-control-border" id="edit_titleAnnouncements" name="edit_titleAnnouncements" style="height: 125px; resize: none;" placeholder="Mission"></textarea>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="edit_descriptionAnnouncements">Vission</label>
                                <textarea class="form-control form-control-border" id="edit_descriptionAnnouncements" name="edit_descriptionAnnouncements" style="height: 125px; resize: none;" placeholder="Vission"></textarea>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-block bg-gradient-success text-white">Update</button>
                    </div>

                </form>
            </div>


        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#manageClient_directorsTable').DataTable({
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
                        text: 'Add History',
                        className: 'add-btn',
                        action: function(e, dt, node, config) {
                            $('#add_lastModifiedAnnouncements').val(getLatestTime());
                            $('#addAnnouncement_modal').modal('show');

                            const fileInput = $("#add_ImageAnnouncements");
                            const imagePreview = $("#addPreview_ImageAnnouncements");
                            imagePreview.hide();
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
                            });

                        }
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

           // Add Announcement: Submit Fields
           $('#addAnnouncementForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '../server/add_history.php',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response_addAnnouncement) {
                    $('#addSystemAdministrators_modal').modal('hide');
                    if (response_addAnnouncement.status) {
                        toastr.success(response_addAnnouncement.message, '', {
                            positionClass: 'toast-top-right',
                            timeOut: 1000,
                            closeButton: false,
                            onHidden: function() {
                                location.reload();
                            }
                        });
                        systemChanges(response_addAnnouncement.admin, response_addAnnouncement.operation, response_addAnnouncement.description);
                    } else {
                        toastr.error(response_addAnnouncement.message, '', {
                            positionClass: 'toast-top-right',
                            closeButton: false
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
        })

   // Edit Announcement: Submit Fields
   $('#editAnnouncementForm').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                $('#editAnnouncement_modal').modal('hide');
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../server/edit_history.php",
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response_editAnnouncement) {
                            if (response_editAnnouncement.status) {
                                toastr.success(response_editAnnouncement.message, '', {
                                    timeOut: 1000,
                                    closeButton: false,
                                    onHidden: function() {
                                        location.reload();
                                    }
                                });
                                systemChanges(response_editAnnouncement.admin, response_editAnnouncement.operation, response_editAnnouncement.description);
                            } else {
                                toastr.error(response_editAnnouncement.message, '', {
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

        // View Announcement: Populate Fields 
        $(document).on('click', 'button[data-role=viewAnnouncement_btn]', function() {
            $.ajax({
                type: "POST",
                url: "../server/read_history.php",
                data: {
                    id: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response_viewAnnouncement) {
                    $('#view_ImageAnnouncements').attr('src', '../assets/images/history/' + response_viewAnnouncement.img);
                    $('#view_titleAnnouncements').val(response_viewAnnouncement.mission);
                    $('#view_descriptionAnnouncements').val(response_viewAnnouncement.vission);
                 
                }
            })

        });

        // Edit Announcement: Populate Fields
        $(document).on('click', 'button[data-role=editAnnouncement_btn]', function() {
            $.ajax({
                type: "POST",
                url: "../server/read_history.php",
                data: {
                    id: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response_editAnnouncement) {
                    $('#editPreview_ImageAnnouncements').attr('src', '../assets/images/history/' + response_editAnnouncement.img);
                    $('#edit_IdAnnouncements').val(response_editAnnouncement.id);
                    $('#edit_titleAnnouncements').val(response_editAnnouncement.mission);
                    $('#edit_descriptionAnnouncements').val(response_editAnnouncement.vission);
                    $('#edit_lastModifiedAnnouncements').val(getLatestTime());

                    const selectedFileName = response_editAnnouncement.img;
                    if (selectedFileName) {
                        $('#selectedFileName').text(selectedFileName);
                    }
                }
            });

            const fileInput = $("#edit_ImageAnnouncements");
            const imagePreview = $("#editPreview_ImageAnnouncements");
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
        });


     
        // Delete Announcement: Delete Fields
        $(document).on('click', 'button[data-role=deleteAnnouncement_btn]', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../server/delete_history.php",
                        data: {
                            id: $(this).attr('data-id'),
                        },
                        dataType: "json",
                        success: function(response_deleteAnnouncement) {
                            if (response_deleteAnnouncement.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response_deleteAnnouncement.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then(() => {
                                    location.reload();
                                });

                                systemChanges(response_deleteAnnouncement.admin, response_deleteAnnouncement.operation, response_deleteAnnouncement.description);

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: response_deleteAnnouncement.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        },
                        error: function(error) {
                            toastr.error('Error occurred: ' + error, '', {
                                positionClass: 'toast-top-end',
                                closeButton: false
                            });
                        }
                    });
                }
            })
        });
    </script>
</body>

</html>