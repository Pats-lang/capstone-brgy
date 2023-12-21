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
                            <h1>Alumni ID Inquiries</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-secondary">Alumni ID Inquiries</li>
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
                                    <table id="inquiriesTable" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>             
                                                <th>Course</th>
                                                <th>Campus</th>
                                                <th>Year Graduated</th>
                                                <th>Time Registered</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                          
                                            $query = "SELECT * FROM `members` WHERE `cid` = 1";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                // Your code here
                                                $campusId = $row['campus_id'];
                                                $campusName = '';
                                                if ($campusId === '01') {
                                                $campusName = 'Main Campus';
                                                } elseif ($campusId === '02') {
                                                $campusName = 'North Campus';
                                                } else {
                                                $campusName = 'Unknown Campus';
                                                }
                                            ?>
                                            <tr id="<?php echo $row['member_id']; ?>">
                                                <td>
                                                    <?php echo $row['member_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['course']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $campusName; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['year_graduated']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['time_registered']; ?>
                                                </td>

                                                <td class="text-center" style="width: 150px;">

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#EditMembersMain"
                                                        data-id="<?php echo $row['member_id']; ?>"
                                                        data-role="editMember">
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

    
<!-- Edit Members -->
<div class="modal fade" id="EditMembersMain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="EditMembersForm"  method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Members</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Personal Information -->
              <div id="personal_information" class="content" role="tabpanel">
                  <div class="row">
                  <div class="col-6">
                  <label for="EditmemberMain_picture" class="form-label">Picture</label>
                  <div class="profile-picture-container">
                      <label for="EditmemberMain_picture_input" class="profile-picture-label mt-2">
                          <img src="" style="width: 100%; " id="EditmemberMain_picture" class=" border border-dark img-fluid" alt="Editmember Picture">
                         
                      </label>
                  </div>
              </div>
                      <div class="col-6">
                          <label for="EditmemberMain_id" class="form-label">member ID</label>
                          <input type="text" class="form-control" id="EditmemberMain_id" name="EditmemberMain_id" placeholder="member ID" readonly>
                          
                          <label for="EditmemberMain_name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="EditmemberMain_name" name="EditmemberMain_name" placeholder="Name" readonly>
                        
                          <label for="EditmemberMain_yearGraduated" class="form-label">Year Graduated</label>
                          <input type="number" class="form-control" id="EditmemberMain_yearGraduated" name="EditmemberMain_yearGraduated" placeholder="Year Graduated" readonly>
                        
                        </div>
                  </div>

                  <div class="row">
                      <div class="col-6">
                          <label for="EditmemberMain_address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="EditmemberMain_address" name="EditmemberMain_address" placeholder="Address" readonly>
                      </div>
                      <div class="col-6">
                          <label for="EditmemberMain_emailAddress" class="form-label">Email Address</label>
                          <input type="email" class="form-control" id="EditmemberMain_emailAddress" name="EditmemberMain_emailAddress" placeholder="Email Address" readonly>
                      </div>
                  </div>

                  <div class="row">
                    
                      <div class="col-4">
                          <label for="EditmemberMain_birthDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="EditmemberMain_birthDate" name="EditmemberMain_birthDate" placeholder="Birth Date" readonly>
                      </div>
                      <div class="col-4">
                          <label for="EditmemberMain_cellNo" class="form-label">Tel/Cellphone #</label>
                          <input type="number" class="form-control" id="EditmemberMain_cellNo" name="EditmemberMain_cellNo" placeholder="Tel/Cellphone #" readonly>
                      </div>
                      <div class="col-4">
                          <label for="EditmemberMain_course" class="form-label">Course</label>
                          <input type="text" class="form-control" id="EditmemberMain_course" name="EditmemberMain_course" placeholder="Course" readonly>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-4">
                          <label for="EditmemberMain_civilStatus" class="form-label">Civil Status</label>
                          <input type="text" class="form-control" id="EditmemberMain_civilStatus" name="EditmemberMain_civilStatus" placeholder="Civil Status" readonly>
                      </div>

                      <div class="col-4">
                          <label for="stats" class="form-label">STATUS</label>
                          <select class="form-select" id="stats" name="stats" >
                            <option value="2">APPROVED</option>
                            <option value="0">DECLINED</option>
                          </select>
                    </div>

                      <div class="col-4">
                            <label for="EditmemberMain_signature" class="form-label">Signature</label>
                        <div class="signature-picture-container">
                           
                          <label for="EditmemberMain_signature_input" class="profile-picture-label">
                            <img src="" width="250px" height="80px" id="EditmemberMain_signature" name="EditmemberMain_signature"  alt="Editmember Signature">
                            
                          </label>
                        </div>
                      </div>
                  </div>

              </div>
              <!-- ./Personal Information -->
          </div>
          <div class="modal-footer">
          <div class="row w-100">
            <div class="col-6">
              <button type="submit" id="submit" class="btn btn-block bg-gradient-primary text-white">Update</button>
            </div>
            <div class="col-6">
              <button type="button" data-bs-dismiss="modal" class="btn btn-block bg-gradient-secondary text-white">Close</button>
            </div>
          </div>
        </div>
    </form>

    <?php include 'includes/admin_footer.php'; ?>



    <script>
    $(document).ready(function() {
        $('#inquiriesTable').DataTable({
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

    //Edit member main
    $(document).on('click', 'button[data-role=editMember]',function(){
      $.ajax({
        type: "POST",
        url: "../server/read_member.php",
        data: {
          member_id: $(this).attr('data-id'),
        },
        dataType: "json",
        success: function(response_Editmember) {
          $('#EditmemberMain_id').val(response_Editmember.member_id);
          $('#EditmemberMain_name').val(response_Editmember.name);
          $('#EditmemberMain_yearGraduated').val(response_Editmember.year_graduated);
          $('#EditmemberMain_emailAddress').val(response_Editmember.email_address);
          $('#EditmemberMain_address').val(response_Editmember.address);
          $('#EditmemberMain_birthDate').val(response_Editmember.birth_date);
          $('#EditmemberMain_cellNo').val(response_Editmember.cellphone_no);
          $('#EditmemberMain_course').val(response_Editmember.course);
          $('#EditmemberMain_civilStatus').val(response_Editmember.civil_status);
          $('#EditmemberMain_picture').attr('src', '../assets/images/member_pictures/' + response_Editmember.picture);
          $('#EditmemberMain_signature').attr('src', '../assets/images/member_pictures/' + response_Editmember.signature);
          $('#stats').val(response_Editmember.status);
        }
      })
      
    });

    
    $('#EditMembersForm').on('submit', function(e){
     e.preventDefault();
     if ($('#EditMembersForm').valid()) {
                Swal.fire({
                    title: 'Do you want to save the changes?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    $('#EditMembersMain').modal('hide');
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
                            url: "../server/edit_id_inquiries.php",
                            type: "POST",
                            data: new FormData(this),
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response_EditmemberMain) {
                                if (response_EditmemberMain.status) {
                                   
                                    toastr.success(response_EditmemberMain.message, '', {
                                        timeOut: 1000,
                                        closeButton: false,
                                        onHidden: function() {
                                          location.reload();
                                        }
                                        
                                    });
                               
                                    systemChanges(response_EditmemberMain.admin, response_EditmemberMain.operation, response_EditmemberMain.description);
                                } else {
                                    toastr.error(response_EditmemberMain.message, '', {
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
                    },
                        willClose: () => {
                        clearInterval(timerInterval)
                        
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

    })
    </script>
</body>

</html>