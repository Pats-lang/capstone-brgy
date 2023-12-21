function getMemberId(campus_id, sender) {
  $.ajax({
    type: 'POST',
    url: sender,
    data: {
      campus_id: campus_id
    },
    dataType: 'json',
    success: function (response_newMemberId) {
      if (response_newMemberId) {
        $('#register_yearToday').val(response_newMemberId.yearToday);
        $('#register_memberCount').val(response_newMemberId.memberCount);
        $('#register_campusId').val(response_newMemberId.campus_id);

        var yearTodayCount = $('#register_yearToday');
        var memberCount = $('#register_memberCount');
        var campusIdCount = $('#register_campusId');
        var register_memberId = $('#register_memberId');

        var register_combinedMemberId = yearTodayCount.val() + memberCount.val() + campusIdCount.val();

        register_memberId.val(register_combinedMemberId);

        let timerInterval
        Swal.fire({
          title: 'Generating New Alumni ID Number!',
          html: 'I will close in <b></b> milliseconds.',
          timer: 1000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        })
      }
    }
  })
}

var moreInformation = ["workExperience", "trainings", "affiliations", "awards"];
var max_clickable = [4, 4, 4, 4];

function addFields(moreInfo, element) {
  var index = moreInformation.indexOf(moreInfo);
  var $icon = $(element);
  if (index !== -1 && max_clickable[index] > 0 && !$icon.hasClass('disabled')) {
    var $container = $('#' + moreInfo + '_container');
    var $clone = $container.clone(true);
    var $inputs = $clone.find('input');
    $inputs.val('');
    $icon.addClass('disabled'); // Disable the icon temporarily
    $container.after($clone);
    max_clickable[index]--;
    // Re-enable the icon after a delay
    setTimeout(function () {
      $icon.removeClass('disabled');
      if (max_clickable[index] === 1) {
        toastr.error('You have reached the maximum field.', '', {
          positionClass: 'toast-top-right',
          closeButton: false
        });
        $icon.off('click');
        $icon.css('color', 'gray');
      }
    }, 100); // Adjust the delay as needed
  }
}


// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
  window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});

// Disable the back button functionality
window.history.pushState(null, null, window.location.href);
window.addEventListener('popstate', function (event) {
  window.history.pushState(null, null, window.location.href);
});











