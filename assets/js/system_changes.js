function systemChanges(admin, operation, description) {
    $.ajax({
        type: 'POST',
        url: '../server/add_changes.php',
        data: {
            admin: admin,
            operation: operation,
            description: description
        },
        dataType: 'json',
        success: function (response_addChanges) {
            if (response_addChanges) {
                // For debugging purposes only remove for finalization.
                toastr.success(response_addChanges.message, '', {
                    positionClass: 'toast-bottom-left',
                    timeOut: 1500,
                    closeButton: false
                });
            }
        }
    })
}
