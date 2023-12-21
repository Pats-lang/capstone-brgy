$(document).ready(function () {
    $('#registerMemberForm').on('submit', function (e) {
        e.preventDefault();
        if ($('#registerMemberForm').valid()) {
            $.ajax({
                type: 'POST',
                url: '../server/add_member-details.php',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (responseMemberRegistration) {
                    Swal.fire({
                        icon: responseMemberRegistration.icon,
                        text: responseMemberRegistration.message,
                        timer: 1500,
                        showConfirmButton: false,
                    }).then(() => {
                        location.reload();
                    });
                    
                    systemChanges(responseMemberRegistration.admin, responseMemberRegistration.operation, responseMemberRegistration.description)
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        } else {
            validate_form.focusInvalid();
        }
    })

})