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
<style>
.modal-lg {
    max-width: 80%;
    /* You can adjust the percentage according to your needs */
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Client Questions</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Manage Client</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Client Questions</li>
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
                                    <table id="manageClient_inquiriesTable" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Inquiry Message</th>
                                                <th>Status</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM `inquire` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row['id']; ?>">
                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['i_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['i_email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['i_message']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($row['i_status'] == 1) {
                                                            echo '<span class="badge badge-success">Success</span>';
                                                        } else {
                                                            echo '<span class="badge badge-warning">Pending</span>';
                                                        }
                                                        ?>
                                                </td>

                                                <td class="text-center" style="width: 150px;">

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#reviewInquiry_modal"
                                                        data-id="<?php echo $row['id']; ?>"
                                                        data-role="editAnnouncement_btn">
                                                        Review
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

    <!-- Modal -->
    <div class="modal fade" id="reviewInquiry_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Compose New Message</h3>
                                </div>
                                <!-- /.card-header -->
                                <form id="editAnnouncementForm">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="message1">Subject for Email</label>
                                            <input class="form-control" id="subject" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="message1">Email</label>
                                            <input class="form-control" id="id" name="id" hidden>
                                            <input class="form-control" id="i_email" name="i_email" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="message1">Sender Name</label>
                                            <input class="form-control " id="i_name" name="i_name" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="message1">Message Inquiry</label>
                                            <textarea class="form-control" id="i_message" name="i_message" rows="5"
                                                readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="message1">Reply to Inquiry</label>
                                            <textarea class="form-control" id="r_message" name="r_message"
                                                rows="5"></textarea>
                                        </div>
                                        </textarea>
                                    </div>

                                    <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Send</button>
                    </div>
                    </form>
                </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>

        </div>
    </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#manageClient_inquiriesTable').DataTable({
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
                }, {
                    text: '<i class="fa-solid fa-print"></i>',
                    className: 'print-btn',
                    action: function(e, dt, node, config) {
                        location.href = "../server/print_member.php";
                    }
                }
            ],
            dom: 'Bfrtip',
            responsive: true
        });
    });

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

            $('#reviewInquiry_modal').modal('hide');
            if (result.isConfirmed) {
                let timerInterval
                Swal.fire({
                    title: 'Wait for a while!',
                    html: 'I will send in <b></b> milliseconds.',
                    timer: 2500,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()      
                        }, 100) 
                        $.ajax({
                            url: "../server/edit_inquiries.php",
                            type: "POST",
                            data: new FormData(this),
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response_editAnnouncement) {
                                if (response_editAnnouncement.status) {
                                    toastr.success(response_editAnnouncement
                                        .message, '', {
                                            timeOut: 1000,
                                            closeButton: false,
                                            onHidden: function() {
                                                location.reload();
                                            }
                                        });
                                    systemChanges(response_editAnnouncement
                                        .admin,
                                        response_editAnnouncement.operation,
                                        response_editAnnouncement
                                        .description);

                                        Swal.close();
                                } else {
                                    toastr.error(response_editAnnouncement
                                        .message, '', {
                                            closeButton: false,
                                        });
                                }
                            },
                            error: function(error) {
                                toastr.error('An Error occurred: ' + error,
                                '', {
                                    positionClass: 'toast-top-end',
                                    closeButton: false
                                });
                            }
                        });
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        
                    }
                })

            } else if (result.isDenied) {
                toastr.info('Changes are not saved', '', {
                    closeButton: false
                });
            }
        });
    });

    // Edit Announcement: Populate Fields
    $(document).on('click', 'button[data-role=editAnnouncement_btn]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_inquiry.php",
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response_editAnnouncement) {
                $('#id').val(response_editAnnouncement.id); // Corrected property name
                $('#i_name').val(response_editAnnouncement.i_name); // Corrected property name
                $('#i_email').val(response_editAnnouncement.i_email); // Corrected property name
                $('#i_message').val(response_editAnnouncement.i_message); // Corrected property name
            }
        });
    });
    </script>
</body>

</html>