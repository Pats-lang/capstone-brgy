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
                            <h1>Lost ID Inquiries</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Alumni Members</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Lost Id Inquiries</li>
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
                                                <th>Member_ID</th>
                                                <th>Name</th>
                                                <th>Campus</th>
                                                <th>Birthday</th>
                                                <th>Reason</th>
                                                <th>Status</th>
                                                
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM `lost` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row['lost_id']; ?>">
                                                <td>
                                                <?php echo $row['lost_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['member_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['campus']; ?>
                                                </td>
                                             
                                                <td>
                                                    <?php echo $row['bday']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['reason']; ?>
                                                </td>
                                               
                                                <td>
                                                    <?php
                                                        if ($row['status'] == 2) {
                                                            echo '<span class="badge badge-success">Success</span>';
                                                        } else {
                                                            echo '<span class="badge badge-warning">Pending</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <td class="text-center" style="width: 150px;">

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#reviewInquiry_modal"
                                                        data-id="<?php echo $row['lost_id']; ?>"
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

<!-- Modal -->
<div class="modal fade" id="reviewInquiry_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lost ID Form Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                  
                        <form id="lost-form">
                        <input class="form-control" id="lost_id" name="lost_id" hidden>
                            <div class="form-group">
                                <label for="alumniId">Alumni ID</label>
                                <input type="text" class="form-control" id="alumniId" name="alumniID" placeholder="Enter Alumni ID" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"readonly>
                            </div>
                    
                            <div class="form-group">
                                <label for="campus">Campus</label>
                                <select class="form-control" id="campus" name="campus"readonly>
                                    <option>Main</option>
                                    <option>North</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"readonly>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday"readonly>
                            </div>
                            <div class="form-group">
                                <label for="reason">Reason for Losing ID</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason"readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment of Affidavit of Lost</label>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editPreview_ImageAnnouncements">Image Preview:
                                            <span id="selectedFileName" class="text-muted font-weight-normal font-italic"></span>
                                        </label>
                                        <img alt="Member Picture" id="editPreview_ImageAnnouncements" class="w-100">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_lost">Change Image?</label>
                                        <input type="file" class="form-control form-control-border" id="edit_lost" name="edit_lost"readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="status" class="mt-4" >Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="2">Done</option>
                                    <option value="1">Pending</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                <button type="submit" id="lostbtn" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    <?php include 'includes/admin_footer.php'; ?>

                            
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
    $('#lost-form').on('submit', function(e) {
      
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
                            url: "../server/edi_lost.php",
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
            url: "../server/read_lost.php",
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response_editAnnouncement) {
                $('#lost_id').val(response_editAnnouncement.lost_id); // Corrected property name
                $('#alumniId').val(response_editAnnouncement.member_id); // Corrected property name
                $('#name').val(response_editAnnouncement.name); // Corrected property name
                $('#campus').val(response_editAnnouncement.campus); // Corrected property name
                $('#email').val(response_editAnnouncement.email); // Corrected property name
                $('#birthday').val(response_editAnnouncement.bday); // Corrected property name
                $('#reason').val(response_editAnnouncement.reason); // Corrected property name
                $('#status').val(response_editAnnouncement.status); // Corrected property name
                $('#editPreview_ImageAnnouncements').attr('src', '../assets/images/lost/' + response_editAnnouncement.img);

                
                const selectedFileName = response_editAnnouncement.img;
                    if (selectedFileName) {
                        $('#selectedFileName').text(selectedFileName);
                    }
            }
            
        });
        

        
    });
       const fileInput = $("#edit_lost");
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
            

    </script>
</body>

</html>