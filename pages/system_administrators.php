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
                            <h1>System Administrators</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-secondary">System Administrators</li>
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
                                    <table id="member_main" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Fullname</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM `admin` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr id="<?php echo $row['admin_username']; ?>">
                                                    <td>
                                                        <?php echo $row['admin_username']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['admin_fullname']; ?>
                                                    </td>

                                                    <td class="text-center">

                                                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#viewSystemAdministrators_modal" data-id="<?php echo $row['admin_username']; ?>" data-role="readSystemAdministrator_btn">
                                                            <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#editSystemAdministrators_modal" data-id="<?php echo $row['admin_username']; ?>" data-role="editSystemAdministrator_btn">
                                                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-id="<?php echo $row['admin_username']; ?>" data-role="deleteSystemAdministrator_btn">
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

    </div>

    <?php include 'includes/admin_footer.php'; ?>

    <!--- Add Administrator Form ----->
    <div class="modal fade" id="addSystemAdministrators_modal" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="addAdministratorsForm">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row py-1">
                            <div class="col">
                                <label for="add_adminUsername">Username</label>
                                <input type="text" class="form-control form-control-border" id="add_adminUsername" name="add_adminUsername" placeholder="Username">
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col">
                                <label for="add_adminPassword">Password</label>
                                <input type="password" class="form-control form-control-border" id="add_adminPassword" name="add_adminPassword" placeholder="Password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="add_adminFullName">Fullname</label>
                                <input type="text" class="form-control form-control-border" id="add_adminFullName" name="add_adminFullName" placeholder="Fullname">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="add_adminFullName">Admin Role</label>
                                <select class="form-control" id="admin" name="admin">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                   
                                </select>               
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- View System Administrator Modal -->
    <div class="modal fade" id="viewSystemAdministrators_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="viewAdministratorsForm">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">View Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row py-1">
                            <div class="col">
                                <label for="view_adminUsername">Username</label>
                                <input type="text" class="form-control form-control-border" id="view_adminUsername" name="view_adminUsername" readonly>
                            </div>
                        </div>

                        <!-- <div class="row py-1">
                                <div class="col">
                                    <label for="view_adminPassword">Password</label>
                                    <input type="text" class="form-control form-control-border" id="view_adminPassword"
                                        name="view_adminPassword" readonly>
                                </div>
                            </div> -->

                        <div class="row">
                            <div class="col">
                                <label for="view_adminFullName">Fullname</label>
                                <input type="text" class="form-control form-control-border" id="view_adminFullName" name="view_adminFullName" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="add_adminFullName">Admin Role</label>
                                <select class="form-control" id="view_admin" name="view_admin">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                   
                                </select>               
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!---Edit Administrator Modal----->
    <div class="modal fade" id="editSystemAdministrators_modal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="editAdministratorsForm">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Administrator</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row py-1">
                            <div class="col">
                                <label for="edit_adminUsername">Username</label>
                                <input type="text" class="form-control form-control-border" id="edit_adminUsername" name="edit_adminUsername" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="edit_adminFullName">Fullname</label>
                                <input type="text" class="form-control form-control-border" id="edit_adminFullName" name="edit_adminFullName">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="add_adminFullName">Admin Role</label>
                                <select class="form-control" id="edit_admin" name="edit_admin">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                </select>               
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#member_main').DataTable({
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
                        text: '<i class="fa-solid fa-user-plus"></i>',
                        className: 'add-btn',
                        action: function(e, dt, node, config) {
                            $('#addSystemAdministrators_modal').modal('show');
                        }
                    }
                ],
                dom: 'Bfrtip',
                responsive: true
            });
        });

        // Add Admin: Submit Fields
        $('#addAdministratorsForm').on('submit', function(e) {
            e.preventDefault();
            if ($('#addAdministratorsForm').valid()) {
                $.ajax({
                    type: 'POST',
                    url: '../server/add_admin.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response_addAdmin) {
                        $('#addSystemAdministrators_modal').modal('hide');
                        if (response_addAdmin.status) {
                            toastr.success(response_addAdmin.message, '', {
                                positionClass: 'toast-top-right',
                                timeOut: 1000,
                                closeButton: false,
                                onHidden: function() {
                                    location.reload();
                                }
                            });
                            systemChanges(response_addAdmin.admin, response_addAdmin.operation, response_addAdmin.description);
                        } else {
                            toastr.error(response_addAdmin.message, '', {
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
            } else {
                validate_form.focusInvalid();
            }
        })

        // Edit Admin: Submit Fields
        $('#editAdministratorsForm').on('submit', function(e) {
            e.preventDefault();
            if ($('#editAdministratorsForm').valid()) {
                Swal.fire({
                    title: 'Do you want to save the changes?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    $('#editSystemAdministrators_modal').modal('hide');
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "../server/edit_admin.php",
                            type: "POST",
                            dataType: "json",
                            data: $(this).serialize(),
                            success: function(response_editAdmin) {
                                if (response_editAdmin.status) {
                                    toastr.success(response_editAdmin.message, '', {
                                        timeOut: 1000,
                                        closeButton: false,
                                        onHidden: function() {
                                            location.reload();
                                        }
                                    });

                                    systemChanges(response_editAdmin.admin, response_editAdmin.operation, response_editAdmin.description);
                                } else {
                                    toastr.error(response_editAdmin.message, '', {
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
            } else {
                validate_form.focusInvalid();
            }
        });

        // View Admin: Populate fields
        $(document).on('click', 'button[data-role=readSystemAdministrator_btn]', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../server/read_admin.php",
                data: {
                    admin_username: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response_viewAdmin) {
                    $('#view_adminUsername').val(response_viewAdmin.admin_username);
                    // $('#view_adminPassword').val(response_viewAdmin.admin_password);
                    $('#view_adminFullName').val(response_viewAdmin.admin_fullname);
                    $('#view_admin').val(response_viewAdmin.admin);
             
                    
                },
                error: function(error) {
                    toastr.error('Error occurred: ' + error, '', {
                        positionClass: 'toast-top-end',
                        closeButton: false
                    });
                }
            })
        })

        // Edit Admin: Populate fields
        $(document).on('click', 'button[data-role=editSystemAdministrator_btn]', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../server/read_admin.php",
                data: {
                    admin_username: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response_editAdmin) {
                    $('#edit_adminUsername').val(response_editAdmin.admin_username);
                    $('#edit_adminFullName').val(response_editAdmin.admin_fullname);
                    $('#edit_admin').val(response_editAdmin.admin);
               
                }
            })
        })

        // Delete Admin: Delete Fields
        $(document).on('click', 'button[data-role=deleteSystemAdministrator_btn]', function(e) {
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
                        url: "../server/delete_admin.php",
                        data: {
                            admin_username: $(this).attr('data-id'),
                        },
                        dataType: "json",
                        success: function(response_deleteAdmin) {
                            if (response_deleteAdmin.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response_deleteAdmin.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then(() => {
                                    location.reload();
                                });

                                systemChanges(response_deleteAdmin.admin, response_deleteAdmin.operation, response_deleteAdmin.description)
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: response_deleteAdmin.message,
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

        jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
        }, "Please enter alphabetic characters only.");
        var validate_form = $('#editAdministratorsForm').validate({
            rules: {
                edit_adminUsername: {
                    required: true,
                    alphabeticWithSpace: true,
                    minlength: 4,
                },
                edit_adminFullName: {
                    required: true,
                    alphabeticWithSpace: true,
                    minlength: 5,
                },
            },

            messages: {
                edit_adminUsername: {
                    required: 'Please provide a valid username!',
                },
                edit_adminFullName: {
                    required: 'Please provide a valid fullname!',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);

            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            }

        });
        jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
        }, "Please enter alphabetic characters only.");
        var validate_form = $('#addAdministratorsForm').validate({
            rules: {
                add_adminUsername: {
                    required: true,
                    alphabeticWithSpace: true,
                    minlength: 4,
                },
                add_adminPassword: {
                    required: true,
                },
                add_adminFullName: {
                    required: true,
                    alphabeticWithSpace: true,
                    minlength: 5,
                },
            },

            messages: {
                add_adminUsername: {
                    required: 'Please provide a valid username!',
                },
                add_adminPassword: {
                    required: 'Please enter a valid password!',

                },
                add_adminFullName: {
                    required: 'Please provide a valid fullname!',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);

            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            }

        });
    </script>
</body>

</html>