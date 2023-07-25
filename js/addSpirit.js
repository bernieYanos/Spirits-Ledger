function addNewOption() {
  var selectField = document.getElementById('spiritName');
  var selectedOption = selectField.options[selectField.selectedIndex].value;
  var newOptionContainer = document.getElementById('newOption');

  if (selectedOption === 'Add new') {
    var newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.classList = 'form-control';
    newInput.name = 'spiritName';
    newInput.id = 'newOptionInput';
    newInput.placeholder = 'Enter name';
    newOptionContainer.appendChild(newInput);
    newOptionContainer.classList = 'new-form-element';
  } else {
    var existingInput = document.getElementById('newOptionInput');
    if (existingInput) {
      newOptionContainer.classList.remove('new-form-element');
      newOptionContainer.removeChild(existingInput);
    }
  }
}

function clearForms() {
  var forms = document.getElementsByClassName('clearForms');
  for (var i = 0; i < forms.length; i++) {
    forms[i].reset();
  }
}

$(document).ready(function () {
  var $form = $('form');
  $form.submit(function (event) {
    var spiritName = document.getElementById('spiritName').value;

    if (spiritName === 'notAnOption') {
      event.preventDefault();
      alert('Please select a spirit or add a new one.');
    } else {
      event.preventDefault();
      $.post($(this).attr('action'), $(this).serialize(), function () {
        window.location.reload();
      });
    }
  });
});
