<?php
include 'includes/connect.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['productID'] == 'Add new') {
    $spiritName = $_POST['newSpirit'];
    $productID = null;
  } else {
    $productID = $_POST['productID'];
    $spiritName = null;
  }
  $quantity = $_POST['quantity'];
  $categoryID = $_POST['categoryID'];
  $subCategoryID = $_POST['subCategoryID'];
  $description = $_POST['description'];
  $sourceID = $_POST['producer'];
  $vintage = $_POST['vintage'];
  $varietal = $_POST['varietal'];

  function uploadImage($productID, $con)
  {
    if (isset($_FILES['file'])) {
      $targetDir = 'uploads/';
      $fileName = 'spirit_' . $productID;
      $uploadOk = 1;
      $fileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

      $targetFile = $targetDir . $fileName . '.' . $fileType;
      $uploadPath = $fileName . '.' . $fileType;

      // Remove the existing file if it exists
      if (file_exists($targetFile)) {
        if (!unlink($targetFile)) {
          $uploadOk = 0;
        }
      }

      // If no errors, move the file to the specified directory
      if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['file']["tmp_name"], $targetFile)) {
          $sqlImage = "UPDATE `Product` SET `Product_Image_Path` = '$uploadPath' WHERE `Product_ID` = $productID";
          mysqli_query($con, $sqlImage);
        } else {
          echo 'error';
        }
      }
    }
  }

  if ($productID == null) {
    $addSpiritSQL = "INSERT INTO
    Product (
      `Product_Name`,
      `Product_Quantity`,
      `Category_ID`,
      `Sub_Category_ID`,
      `Product_Description`,
      `Source_ID`,
      `Vintage`,
      `Product_Image_Path`
    )
    VALUES
    (
      '$spiritName',
      '$quantity',
      '$categoryID',
      '$subCategoryID',
      '$description',
      '$sourceID',
      '$vintage',
      null
    )";

    if (mysqli_query($con, $addSpiritSQL)) {
      $productID = mysqli_insert_id(($con));
      uploadImage($productID, $con);
    }

    header('Location: spirits-ledger.php');
    exit();
  }
}
