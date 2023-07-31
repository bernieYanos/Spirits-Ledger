<?php
include 'includes/connect.inc.php';
if (isset($_POST['productID'], $_POST['action'])) {
  $productID = $_POST['productID'];
  $action = $_POST['action'];


  $getAmount = "SELECT Product_Quantity FROM Product WHERE Product_ID = $productID";
  $result = mysqli_query($con, $getAmount);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $amount = (int)$row['Product_Quantity'];

    if ($action == 'add') {
      $amount++;
    } elseif ($action == 'remove') {
      $amount--;
    }

    $setTotal = "UPDATE Product SET Product_Quantity = $amount WHERE Product_ID = $productID";
    mysqli_query($con, $setTotal);

    $newAmount = "SELECT Product_Quantity FROM Product WHERE Product_ID = $productID";
    $newResult = mysqli_query($con, $newAmount);
    $qty = mysqli_fetch_assoc($newResult);
    $newAmount = $qty['Product_Quantity'];

    $response = array('success' => true, 'amount' => $newAmount);
  } else {
    $response = array('success' => false);
  }
  mysqli_close($con);
  echo json_encode($response);
} else {
  // Invalid request method
  $response = array('success' => false);
  mysqli_close($con);
  echo json_encode($response);
}
