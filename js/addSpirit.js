$(document).ready(function () {
  // Clear forms function
  function clearForms() {
    $('.clearForms').each(function () {
      this.reset();
    });
  }

  // Quantity function
  function quantity() {
    var quantityLabel = $(
      '<label class="form-label" for="quantity" id="quantityLabel">Quantity</label>'
    );
    var quantity = $(
      '<input type="number" class="form-control" id="quantity" name="quantity" value="1">'
    );
    $('#quantityContainer').append(quantityLabel).append(quantity);
  }

  function removeQuantity() {
    $('#quantity').remove();
    $('#quantityLabel').remove();
  }

  async function otherData() {
    var selectedOption = $('#subCategoryID').val();
    if (selectedOption != 'notAnOption') {
      if (!$('#description').length) {
        try {
          const producer = await $.ajax({
            url: 'add-spirit-data.php',
            method: 'POST',
            data: { request: 'producer' },
            dataType: 'json',
          });

          var descriptionLabel = $(
            '<label class="form-label" for="description" id="descriptionLabel">Description:</label>'
          );
          var description = $(
            '<textarea class="form-control" name="description" id="description" rows="3"></textarea>'
          );
          $('#descriptionContainer')
            .append(descriptionLabel)
            .append(description);

          var producerLabel = $(
            '<label class="form-label" id="producerLabel" for="producer">Producer:</label>'
          );

          var producerSelect = $(
            '<select class="form-select form-select-sm" aria-label=".form-select-sm" name="producer" id="producer" required></select>'
          );

          var producerDefault = $(
            '<option value="notAnOption" selected>Choose producer</option>'
          );

          producerSelect.append(producerDefault);
          $.each(producer.producers, function (index, producer) {
            var producerOption = $(
              '<option value="' +
                producer.Source_ID +
                '">' +
                producer.Source_Name +
                '</option>'
            );
            producerSelect.append(producerOption);
          });

          $('#producerContainer').append(producerLabel).append(producerSelect);
        } catch (error) {
          console.error('Error fetching producers:', error);
        }
      }
    } else {
      $('#description').remove();
      $('#descriptionLabel').remove();
      $('#producer').remove();
      $('#producerLabel').remove();
    }
  }

  function removeOtherData() {
    $('#description').remove();
    $('#descriptionLabel').remove();
    $('#producer').remove();
    $('#producerLabel').remove();
  }

  async function category() {
    try {
      const category = await $.ajax({
        url: 'add-spirit-data.php',
        method: 'POST',
        data: { request: 'category' },
        dataType: 'json',
      });

      var categoryLabel = $(
        '<label class="form-label" id="categoryIDLabel" for="categoryID">Category:</label>'
      );

      var categorySelect = $(
        '<select class="form-select form-select-sm" aria-label=".form-select-sm" name="categoryID" id="categoryID" required></select>'
      );

      var categoryDefault = $(
        '<option value="notAnOption" selected>Choose category</option>'
      );

      categorySelect.append(categoryDefault);
      $.each(category.categories, function (index, category) {
        var categoryOption = $(
          '<option value="' +
            category.Category_ID +
            '">' +
            category.Category_Name +
            '</option>'
        );
        categorySelect.append(categoryOption);
      });

      $('#categoryContainer').append(categoryLabel).append(categorySelect);

      // Attach the subCategory function to the change event of the select field
      $('#categoryID').change(function () {
        var selectedCategory = $(this).val();
        subCategory(selectedCategory);
      });
    } catch (error) {
      console.error('Error fetching categories:', error);
    }
  }

  function removeCategory() {
    $('#categoryID').remove();
    $('#categoryIDLabel').remove();
  }

  async function subCategory(selectedCategory) {
    if (selectedCategory != 'notAnOption') {
      try {
        const subCategoryData = await $.ajax({
          url: 'add-spirit-data.php',
          method: 'POST',
          data: { request: 'subCategory', categoryID: selectedCategory },
          dataType: 'json',
        });

        var subCategoryLabel = $(
          '<label class="form-label" id="subCategoryIDLabel" for="subCategoryID">Sub Category:</label>'
        );

        var subCategorySelect = $(
          '<select class="form-select form-select-sm" aria-label=".form-select-sm" name="subCategoryID" id="subCategoryID" required></select>'
        );

        var subCategoryDefault = $(
          '<option value="notAnOption" selected>Choose sub category</option>'
        );

        subCategorySelect.append(subCategoryDefault);
        $.each(subCategoryData.subCategories, function (index, subCategory) {
          var subCategoryOption = $(
            '<option value="' +
              subCategory.Sub_Category_ID +
              '">' +
              subCategory.Sub_Category_Name +
              '</option>'
          );
          subCategorySelect.append(subCategoryOption);

          // if (selectedCategory === '1') {
          // }
        });

        $('#subCategoryContainer')
          .append(subCategoryLabel)
          .append(subCategorySelect);

        $('#subCategoryID').change(otherData);
      } catch (error) {
        console.error('Error fetching sub categories:', error);
      }
    } else {
      removeSubCategory();
      removeOtherData();
    }
  }

  function removeSubCategory() {
    $('#subCategoryID').remove();
    $('#subCategoryIDLabel').remove();
  }

  // Add new option function
  function addNewOption() {
    var selectedOption = $('#productID').val();
    var newOptionContainer = $('#newOption');

    if (selectedOption === 'Add new') {
      var newOption = $('<input>', {
        type: 'text',
        class: 'form-control',
        name: 'newSpirit',
        id: 'newOptionInput',
        placeholder: 'Enter spirit name',
      });

      newOptionContainer.append(newOption);
      newOptionContainer.addClass('new-form-element');
      quantity();
      category();
    } else {
      var existingInput = $('#newOptionInput');
      if (existingInput.length) {
        newOptionContainer.removeClass('new-form-element');
        existingInput.remove();
      }
      removeQuantity();
      removeCategory();
      removeSubCategory();
      removeOtherData();
    }
  }

  // Clear form on page load
  clearForms();

  // Attach the addNewOption function to the change event of the select field
  $('#productID').change(addNewOption);

  // Attach the clearForms function to the submit event of the form
  $('form').submit(function (event) {
    var spiritName = $('#spiritName').val();

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
