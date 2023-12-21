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
<style>
   /* Add your styles here */
   .id-card {
            border: 1px solid #000;
            padding: 20px;
            margin: 20px;
            max-width: 300px;
        }

        .id-card img {
            width: 100%;
            height: auto;
        }
         /* edit form style*/
    .profile-picture-container.signature-picture-container{
        position: relative;
        overflow: hidden;
    }

    .profile-picture-label {
        display: block;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .profile-picture-label img {
        transition: transform 0.3s ease-in-out;
    }

    .profile-picture-label:hover img {
        transform: scale(1.1);
    }

    .change-picture-text {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 5px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .profile-picture-label:hover .change-picture-text {
        opacity: 1;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Alumni Members</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Alumni Members</i>
                <li class="breadcrumb-item text-secondary"> Campus</li>
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
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon text-white text-bold" style="background-color: #20b503">
                     Campus
                  </div>
                </div>

                <div class="card-body">
                  <table id="member_" class="table responsive">
                    <thead>
                      <tr>
                        <th>Picture</th>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year Graduated</th>
                        <th>Campus</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 150px;">Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      $query = "SELECT * FROM `members` WHERE `campus_id` = '02' ";
                      $result = mysqli_query(getDatabase(), $query);
                      while ($row = mysqli_fetch_array($result)) {

                        $campusId = $row['campus_id'];
                        $campusName = '';
                        if ($campusId === '01') {
                          $campusName = ' Campus';
                        } elseif ($campusId === '02') {
                          $campusName = 'North Campus';
                        } else {
                          $campusName = 'Unknown Campus';
                        }
                        
                    
                      ?>
                        <tr id="<?php echo $row['member_id']; ?>">
                          <td>
                            <img src="../assets/images/member_pictures/<?php echo $row['picture']; ?>" alt="Member Picture" width="100">
                          </td>
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
                            <?php echo $row['year_graduated']; ?>
                          </td>

                          <td>
                            <?php echo $campusName; ?>
                          </td>

                          <td>
                            <?php 
                            
                            $status = $row['status'];
                                  
                                        // $link_class = 'btn btn-secondary';
                                        // $link_href = 'actions/status.php?id='.$id.'&status=1';
                                     

                                        if ($status == 0) {
                                            $link_class = 'btn btn-warning  user-select-none';
                                     
                                            $link_text = 'PENDING';
                                        } elseif ($status === '1') {
                                          $link_class = 'btn btn-success  user-select-none';
                                          $link_text = 'DONE';
                                        }
                                       else {
                                        $link_class = 'btn btn-danger  user-select-none';
                                        $link_text = 'RECEIVED';
                                        }
                  ?>
                     <span class="badge <?php echo $link_class; ?>"><?php echo $link_text; ?></span>
                          </td>

                          <td class="text-center">
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#viewMembers" data-id="<?php echo $row['member_id']; ?>" data-role="viewMember">
                              <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                            </button>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#EditMembers" data-id="<?php echo $row['member_id']; ?>" data-role="editMember">
                              <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue;"></i>
                            </button>
                            <button type="button" class="btn " data-bs-toggle="modal" data-id="<?php echo $row['member_id']; ?>" data-role="deleteMember">
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

  <!-- View Members -->
  <div class="modal fade" id="viewMembers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

    <form id="viewMembersForm">
      <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">View Members</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <!-- Personal Information -->
            <div id="personal_information" class="content" role="tabpanel">

                <div class="row">
                    <div class="col-3">
                        <label for="member_picture" class="form-label">Picture</label>
                        <img src="" style="width: 100%; margin-top: 10px;" id="member_picture" class="border border-dark img-fluid" alt="member Picture">                    </div>

                    <div class="col-9">
                        <label for="member_id" class="form-label">Member ID</label>
                        <input type="text" class="form-control" id="member_id" name="member_id" placeholder="Member ID" required readonly>
                        
                        <label for="member_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Name" required readonly>
                        
                        <label for="member_yearGraduated" class="form-label">Year Graduated</label>
                        <input type="number" class="form-control" id="member_yearGraduated" name="member_yearGraduated" placeholder="Year Graduated" required readonly>
                      </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="member_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="member_address" name="member_address" placeholder="Address" required readonly>
                    </div>
                    <div class="col-6">
                        <label for="member_emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="member_emailAddress" name="member_emailAddress" placeholder="Email Address" required readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="member_birthDate" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="member_birthDate" name="member_birthDate" placeholder="Birth Date" required readonly>
                    </div>
                    <div class="col-4">
                        <label for="member_cellNo" class="form-label">Tel/Cellphone #</label>
                        <input type="number" class="form-control" id="member_cellNo" name="member_cellNo" placeholder="Tel/Cellphone #" required readonly>
                    </div>
                    <div class="col-4">
                        <label for="member_course" class="form-label">Course</label>
                        <input type="text" class="form-control" id="member_course" name="member_course" placeholder="Course" required readonly>
                    </div>
                </div>

                <div class="row">
                 
                    <div class="col-4">
                        <label for="member_civilStatus" class="form-label">Civil Status</label>
                        <input type="text" class="form-control" id="member_civilStatus" name="member_civilStatus" placeholder="Civil Status" required readonly>
                    </div>
                    <div class="col-4">
                          <label for="stats" class="form-label">STATUS</label>
                          <select class="form-select" id="stats" name="stats" disabled>
                            <option value="0">PENDING</option>
                            <option value="1">DONE</option>
                            <option value="2">RECEIVED</option>
                          </select>
                    </div>
                    <div class="col-4">
                    <label for="  member_signature" class="form-label">Signature</label>
                    <img src="" width="250px" height="80px" id="member_signature" name="member_signature"  alt="member Signature">
                    </div>
                </div>

            </div>
            <!-- ./Personal Information -->

        </div>

        <div class="modal-footer">
        <!-- <button type="button" onclick="generateIDCard()" class="btn btn-primary">Generate ID Card</button> -->
            <button type="button" data-bs-dismiss="modal" class="btn btn-block bg-gradient-secondary text-white">Close</button>
        </div>

      </div>
    </form>

    </div>
  </div>

<!-- Edit Members -->
<div class="modal fade" id="EditMembers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                  <div class="col">
                  <label for="Editmember_picture" class="form-label">Picture</label>
                  <div class="profile-picture-container">
                      <input type="file" id="Editmember_picture_input" name="Editmember_picture_input" accept="image/*" style="display: none;">
                      <label for="Editmember_picture_input" class="profile-picture-label">
                          <img src="" style="width: 100%; margin-top: 10px;" id="Editmember_picture" class=" border border-dark img-fluid" alt="Editmember Picture">
                          <span class="change-picture-text">Change Picture</span>
                      </label>
                  </div>
              </div>
                      <div class="col-9">
                          <label for="Editmember_id" class="form-label">member ID</label>
                          <input type="text" class="form-control" id="Editmember_id" name="Editmember_id" placeholder="member ID" readonly>
                          
                          <label for="Editmember_name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="Editmember_name" name="Editmember_name" placeholder="Name">
                        
                          <label for="Editmember_yearGraduated" class="form-label">Year Graduated</label>
                          <input type="number" class="form-control" id="Editmember_yearGraduated" name="Editmember_yearGraduated" placeholder="Year Graduated">
                        
                        </div>
                  </div>

                  <div class="row">
                      <div class="col-6">
                          <label for="Editmember_address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="Editmember_address" name="Editmember_address" placeholder="Address">
                      </div>
                      <div class="col-6">
                          <label for="Editmember_emailAddress" class="form-label">Email Address</label>
                          <input type="email" class="form-control" id="Editmember_emailAddress" name="Editmember_emailAddress" placeholder="Email Address">
                      </div>
                  </div>

                  <div class="row">
                    
                      <div class="col-4">
                          <label for="Editmember_birthDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="Editmember_birthDate" name="Editmember_birthDate" placeholder="Birth Date">
                      </div>
                      <div class="col-4">
                          <label for="Editmember_cellNo" class="form-label">Tel/Cellphone #</label>
                          <input type="number" class="form-control" id="Editmember_cellNo" name="Editmember_cellNo" placeholder="Tel/Cellphone #">
                      </div>
                      <div class="col-4">
                          <label for="Editmember_course" class="form-label">Course</label>
                          <input type="text" class="form-control" id="Editmember_course" name="Editmember_course" placeholder="Course">
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-4">
                          <label for="Editmember_civilStatus" class="form-label">Civil Status</label>
                          <input type="text" class="form-control" id="Editmember_civilStatus" name="Editmember_civilStatus" placeholder="Civil Status">
                      </div>

                      <div class="col-4">
                          <label for="stats" class="form-label">STATUS</label>
                          <select class="form-select" id="stats" name="stats">
                            <option value="0">PENDING</option>
                            <option value="1">DONE</option>
                            <option value="2">RECEIVED</option>
                          </select>
                    </div>

                      <div class="col-4">
                            <label for="Editmember_signature" class="form-label">Signature</label>
                        <div class="signature-picture-container">
                            <input type="file" id="Editmember_signature_input" name="Editmember_signature_input" accept="image/*" style="display: none;">
                          <label for="Editmember_signature_input" class="profile-picture-label">
                            <img src="" width="250px" height="80px" id="Editmember_signature" name="Editmember_signature"  alt="Editmember Signature">
                            <span class="change-picture-text">Change Signature</span>
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

    </div>
</div>
  
  <script>
    $(document).ready(function() {
      $('#member_').DataTable({
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
          },
          {
            extend: 'colvis',
            text: '<i class="fas fa-columns"></i> Columns'
          },
        ],
        dom: 'Bfrtip',
        responsive: true
      });
    });
  //View member 
    $(document).on('click', 'button[data-role=viewMember]', function() {
      $.ajax({
        type: "POST",
        url: "../server/read_member.php",
        data: {
          member_id: $(this).attr('data-id'),
        },
        dataType: "json",
        success: function(response_viewMember) {
          $('#member_id').val(response_viewMember.member_id);
          $('#member_name').val(response_viewMember.name);
          $('#member_yearGraduated').val(response_viewMember.year_graduated);
          $('#member_emailAddress').val(response_viewMember.email_address);
          $('#member_address').val(response_viewMember.address);
          $('#member_birthDate').val(response_viewMember.birth_date);
          $('#member_cellNo').val(response_viewMember.cellphone_no);
          $('#member_course').val(response_viewMember.course);
          $('#member_civilStatus').val(response_viewMember.civil_status);
          $('#member_picture').attr('src', '../assets/images/member_pictures/' + response_viewMember.picture);
          $('#member_signature').attr('src', '../assets/images/member_pictures/' + response_viewMember.signature);
        }
      })
    })

    //Edit member 
    $(document).on('click', 'button[data-role=editMember]',function(){
      $.ajax({
        type: "POST",
        url: "../server/read_member.php",
        data: {
          member_id: $(this).attr('data-id'),
        },
        dataType: "json",
        success: function(response_Editmember) {
          $('#Editmember_id').val(response_Editmember.member_id);
          $('#Editmember_name').val(response_Editmember.name);
          $('#Editmember_yearGraduated').val(response_Editmember.year_graduated);
          $('#Editmember_emailAddress').val(response_Editmember.email_address);
          $('#Editmember_address').val(response_Editmember.address);
          $('#Editmember_birthDate').val(response_Editmember.birth_date);
          $('#Editmember_cellNo').val(response_Editmember.cellphone_no);
          $('#Editmember_course').val(response_Editmember.course);
          $('#Editmember_civilStatus').val(response_Editmember.civil_status);
          $('#Editmember_picture').attr('src', '../assets/images/member_pictures/' + response_Editmember.picture);
          $('#Editmember_signature').attr('src', '../assets/images/member_pictures/' + response_Editmember.signature);
          $('#stats').val(response_Editmember.status);
        }
      })
      
    });
    const pictureFileInput = $("#Editmember_picture_input");
const signatureFileInput = $("#Editmember_signature_input");

const picturePreview = $("#Editmember_picture");
const signaturePreview = $("#Editmember_signature");

// Function to handle file input changes
function handleFileInputChange(fileInput, imagePreview) {
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
}

// Bind change event for picture input
pictureFileInput.on("change", function() {
    handleFileInputChange(pictureFileInput, picturePreview);
});

// Bind change event for signature input
signatureFileInput.on("change", function() {
    handleFileInputChange(signatureFileInput, signaturePreview);
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
                    $('#EditMembers').modal('hide');
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "../server/edit_member.php",
                            type: "POST",
                            data: new FormData(this),
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response_Editmember) {
                                if (response_Editmember.status) {
                                   
                                    toastr.success(response_Editmember.message, '', {
                                        timeOut: 1000,
                                        closeButton: false,
                                        onHidden: function() {
                                          location.reload();
                                        }
                                      
                                    });
                               
                                    systemChanges(response_Editmember.admin, response_Editmember.operation, response_Editmember.description);
                                } else {
                                    toastr.error(response_Editmember.message, '', {
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

    })
    // Delete member 
    $(document).on('click', 'button[data-role=deleteMember]', function(e) {
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
                        url: "../server/delete_member.php",
                        data: {
                          member_id: $(this).attr('data-id'),
                        },
                        dataType: "json",
                        success: function(response_deleteMember) {
                            if (response_deleteMember.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response_deleteMember.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then(() => {
                                    location.reload();
                                });

                                systemChanges(response_deleteMember.admin, response_deleteMember.operation, response_deleteMember.description);

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: response_deleteMember.message,
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
        jQuery.validator.addMethod("alphabeticWithSpace", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
         }, "Please enter alphabetic characters only.");
      // Form validation
        var validate_form = $('#EditMembersForm').validate({
        rules: {

          Editmember_picture_input: {
            required: true,
            accept: "image/jpeg, image/png"
          },
          Editmember_name:{
            required :true,
            alphabeticWithSpace: true,
          },
          Editmember_yearGraduated:{
            required :true,
            maxlength: 4,
            minlength: 4,
          },
          Editmember_address:{
            required :true,
          },
          Editmember_birthDate:{
            required :true,
          },
          Editmember_cellNo:{
            required :true,
            maxlength: 11,
            minlength:11,
          },
          Editmember_course:{
            required :true,
          },
          Editmember_civilStatus:{
            required :true,

          },
          stats:{
           required: true,
          },
          Editmember_signature_input:{
            required: true,
            accept: "image/jpeg, image/png"
          }
        },

messages: {
  Editmember_signature_input: {
    required: 'Please provide a valid picture !',
            accept: 'Please select a valid JPG or PNG image file.'
  },
  Editmember_name:{
    required:'This field is required!',
    alphabeticWithSpace:"Only letters and spaces are allowed!"
    },
    Editmember_yearGraduated:{
      required:'This field is required!',
      maxlength: 'Year should be exactly 4 digits long.',
      minlength: 'Year should be exactly 4 digits long.'
    },
    Editmember_address:{
      required:'This field is required!'
      },
      Editmember_birthDate:{
        required:'This field is required!'
        },
        Editmember_cellNo:{
          required:'This field is required!',
          maxlength: 'Cell number must be exactly 11 digits long.',
          minlength: 'Cell number must be exactly 11 digits long.'
          },
          Editmember_course:{
            required:'This field is required!'
            },
            Editmember_civilStatus:{
              required:'This field is required!'
              },
              stats:{
                required: 'This field is required!'
                },
                Editmember_picture_input: {
                  required: 'Please provide a valid picture !',
            accept: 'Please select a valid JPG or PNG image file.'
          },
            
                },
                


        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
          $(element).addClass('is-valid');
        }

      }); 
  </script>
</body>

</html>

