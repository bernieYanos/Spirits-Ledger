<?php
include 'includes/connect.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $spiritName = $_POST['spiritName'];
  $quantity = $_POST['quantity'];
  $type = $_POST['type'];
  $subtype = $_POST['subtype'];
  $description = $_POST['description'];
  $acquireLocation = $_POST['acquirelocation'];
  $date = $_POST['date'];
  $vintage = $_POST['vintage'];
  $varietal = $_POST['varietal'];


  // Check if a file was uploaded
  if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check for errors during file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
      // Get the name and temporary location of the uploaded file
      $name = $file['name'];
      $tmp_name = $file['tmp_name'];

      // Check if the file already exists
      if (file_exists('img/' . $name)) {
        echo 'File already exists!';
      } else {
        // Move the uploaded file to a new location
        move_uploaded_file($tmp_name, 'img/' . $name);

        // Output a success message
        echo 'File uploaded successfully!';
      }
    } else {
      // Output an error message
      echo 'Error uploading file: ' . $file['error'];
    }
  } else {
    // Output an error message if no file was uploaded
    echo 'No file uploaded.';
  }

  $sql = "INSERT INTO
  Product_t (
    `ProductName`,
    `ProductQuantity`,
    `ProductType`,
    `ProductSubType`,
    `ProductDescription`,
    `ProductAcquireLocation`,
    `ProductAcquireDate`,
    `ProductVintage`,
    `ProductVarietal`,
    `ProductImagePath`
  )
  VALUES
  (
    '$spiritName',
    '$quantity',
    '$type',
    '$subtype',
    '$description',
    '$acquireLocation',
    '$date',
    '$vintage',
    '$varietal',
    '$name'
  )";

  if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
