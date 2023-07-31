// function clearForms() {
//   var forms = document.getElementsByClassName('clearForms');
//   for (var i = 0; i < forms.length; i++) {
//     forms[i].reset();
//   }
// }

// $(document).ready(function () {
//   var $form = $('form');
//   $form.submit(function (event) {
//     event.preventDefault();
//     $.post($(this).attr('action'), $(this).serialize(), function () {
//       window.location.reload();
//     });
//   });
// });

$(document).on('submit', '.update-spirit', function (event) {
  event.preventDefault();
  var form = $(this);
  var productID = form.find('.id').val();
  var action = form.find('.action').val();
  updateQuantity(productID, action, form);
});

function updateQuantity(productID, action, form) {
  // Make an AJAX request to fetch the message chain for the selected sender
  $.ajax({
    url: 'update-quantity.php',
    type: 'POST',
    dataType: 'json',
    data: { productID: productID, action: action },
    success: function (response) {
      if (response.success) {
        var amount = response.amount;
        // Update the UI with the message chain for the selected sender
        $('#innerProductQty' + productID).html(amount);
        $('#outerProductQty' + productID).html(amount);
      } else {
        // Error occurred while fetching the message chain
      }
    },
    error: function () {
      // Error occurred during the AJAX request
    },
  });
}
