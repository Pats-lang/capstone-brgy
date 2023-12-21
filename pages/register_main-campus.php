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
                <h1>Member Registration</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item text-decoration-none text-secondary"><i>Member Registration</i></li>
                  <li class="breadcrumb-item text-secondary">Main Campus</li>
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
                      Main Campus
                    </div>
                  </div>

                  <div class="card-body p-4">
                    <form id="registerMemberForm" enctype="multipart/form-data">

                      <!-- Personal Information -->
                      <h5>Personal Information</h5>
                      <div class="row">
                        <div class="col form-group">
                          <label for="register_name">Name</label>
                          <input type="text" class="form-control form-control-border" id="register_name"
                            name="register_name" placeholder="Name" required>
                        </div>
                        <div class="col form-group">
                          <label for="register_yearGraduated">Year Graduated</label>
                          <input type="number" class="form-control form-control-border" id="register_yearGraduated"
                            name="register_yearGraduated" placeholder="Year Graduated"  min="1971" max="2023" required>
                        </div>
                      </div>
                     

                      <div class="row">
                        <div class="col form-group">
                          <label for="register_address">Address</label>
                          <input type="text" class="form-control form-control-border" id="register_address"
                            name="register_address" placeholder="Address" required>
                        </div>

                        <div class="col form-group">
                          <label for="register_emailAddress">Email Address</label>
                          <input type="email" class="form-control form-control-border" id="register_emailAddress"
                            name="register_emailAddress" placeholder="E mail Address" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col form-group">
                          <label for="register_birthDate">Birth Date</label>
                          <input type="date" class="form-control form-control-border" id="register_birthDate"
                            name="register_birthDate" placeholder="Birth Date" required>
                        </div>

                        <div class="col form-group">
                          <label for="register_cellNo">Tel/Cellphone #</label>
                          <input type="number" class="form-control form-control-border" id="register_cellNo"
                            name="register_cellNo" placeholder="Tel/Cellphone #" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col form-group">
                          <label for="register_course">Course</label>
                          <select class="custom-select rounded-0" id="register_course" name="register_course" required>
                            <option selected disabled>Select a Course</option>
                            <option id="bscs">BS Computer Science</option>
                            <option id="bsit">BS Information Technology</option>
                            <option id="bsis">BS Information System</option>
                            <option id="bsemc">BS Entertainment and Multimedia Computing</option>
                          </select>
                        </div>

                        <div class="col form-group">
                          <label for="register_status">Civil Status</label>
                          <select class="custom-select rounded-0" id="register_status" name="register_status" required>
                            <option selected disabled>Select a Civil Status</option>
                            <option id="single">Single</option>
                            <option id="married">Married</option>
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col form-group">
                          <label for="register_picture">Picture</label>
                          <input type="file" class="form-control form-control-border" name="register_picture"accept="image/*" required>
                        </div>

                        <div class="col form-group">
                          <label for="register_signature">Signature</label>
                          <input type="file" class="form-control form-control-border" name="register_signature"accept="image/*"
                            required>
                        </div>
                      </div>
                      <!-- Personal Information -->

                      <div class="line">

                      </div>

                      <!-- Work Experience -->
                      <h5>Work Experience
                        <i class="fa-solid fa-circle-plus" style="color:green"
                          onclick="addFields('workExperience', this)"></i>
                        <i class="fa-solid fa-circle-minus d-none" style="color:red"
                          onclick="reduceFields('workExperience', this)"></i>
                      </h5>
                      <div class="row" id="workExperience_container">
                        <div class="col form-group">
                          <label for="register_workCompany">Company</label>
                          <input type="text" class="form-control form-control-border" id="register_workCompany"
                            name="register_workCompany[]" placeholder="Company">
                        </div>

                        <div class="col form-group">
                          <label for="register_workPosition">Position</label>
                          <input type="text" class="form-control form-control-border" id="register_workPosition"
                            name="register_workPosition[]" placeholder="Position">
                        </div>

                        <div class="col form-group">
                          <label for="register_workDuration">Duration</label>
                          <input type="text" class="form-control form-control-border" id="register_workDuration"
                            name="register_workDuration[]" placeholder="Duration">
                        </div>
                      </div>
                      <!-- ./Work Experience -->

                      <!-- Trainings/Seminars -->
                      <h5>Trainings and Seminars
                        <i class="fa-solid fa-circle-plus" style="color:green"
                          onclick="addFields('trainings', this)"></i>
                      </h5>
                      <div class="row" id="trainings_container">
                        <div class="col form-group">
                          <label for="register_trainingTitle">Title/Course</label>
                          <input type="text" class="form-control form-control-border" id="register_trainingTitle"
                            name="register_trainingTitle[]" placeholder="Title/Course">
                        </div>

                        <div class="col form-group">
                          <label for="register_trainingVenue">Venue</label>
                          <input type="text" class="form-control form-control-border" id="register_trainingVenue"
                            name="register_trainingVenue[]" placeholder="Venue">
                        </div>

                        <div class="col form-group">
                          <label for="register_trainingDuration">Duration</label>
                          <input type="text" class="form-control form-control-border" id="register_trainingDuration"
                            name="register_trainingDuration[]" placeholder="Duration">
                        </div>
                      </div>
                      <!-- ./Trainings/Seminars -->

                      <!-- Affiliations/Organizations -->
                      <h5>Affiliations/Organizations
                        <i class="fa-solid fa-circle-plus" style="color:green"
                          onclick="addFields('affiliations', this)"></i>
                      </h5>
                      <div class="row" id="affiliations_container">
                        <div class="col form-group">
                          <label for="register_affiliationsOrganizations">Organizations</label>
                          <input type="text" class="form-control form-control-border"
                            id="register_affiliationsOrganizations" name="register_affiliationsOrganizations[]"
                            placeholder="Organizations">
                        </div>

                        <div class="col form-group">
                          <label for="register_affiliationsPositions">Position</label>
                          <input type="text" class="form-control form-control-border"
                            id="register_affiliationsPositions" name="register_affiliationsPositions[]"
                            placeholder="Position">
                        </div>

                        <div class="col form-group">
                          <label for="register_affiliationsDuration">Duration</label>
                          <input type="text" class="form-control form-control-border" id="register_affiliationsDuration"
                            name="register_affiliationsDuration[]" placeholder="Duration">
                        </div>
                      </div>
                      <!-- ./Affiliations/Organizations -->

                      <!-- Awards/Special Achievements -->
                      <div class="row">
                        <div class="col form-group">
                          <h5>Awards/Special Achievements
                            <i class="fa-solid fa-circle-plus" style="color:green"
                              onclick="addFields('awards', this)"></i>
                          </h5>
                          <div class="row" id="awards_container">
                            <input type="text" class="form-control form-control-border" id="register_achievements"
                              name="register_achievements[]" placeholder="Achievements">
                          </div>
                        </div>
                      </div>
                      <!-- ./Awards/Special Achievements -->

                      <div class="row">
                        <div class="col form-group ">
                          <div class="row">
                            <div class="col form-group d-flex align-items-center">
                              <label>Member ID: </label>
                            </div>
                            <div class="col form-group">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_yearToday" name="register_yearToday" readonly>
                            </div>
                            <div class="col form-group ">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_memberCount" name="register_memberCount" readonly>
                            </div>
                            <div class="col form-group">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_campusId" name="register_campusId" readonly>
                            </div>
                            <div class="col form-group">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_memberId" name="register_memberId" style="letter-spacing: 2px;" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col form-group">
                          <button type="submit" class="btn btn-block bg-gradient-success text-white">Submit</button>
                        </div>
                      </div>

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
      getMemberId("01", "../server/create_member-id.php"); //01 for Main/Edsa/South Campus
      
      jQuery.validator.addMethod("alphabeticWithSpace", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
      }, "Please enter alphabetic characters only.");
      // Form validation
      var validate_form = $('#registerMemberForm').validate({
        rules: {
          register_name: {
            required: true,
            alphabeticWithSpace: true,
            minlength: 3,
          },
          register_yearGraduated: {
            required: true,
            maxlength: 4,
            minlength: 4,
          },
          register_address: {
            required: true,
            minlength: 5,
          },
          register_emailAddress: {
            required: true,
            minlength: 10,
          },
          register_birthDate: {
            required: true,
          },
          register_cellNo: {
            required: true,
          
            maxlength: 11,
            minlength: 11,
          },
          register_course: {
            required: true,
          },
          register_status: {
            required: true,
          },
          register_picture: {
            required: true,
            accept: "image/jpeg, image/png"
          },
          register_signature: {
            required: true,
            accept: "image/jpeg, image/png"
          },
          'register_workCompany[]': {
            alphabeticWithSpace: true,
          },
          'register_workPosition[]': {
            alphabeticWithSpace: true,
          },
          'register_workDuration[]': {
            alphabeticWithSpace: true,
          },
          'register_trainingTitle[]': {
            alphabeticWithSpace: true,
          },
          'register_trainingVenue[]': {
            alphabeticWithSpace: true,
          },
          'register_trainingDuration[]': {
            alphabeticWithSpace: true,
          },
          'register_affiliationsOrganizations[]': {
            alphabeticWithSpace: true,
          },
          'register_affiliationsPositions[]': {
            alphabeticWithSpace: true,
          },
          'register_affiliationsDuration[]': {
            alphabeticWithSpace: true,
          },
          'register_achievements[]': {
            alphabeticWithSpace: true,
          },
        },

        messages: {
          register_name: {
            required: 'Please provide a valid username!',
          },
          register_yearGraduated: {
            required: 'Please provide a valid year',
            maxlength: 'Please enter a valid 4-digit year.',
            minlength: 'Please enter a valid 4 digits'
          },
          register_address: {
            required: 'Please provide a valid Address!',
          },
          register_emailAddress: {
            required: 'Please provide a valid Email Address!',
          },
          register_birthDate: {
            required: 'Member must be 18 years old and above!', //have additonal condition
          },
          register_cellNo: {
            maxlength: 'Please provide 11 digits!',
          
           
          },
          register_course: {
            required: ' Please select a course to register!',
          },
          register_status: {
            required: 'Please select a status to register',
          },
          register_picture: {
            required: 'Please provide a valid picture !',
            accept: 'Please select a valid JPG or PNG image file.'
          },
          register_signature: {
            required: 'Please provide a valid signature !',
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