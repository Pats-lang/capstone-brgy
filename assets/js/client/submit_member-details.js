$(document).ready(function () {
    $('#registerMemberForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../server/add_member-client-details.php',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (responseMemberRegistration) {
                Swal.fire({
                    icon: responseMemberRegistration.icon,
                    text: responseMemberRegistration.message,
                    timer: null, // Set the timer to null
                    showConfirmButton: true, // Show a confirmation button
                }).then(() => {
                    location.href = "../../index.php?registration=success"; // Redirect when the user clicks "OK"
                });
            },
            error: function (xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
});
