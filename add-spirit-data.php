<?php
include 'includes/connect.inc.php';

if (isset($_POST['request'])) {
  if ($_POST['request'] == 'category') {
    $categoriesQuery = "SELECT `Category_ID`, `Category_Name` FROM `Category`";
    $result = mysqli_query($con, $categoriesQuery);

    if ($result) {
      $categoriesData = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $categoriesData[] = $row;
      }
      $response = array('success' => true, 'categories' => $categoriesData);
    } else {
      $response = array('success' => false);
    }

    mysqli_close($con);

    header('Content-Type: application/json');
    echo json_encode($response);
  } elseif ($_POST['request'] == 'subCategory') {
    $categoryID = $_POST['categoryID'];
    $subCategoriesQuery = "SELECT `Sub_Category_ID`, `Sub_Category_Name` FROM `Sub_Category` WHERE `Category_ID` = $categoryID";
    $result = mysqli_query($con, $subCategoriesQuery);

    if ($result) {
      $subCategoriesData = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $subCategoriesData[] = $row;
      }
      $response = array('success' => true, 'subCategories' => $subCategoriesData);
    } else {
      $response = array('success' => false);
    }

    mysqli_close($con);

    header('Content-Type: application/json');
    echo json_encode($response);
  } elseif ($_POST['request'] == 'producer') {
    $producerQuery = "SELECT `Source_ID`, `Source_Name` FROM `Source`";
    $result = mysqli_query($con, $producerQuery);

    if ($result) {
      $producerData = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $producerData[] = $row;
      }
      $response = array('success' => true, 'producers' => $producerData);
    } else {
      $response = array('success' => false);
    }

    mysqli_close($con);

    header('Content-Type: application/json');
    echo json_encode($response);
  }
} else {
  // Invalid request method
  $response = array('success' => false);
  mysqli_close($con);
  echo json_encode($response);
}
